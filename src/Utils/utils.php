<?php

if (!function_exists('kindOf')) {
    function kindOf($thing): string
    {
        if (is_object($thing)) {
            return get_class($thing);
        }

        if (is_resource($thing)) {
            return get_resource_type($thing);
        }

        return gettype($thing);
    }
}

if (!function_exists('typeOfTest')) {
    function typeOfTest(string $type): Closure
    {
        return function ($thing) use ($type) {
            return gettype($thing) === $type;
        };
    }
}

if (!function_exists('isArray')) {
    function isArray($thing): bool
    {
        return is_array($thing);
    }
}

if (!function_exists('isBuffer')) {
    function isBuffer($thing): bool
    {
        return is_string($thing);
    }
}

if (!function_exists('parseProtocol')) {
    function parseProtocol(string $url): string
    {
        $match = [];
        preg_match('/^([-+\w]{1,25})(:?\/\/|:)/', $url, $match);
        return $match[1] ?? '';
    }
}

if (!function_exists('readBlob')) {
    function readBlob($blob): Generator
    {
        yield $blob;
    }
}