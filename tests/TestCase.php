<?php

namespace ElfSundae\Laravel\Helper\Test;

use Mockery;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function tearDown()
    {
        Mockery::close();
    }
}
