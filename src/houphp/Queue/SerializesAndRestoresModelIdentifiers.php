<?php

namespace Houphp\Queue;

use Houphp\Contracts\Queue\QueueableEntity;
use Houphp\Contracts\Database\ModelIdentifier;
use Houphp\Contracts\Queue\QueueableCollection;
use Houphp\Database\Eloquent\Collection as EloquentCollection;

trait SerializesAndRestoresModelIdentifiers
{
    /**
     * Get the property value prepared for serialization.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function getSerializedPropertyValue($value)
    {
        if ($value instanceof QueueableCollection) {
            return new ModelIdentifier(
                $value->getQueueableClass(),
                $value->getQueueableIds(),
                $value->getQueueableRelations(),
                $value->getQueueableConnection()
            );
        }

        if ($value instanceof QueueableEntity) {
            return new ModelIdentifier(
                get_class($value),
                $value->getQueueableId(),
                $value->getQueueableRelations(),
                $value->getQueueableConnection()
            );
        }

        return $value;
    }

    /**
     * Get the restored property value after deserialization.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function getRestoredPropertyValue($value)
    {
        if (! $value instanceof ModelIdentifier) {
            return $value;
        }

        return is_array($value->id)
                ? $this->restoreCollection($value)
                : $this->restoreModel($value);
    }

    /**
     * Restore a queueable collection instance.
     *
     * @param  \Houphp\Contracts\Database\ModelIdentifier  $value
     * @return \Houphp\Database\Eloquent\Collection
     */
    protected function restoreCollection($value)
    {
        if (! $value->class || count($value->id) === 0) {
            return new EloquentCollection;
        }

        return $this->getQueryForModelRestoration(
            (new $value->class)->setConnection($value->connection), $value->id
        )->useWritePdo()->get();
    }

    /**
     * Restore the model from the model identifier instance.
     *
     * @param  \Houphp\Contracts\Database\ModelIdentifier  $value
     * @return \Houphp\Database\Eloquent\Model
     */
    public function restoreModel($value)
    {
        return $this->getQueryForModelRestoration(
            (new $value->class)->setConnection($value->connection), $value->id
        )->useWritePdo()->firstOrFail()->load($value->relations ?? []);
    }

    /**
     * Get the query for model restoration.
     *
     * @param  \Houphp\Database\Eloquent\Model  $model
     * @param  array|int  $ids
     * @return \Houphp\Database\Eloquent\Builder
     */
    protected function getQueryForModelRestoration($model, $ids)
    {
        return $model->newQueryForRestoration($ids);
    }
}
