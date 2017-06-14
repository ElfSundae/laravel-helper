<?php

namespace ElfSundae\Laravel\Helper\Test;

use Mockery;
use ElfSundae\Laravel\Helper\HttpClient;

class HttpClientTest extends TestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf(HttpClient::class, $this->getClient());
    }

    protected function getClient()
    {
        return Mockery::mock(HttpClient::class);
    }
}
