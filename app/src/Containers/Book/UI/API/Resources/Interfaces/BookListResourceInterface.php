<?php

namespace LargeLaravel\Containers\Book\UI\API\Resources\Interfaces;

use LargeLaravel\Containers\Book\Collections\BookCollection;

interface BookListResourceInterface
{
    public function fromCollection(BookCollection $bookCollection): array;
}
