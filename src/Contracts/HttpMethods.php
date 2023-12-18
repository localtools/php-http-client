<?php

namespace PhpHttpClient\Contracts;

use Psr\Http\Message\ResponseInterface;

interface HttpMethods
{
    public function getUri(array $config = []): string;
    public function request(array $config = []): ResponseInterface;
    public function get(string $url, array $config = []): ResponseInterface;
    public function delete(string $url, array $config = []): ResponseInterface;
    public function head(string $url, array $config = []): ResponseInterface;
    public function options(string $url, array $config = []): ResponseInterface;
    public function post(string $url, array $data = [], array $config = []): ResponseInterface;
    public function put(string $url, array $data = [], array $config = []): ResponseInterface;
    public function patch(string $url, array $data = [], array $config = []): ResponseInterface;
    public function postForm(string $url, array $data = [], array $config = []): ResponseInterface;
    public function putForm(string $url, array $data = [], array $config = []): ResponseInterface;
    public function patchForm(string $url, array $data = [], array $config = []): ResponseInterface;
}