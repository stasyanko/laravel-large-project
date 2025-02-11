<?php


namespace LargeLaravel\Containers\Book\Actions\Decorators;


use LargeLaravel\Containers\Book\Actions\Interfaces\GetBookListActionInterface;
use LargeLaravel\Containers\Book\Collections\BookCollection;
use LargeLaravel\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

class GetBookListActionDecorator implements GetBookListActionInterface
{
    protected GetBookListActionInterface $getBookListActionInterface;

    public function __construct(GetBookListActionInterface $getBookListActionInterface)
    {
        $this->getBookListActionInterface = $getBookListActionInterface;
    }

    public function execute(PaginateRequestInterface $paginateRequest): BookCollection
    {
        return $this->getBookListActionInterface->execute($paginateRequest);
    }
}
