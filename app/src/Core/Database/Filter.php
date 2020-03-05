<?php

namespace LargeLaravel\Core\Database;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

abstract class Filter
{
    /**
     * @param EloquentBuilder $query
     *
     * @return EloquentBuilder
     */
    abstract public function addToQuery(EloquentBuilder $query): EloquentBuilder;
}
