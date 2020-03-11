<?php


namespace LargeLaravel\Ship\Http\Requests\API;


use LargeLaravel\Ship\Abstracts\Requests\ApiRequest;
use LargeLaravel\Ship\Http\Requests\API\Interfaces\PaginateRequestInterface;

class PaginateRequest extends ApiRequest implements PaginateRequestInterface
{
    public function rules()
    {
        return [
            'limit'  => 'integer|min:0|required_with:offset',
            'offset' => 'integer|min:0',
        ];
    }

    public function getLimit(): ?int
    {
        $limit = $this->input('limit');
        return isset($limit) ? (int) $limit : null;
    }

    public function getOffset(): ?int
    {
        $offset = $this->input('offset');
        return isset($offset) ? (int) $offset : null;
    }
}
