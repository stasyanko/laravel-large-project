<?php


namespace LargeLaravel\Containers\Book\Actions\Decorators;


use LargeLaravel\Containers\Book\Collections\BookCollection;
use LargeLaravel\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

class GetBookListActionLogger extends GetBookListActionDecorator
{
    public function execute(PaginateRequestInterface $paginateRequest): BookCollection
    {
        $bookCollection = parent::execute($paginateRequest);
        \Log::info("returned " . count($bookCollection) . " books");

        return $bookCollection;
    }
}
