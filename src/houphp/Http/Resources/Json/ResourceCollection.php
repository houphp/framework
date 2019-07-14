<?php

namespace Houphp\Http\Resources\Json;

use Countable;
use IteratorAggregate;
use Houphp\Pagination\AbstractPaginator;
use Houphp\Http\Resources\CollectsResources;

class ResourceCollection extends JsonResource implements Countable, IteratorAggregate
{
    use CollectsResources;

    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects;

    /**
     * The mapped collection instance.
     *
     * @var \Houphp\Support\Collection
     */
    public $collection;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
    }

    /**
     * Return the count of items in the resource collection.
     *
     * @return int
     */
    public function count()
    {
        return $this->collection->count();
    }

    /**
     * Transform the resource into a JSON array.
     *
     * @param  \Houphp\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map->toArray($request)->all();
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Houphp\Http\Request  $request
     * @return \Houphp\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return $this->resource instanceof AbstractPaginator
                    ? (new PaginatedResourceResponse($this))->toResponse($request)
                    : parent::toResponse($request);
    }
}
