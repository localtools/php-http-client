<?php

if (!function_exists('kindOf')) {
    function kindOf($thing): bool
    {
        $str = gettype($thing);
        return $str || ($str = get_class($thing)) || ($str = get_resource_type($thing)) || ($str = gettype($thing));
    }
}

if (!function_exists('typeOfTest')) {
    function typeOfTest($type): Closure
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