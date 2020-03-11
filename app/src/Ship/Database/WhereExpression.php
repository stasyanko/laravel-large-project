<?php

namespace LargeLaravel\Ship\Database;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class WhereExpression extends Filter
{
    /** @var string */
    private $field;
    /** @var string */
    private $symbol;
    /** @var mixed */
    private $value;

    /**
     * @param string $field
     * @param string $symbol
     * @param mixed $value
     */
    public function __construct(string $field, string $symbol, $value)
    {
        $this->field = $field;
        $this->symbol = $symbol;
        $this->value = $value;
    }

    /**
     * @param EloquentBuilder $query
     *
     * @return EloquentBuilder
     */
    public function addToQuery(EloquentBuilder $query): EloquentBuilder
    {
        return $query->where($this->field, $this->symbol, $this->value);
    }
}
