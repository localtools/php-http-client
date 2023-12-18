<?php
use PhpHttpClient\Client;

it('tests withQuery method', function () {
    $client = new Client('http://example.com');
    $query = ['param1' => 'value1', 'param2' => 'value2'];

    $result = $client->withQuery($query);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withBody method', function () {
    $client = new Client('http://example.com');
    $body = ['param1' => 'value1', 'param2' => 'value2'];

    $result = $client->withBody($body);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withOptions method', function () {
    $client = new Client('http://example.com');
    $options = ['param1' => 'value1', 'param2' => 'value2'];

    $result = $client->withOptions($options);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withHeaders method', function () {
    $client = new Client('http://example.com');
    $headers = ['param1' => 'value1', 'param2' => 'value2'];

    $result = $client->withHeaders($headers);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withBasicAuth method', function () {
    $client = new Client('http://example.com');
    $username = 'username';
    $password = 'password';

    $result = $client->withBasicAuth($username, $password);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withDigestAuth method', function () {
    $client = new Client('http://example.com');
    $username = 'username';
    $password = 'password';

    $result = $client->withDigestAuth($username, $password);

    expect($result)->toBeInstanceOf(Client::class);
});

it('tests withQuery method with github api', function () {
    $client = new Client('https://api.github.com');
    $query = ['q' => 'php'];

    $result = $client->withQuery($query)->get('/');

    expect($result->hasHeader('Content-Type'))->toBeTrue()
        ->and($result->getStatusCode())->toBeInt();
});