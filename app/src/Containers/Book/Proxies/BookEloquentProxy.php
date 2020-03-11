<?php


namespace LargeLaravel\Containers\Book\Proxies;

use LargeLaravel\Containers\Book\Models\Book;
use LargeLaravel\Ship\Abstracts\Proxies\BaseEloquentProxy;

class BookEloquentProxy extends BaseEloquentProxy
{
    protected const MODEL = Book::class;
}
