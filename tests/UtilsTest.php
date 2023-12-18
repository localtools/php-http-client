<?php
require_once __DIR__ . '../../src/Utils/utils.php';

it('should return true if the argument is an array', function () {
    $this->assertTrue(isArray([[1, 2, 3]]));
});

it('should return true if the argument is a buffer', function () {
    $this->assertTrue(isBuffer('buffer'));
});

it('should return the protocol of the url', function () {
    $this->assertEquals(parseProtocol('https://www.google.com'), 'https');
});