<?php
namespace PhpHttpClient\Exceptions;

use RuntimeException;
use Throwable;

class HttpClientException extends RuntimeException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
