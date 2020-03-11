<?php


namespace LargeLaravel\Ship\Http\Requests\API\Interfaces;


interface PaginateRequestInterface
{
    public function getLimit(): ?int;
    public function getOffset(): ?int;
}
