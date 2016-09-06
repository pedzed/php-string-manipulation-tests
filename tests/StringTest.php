<?php

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testDoesReturnToString()
    {
        $string = new String('Lorem ipsum DOLOR SIT amet.');
        
        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }
}
