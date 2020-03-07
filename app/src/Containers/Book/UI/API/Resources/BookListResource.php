<?php

namespace LargeLaravel\Containers\Book\UI\API\Resources;

use LargeLaravel\Containers\Book\Collections\BookCollection;
use LargeLaravel\Containers\Book\UI\API\Resources\Interfaces\BookListResourceInterface;


class BookListResource implements BookListResourceInterface
{
    public function fromCollection(BookCollection $bookCollection): array
    {
        $mappedCollection = [];

        foreach ($bookCollection as $bookDTO) {
            $mappedCollection = [
                'id' => $bookDTO->id,
                'title' => $bookDTO->title,
            ];
        }

        return $mappedCollection;
    }
}
