<?php

namespace LargeLaravel\Containers\Book\UI\API\Controllers;

use LargeLaravel\Containers\Book\Subactions\Interfaces\GetBookListActionInterface;
use LargeLaravel\Containers\Book\UI\API\Resources\BookListResource;
use LargeLaravel\Ship\Abstracts\Controllers\Controller;
use LargeLaravel\Ship\Http\Requests\API\PaginateRequest;

class BookController extends Controller
{
    public function list(
        PaginateRequest $request,
        BookListResource $bookListResource,
        GetBookListActionInterface $getBookListAction
    )
    {
        $bookCollection = $getBookListAction->execute($request);

        return response()->json($bookListResource->fromCollection($bookCollection));
    }
}
