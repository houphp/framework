<?php

namespace Houphp\Database\Eloquent;

interface Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Houphp\Database\Eloquent\Builder  $builder
     * @param  \Houphp\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model);
}
