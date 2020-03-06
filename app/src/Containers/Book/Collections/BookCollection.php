<?php

namespace LargeLaravel\Containers\Book\Collections;

use LargeLaravel\Containers\Book\DTO\BookDTO;
use LargeLaravel\Core\Abstracts\Collections\Collection;

class BookCollection extends Collection
{
    public static function create(array $data): BookCollection
    {
        $collection = [];

        foreach ($data as $item)
        {
            $collection[] = new BookDTO($item);
        }

        return new self($collection);
    }

    public function current(): BookDTO
    {
        return parent::current();
    }
}
