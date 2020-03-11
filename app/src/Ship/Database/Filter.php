<?php

namespace LargeLaravel\Ship\Database;

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
