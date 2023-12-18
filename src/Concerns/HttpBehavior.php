<?php
namespace PhpHttpClient\Concerns;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

trait HttpBehavior
{
    public function getInstance(): GuzzleClient
    {
        return $this->instance;
    }

    public function getUri(array $config = []): string
    {
        return $this->getInstance()->getConfig('base_uri') . $config['url'];
    }

    /**
     * @throws GuzzleException
     */
    public function request(array $config = []): ResponseInterface
    {
        return $this->getInstance()->request($config['method'], $config['url'], $config);
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $url, array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'GET', 'url' => $url]));
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $url, array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'DELETE', 'url' => $url]));
    }

    /**
     * @throws GuzzleException
     */
    public function head(string $url, array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'HEAD', 'url' => $url]));
    }

    /**
     * @throws GuzzleException
     */
    public function options(string $url, array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'OPTIONS', 'url' => $url]));
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'POST', 'url' => $url, 'form_params' => $data]));
    }

    /**
     * @throws GuzzleException
     */
    public function put(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'PUT', 'url' => $url, 'form_params' => $data]));
    }

    /**
     * @throws GuzzleException
     */
    public function patch(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'PATCH', 'url' => $url, 'form_params' => $data]));
    }

    /**
     * @throws GuzzleException
     */
    public function postForm(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'POST', 'url' => $url, 'multipart' => $data]));
    }

    /**
     * @throws GuzzleException
     */

    public function putForm(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'PUT', 'url' => $url, 'multipart' => $data]));
    }

    /**
     * @throws GuzzleException
     */
    public  function patchForm(string $url, array $data = [], array $config = []): ResponseInterface
    {
        return $this->request(array_merge($config, ['method' => 'PATCH', 'url' => $url, 'multipart' => $data]));
    }
}