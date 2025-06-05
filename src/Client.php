<?php

namespace PhpHttpClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use PhpHttpClient\Concerns\HttpBehavior;
use PhpHttpClient\Exceptions\HttpClientException;
use Psr\Http\Message\ResponseInterface;

/**
 * @final
 */
class Client implements Contracts\HttpMethods
{
    use HttpBehavior;

    /** @var GuzzleClient */
    private $instance;

    /** @var array */
    private $options;
    public function __construct(string $baseUri, array $options = [])
    {
        $this->instance = new GuzzleClient(array_merge($options, ['base_uri' => $baseUri]));
        $this->options = $options;
    }

    public function withQuery(array $query): self
    {
        $clone = clone $this;
        $clone->options['query'] = $query;
        return $clone;
    }

    public function withBody(array $body): self
    {
        $clone = clone $this;
        $clone->options['body'] = $body;
        return $clone;
    }

    public function withJson(array $data): self
    {
        $clone = clone $this;
        $clone->options['json'] = $data;
        return $clone;
    }

    public function withMiddleware(callable $middleware): self
    {
        $clone = clone $this;
        $handler = $clone->instance->getConfig('handler');
        if ($handler instanceof HandlerStack) {
            $handler->push($middleware);
        }

        return $clone;
    }

    public function withOptions(array $options): self
    {
        $clone = clone $this;
        $clone->options = array_merge($clone->options, $options);
        return $clone;
    }

    public function withHeaders(array $headers): self
    {
        $clone = clone $this;
        $clone->options['headers'] = $headers;
        return $clone;
    }

    public function withBasicAuth(string $username, string $password): self
    {
        $clone = clone $this;
        $clone->options['auth'] = [$username, $password];
        return $clone;
    }

    public function withDigestAuth(string $username, string $password): self
    {
        $clone = clone $this;
        $clone->options['auth'] = [$username, $password, 'digest'];
        return $clone;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getBaseUri(): string
    {
        return $this->getInstance()->getConfig('base_uri');
    }

    public function getHeaders(): array
    {
        return $this->getInstance()->getConfig('headers');
    }

    public function getAuth(): array
    {
        return $this->getInstance()->getConfig('auth');
    }

    public function getBodyAsString(ResponseInterface $response): string
    {
        return (string) $response->getBody();
    }

    /**
     * @return mixed
     */
    public function getJson(ResponseInterface $response, bool $assoc = true)
    {
        return json_decode($this->getBodyAsString($response), $assoc);
    }
}