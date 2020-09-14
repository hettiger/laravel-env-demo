<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PHPUnitConstantsTest extends TestCase
{
    /**
     * @dataProvider constants
     * @param string $constant
     * @param mixed $expected
     */
    public function test_constants(string $constant, $expected)
    {
        $this->assertSame($expected, env($constant));
    }

    public function constants()
    {
        return [
            ['APP_ENV', 'testing'], // OK
            ['SERVER_BOOL_FALSE', false], // Failed asserting that null is identical to false.
            ['SERVER_BOOL_FALSE_PARENTHESES', false], // OK
            ['SERVER_BOOL_TRUE', true], // Failed asserting that null is identical to true.
            ['SERVER_BOOL_TRUE_PARENTHESES', true], // OK
            ['ENV_BOOL_FALSE', false], // Failed asserting that '' is identical to false.
            ['ENV_BOOL_FALSE_PARENTHESES', false], // OK
            ['ENV_BOOL_TRUE', true], // Failed asserting that '1' is identical to true.
            ['ENV_BOOL_TRUE_PARENTHESES', true], // OK
            ['SERVER_STRING', 'foo'], // OK
            ['ENV_STRING', 'foo'], // OK
        ];
    }
}
