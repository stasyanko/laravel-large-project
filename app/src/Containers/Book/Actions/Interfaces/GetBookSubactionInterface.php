<?php

namespace LargeLaravel\Containers\Book\Subactions\Interfaces;

use LargeLaravel\Containers\Book\Collections\BookCollection;
use LargeLaravel\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

interface GetBookListActionInterface
{
    public function execute(PaginateRequestInterface $paginateRequest): BookCollection;
}
