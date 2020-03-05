<?php


namespace LargeLaravel\Containers\Book\QueryBuilders;

use LargeLaravel\Containers\Book\Models\Book;
use LargeLaravel\Core\Abstracts\Builders\EloquentQueryBuilder;

class BookQueryBuilder extends EloquentQueryBuilder
{
    protected const MODEL = Book::class;
}
