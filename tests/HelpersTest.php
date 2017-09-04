<?php

namespace ElfSundae\Laravel\Helper\Test;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function test_urlsafe_base64_encode()
    {
        $this->assertSame('TGFyYXZlbA', urlsafe_base64_encode('Laravel'));
    }

    public function test_urlsafe_base64_decode()
    {
        $this->assertSame('Laravel', urlsafe_base64_decode('TGFyYXZlbA'));
        $this->assertSame('Laravel', urlsafe_base64_decode(base64_encode('Laravel')));
    }

    public function test_mb_trim()
    {
        $this->assertSame('foo', mb_trim(' foo '));
        $this->assertSame('foo', mb_trim(' foo '.PHP_EOL));
        $this->assertSame('foo', mb_trim('　foo　'));
        $this->assertSame('foo bar', mb_trim('  foo bar  '));
    }

    public function test_string_value()
    {
        $this->assertSame('foo', string_value(new Foo));
        $this->assertSame('{"foo":"bar"}', string_value(new Bar));
        $this->assertSame('1111', string_value(1111));
        $this->assertSame('true', string_value(true));
        $this->assertSame('{"foo bar":123}', string_value(['foo bar' => 123]));
    }

    public function test_in_arrayi()
    {
        $this->assertTrue(in_arrayi('Foo', ['foo']));
        $this->assertTrue(in_arrayi('BAR', ['foo' => 'bar']));
    }
}

class Foo
{
    public function __toString()
    {
        return 'foo';
    }
}

class Bar
{
    public function toArray()
    {
        return ['foo' => 'bar'];
    }
}
