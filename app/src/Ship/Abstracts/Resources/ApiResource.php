<?php

namespace LargeLaravel\Ship\Abstracts\Resources;

abstract class ApiResource
{
    public function wrapResponse(array $data): array
    {
        return [
            'data' => $data
        ];
    }
}
