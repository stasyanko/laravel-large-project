<?php

namespace LargeLaravel\Ship\Exceptions;

class EntityNotExistException extends \Exception
{
    /**
     * @param string $entityName
     *
     * @return EntityNotExistException
     */
    public static function newInstance(string $entityName): self
    {
        return new self('Entity "' . $entityName .'" not exist');
    }
}
