<?php


namespace LargeLaravel\Containers\Book\QueryBuilders;

use LargeLaravel\Containers\Book\Models\Book;
use LargeLaravel\Core\Abstracts\Proxies\BaseEloquentProxy;

class BookEloquentProxy extends BaseEloquentProxy
{
    protected const MODEL = Book::class;
}
