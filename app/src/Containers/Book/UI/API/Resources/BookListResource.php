<?php

namespace LargeLaravel\Containers\Book\UI\API\Resources;

use LargeLaravel\Containers\Book\Collections\BookCollection;
use LargeLaravel\Containers\Book\UI\API\Resources\Interfaces\BookListResourceInterface;
use LargeLaravel\Ship\Abstracts\Resources\ApiResource;


class BookListResource extends ApiResource implements BookListResourceInterface
{
    public function fromCollection(BookCollection $bookCollection): array
    {
        $mappedCollection = [];

        foreach ($bookCollection as $bookDTO) {
            $mappedCollection[] = [
                'id' => $bookDTO->id,
                'title' => $bookDTO->title,
            ];
        }

        return $this->wrapResponse($mappedCollection);
    }
}
