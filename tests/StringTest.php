<?php

use PHPUnit\Framework\TestCase;
use StringManipulation\Str;

class StrTest extends TestCase
{
    public function testDoesReturnToString()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');

        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testUppercase()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->uppercase();

        $expected = 'LOREM IPSUM DOLOR SIT AMET.';
        $this->assertEquals($expected, $string);
    }

    public function testLowercase()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->lowercase();

        $expected = 'lorem ipsum dolor sit amet.';
        $this->assertEquals($expected, $string);
    }

    public function testUppercaseFirstLetter()
    {
        $string = new Str('lorem ipsum DOLOR SIT amet.');
        $string->uppercaseFirstLetter();

        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testLowercaseFirstLetter()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->lowercaseFirstLetter();

        $expected = 'lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testUppercaseFirstLetters()
    {
        $string = new Str('lorem ipsum DOLOR SIT amet.');
        $string->uppercaseFirstLetters();

        $expected = 'Lorem Ipsum DOLOR SIT Amet.';
        $this->assertEquals($expected, $string);
    }

    public function testLowercaseFirstLetters()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->lowercaseFirstLetters();

        $expected = 'lorem ipsum dOLOR sIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testTrimDefault()
    {
        $string = new Str('  !   Lorem ipsum DOLOR SIT amet.  !  ');
        $string->trim();

        $expected = '!   Lorem ipsum DOLOR SIT amet.  !';
        $this->assertEquals($expected, $string);
    }

    public function testTrimWithArgument()
    {
        $string = new Str('////Lorem ipsum DOLOR SIT amet.////');
        $string->trim('/');

        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testTrimLeftDefault()
    {
        $string = new Str('  !   Lorem ipsum DOLOR SIT amet.  !  ');
        $string->trimLeft();

        $expected = '!   Lorem ipsum DOLOR SIT amet.  !  ';
        $this->assertEquals($expected, $string);
    }

    public function testTrimLeftWithArgument()
    {
        $string = new Str('////Lorem ipsum DOLOR SIT amet.////');
        $string->trimLeft('/');

        $expected = 'Lorem ipsum DOLOR SIT amet.////';
        $this->assertEquals($expected, $string);
    }

    public function testTrimRightDefault()
    {
        $string = new Str('  !   Lorem ipsum DOLOR SIT amet.  !  ');
        $string->trimRight();

        $expected = '!   Lorem ipsum DOLOR SIT amet.  !  ';
        $this->assertEquals($expected, $string);
    }

    public function testTrimRightWithArgument()
    {
        $string = new Str('////Lorem ipsum DOLOR SIT amet.////');
        $string->trimRight('/');

        $expected = '////Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testLimitCharsDefault()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->limitChars(9);

        $expected = 'Lorem ips...';
        $this->assertEquals($expected, $string);
    }

    public function testLimitCharsWithArgument()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->limitChars(9, ' (READ MORE)');

        $expected = 'Lorem ips (READ MORE)';
        $this->assertEquals($expected, $string);
    }

    public function testLimitWordsDefault()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->limitWords(2);

        $expected = 'Lorem ipsum...';
        $this->assertEquals($expected, $string);
    }

    public function testLimitWordsWithArgument()
    {
        $string = new Str('Lorem ipsum DOLOR SIT amet.');
        $string->limitWords(9, ' (READ MORE)');

        $expected = 'Lorem ipsum (READ MORE)';
        $this->assertEquals($expected, $string);
    }

    public function testEscapeHtml()
    {
        $string = new Str('Lorem <strong>ipsum</strong> DOLOR SIT amet.');
        $string->escapeHtml();

        $expected = 'Lorem &lt;strong&gt;ipsum&lt;/strong&gt; DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testLength()
    {
        $string = new Str('Lorem ipsum');
        $string->length();

        $expected = 11;
        $this->assertEquals($expected, $string);
    }

    public function testFindAndReplace()
    {
        $string = new Str('/Lorem/ipsum/DOLOR/SIT/amet.////');
        $string->find('/');
        $string->replace(' ');

        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testFindAndLowercase()
    {
        $string = new Str('Lorem IPSUM DOLOR SIT amet.');
        $string->find('IPSUM DOLOR');
        $string->lowercase();

        $expected = 'Lorem ipsum dolor SIT amet.';
        $this->assertEquals($expected, $string);
    }

    public function testMethodChaining()
    {
        $string = new Str('   ////Lorem ipsum DOLOR SIT amet.////');
        $string->trimLeft()->trimRight('/');
        $string->uppercaseFirstLetters();
        $string->lowercaseFirstLetter();

        $expected = 'lorem Ipsum DOLOR SIT Amet.';
        $this->assertEquals($expected, $string);
    }

    public function testFactoryMethod()
    {
        $string = Str::text('Lorem ipsum DOLOR SIT amet.  ');
        $string->trim();

        $expected = 'Lorem ipsum DOLOR SIT amet.';
        $this->assertEquals($expected, $string);
    }
}
