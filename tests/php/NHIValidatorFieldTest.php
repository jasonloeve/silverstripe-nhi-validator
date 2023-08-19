<?php

namespace JasonLoeve\NHIValidator\Tests;

use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\Validator;
use JasonLoeve\NHIValidator\Forms\NHIValidatorField;

class NHIValidatorFieldTest extends SapphireTest
{
    public function testValidateString()
    {
        $field = new NHIValidatorField('NHI');

        // Valid value
        $field->setValue('ABC1234');
        $this->assertTrue($field->validateString());

        // Invalid value
        $field->setValue('INVALID1');
        $this->assertFalse($field->validateString());
    }

    public function testValidate()
    {
        $field = new NHIValidatorField('NHI');
        $validator = new Validator();

        // Valid value
        $field->setValue('ABC1234');
        $this->assertTrue($field->validate($validator));

        // Invalid value
        $field->setValue('INVALID1');
        $this->assertFalse($field->validate($validator));

        // Ensure an error message is registered
        $errors = $validator->getErrors();
        $this->assertEquals('Invalid NHI format.', $errors[0]['message']);
    }
}
