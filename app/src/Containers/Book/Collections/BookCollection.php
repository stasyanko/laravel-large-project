<?php

namespace LargeLaravel\Containers\Book\Collections;

use LargeLaravel\Containers\Book\DTO\BookDTO;
use LargeLaravel\Ship\Abstracts\Collections\Collection;

class BookCollection extends Collection
{
    public function __construct(BookDTO ...$books)
    {
        parent::__construct($books);
    }

    public function current(): BookDTO
    {
        return parent::current();
    }
}
