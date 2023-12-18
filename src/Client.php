<?php

namespace PhpHttpClient;

use GuzzleHttp\Client as GuzzleClient;
use PhpHttpClient\Concerns\HttpBehavior;

/**
 * @final
 */
class Client implements Contracts\HttpMethods
{
    use HttpBehavior;

    private $instance;
    private $options;
    public function __construct(string $baseUri, array $options = [])
    {
        $this->instance = new GuzzleClient(array_merge($options, ['base_uri' => $baseUri]));
        $this->options = $options;
    }

    public function withQuery(array $query): self
    {
        $this->options['query'] = $query;
        return $this;
    }

    public function withBody(array $body): self
    {
        $this->options['body'] = $body;
        return $this;
    }

    public function withOptions(array $options): self
    {
        $this->options = array_merge($this->options, $options);
        return $this;
    }

    public function withHeaders(array $headers): self
    {
        $this->options['headers'] = $headers;
        return $this;
    }

    public function withBasicAuth(string $username, string $password): self
    {
        $this->options['auth'] = [$username, $password];
        return $this;
    }

    public function withDigestAuth(string $username, string $password): self
    {
        $this->options['auth'] = [$username, $password, 'digest'];
        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getBaseUri(): string
    {
        return $this->getInstance()->getConfig('base_uri');
    }

    public function getBaseUrl(): string
    {
        return $this->getInstance()->getConfig('base_url');
    }

    public function getHeaders(): array
    {
        return $this->getInstance()->getConfig('headers');
    }

    public function getAuth(): array
    {
        return $this->getInstance()->getConfig('auth');
    }
}