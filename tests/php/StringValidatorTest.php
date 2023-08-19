<?php

namespace JasonLoeve\NHIValidator\Tests;

use SilverStripe\Dev\SapphireTest;
use JasonLoeve\NHIValidator\Utils\StringValidator;

class StringValidatorTest extends SapphireTest
{
    // Test if the string is too long (should fail)
    public function testStringTooLong()
    {
        $string = 'ARE62RS123';
        $validator = new StringValidator($string);
        $this->assertFalse($validator->validateString());
    }

    // Test if the string is too short (should fail)
    public function testStringTooShort()
    {
        $string = 'ARE62';
        $validator = new StringValidator($string);
        $this->assertFalse($validator->validateString());
    }

    // Test if the legacy format is incorrect (should fail)
    public function testLegacyFormatIncorrect()
    {
        $string = 'ZAA0025';
        $validator = new StringValidator($string);
        $this->assertFalse($validator->validateString());
    }

    // Test if the new format is incorrect (should fail)
    public function testNewFormatIncorrect()
    {
        $string = 'ARE62RA';
        $validator = new StringValidator($string);
        $this->assertFalse($validator->validateString());
    }

    // Test if the legacy format is correct (should pass)
    public function testLegacyFormatCorrect()
    {
        $string = 'ZAA0024';
        $validator = new StringValidator($string);
        $this->assertTrue($validator->validateString());
    }

    // Test if the new format is correct (should pass)
    public function testNewFormatCorrect()
    {
        $string = 'ARE62RS';
        $validator = new StringValidator($string);
        $this->assertTrue($validator->validateString());
    }
}
