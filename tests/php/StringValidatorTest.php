<?php

namespace JasonLoeve\NHIValidator\Tests;

use SilverStripe\Dev\SapphireTest;
use JasonLoeve\NHIValidator\Utils\StringValidator;

class StringValidatorTest extends SapphireTest
{
    public function testValidateString()
    {
        // Assuming you've updated StringValidator::validateString to return a bool

        // Test valid legacy format
        $validator = new StringValidator('ABC1234'); // Use a real valid legacy format
        $this->assertTrue($validator->validateString());

        // Test valid new format
        $validator = new StringValidator('ABC12XY'); // Use a real valid new format
        $this->assertTrue($validator->validateString());

        // Test invalid format
        $validator = new StringValidator('INVALID1');
        $this->assertFalse($validator->validateString());
    }
}
