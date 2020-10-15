<?php

final class BadRequestException extends \InvalidArgumentException
{
    public function __construct($code = 0, \Exception $previous = null)
    {
        parent::__construct('Bad request', $code, $previous);
    }
}
