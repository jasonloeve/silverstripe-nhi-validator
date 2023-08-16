<?php

use JasonLoeve\NHIValidator\FieldType\NHIField;
use JasonLoeve\NHIValidator\Forms\NHIValidatorField;
use SilverStripe\Dev\SapphireTest;

class NHIFieldTest extends SapphireTest
{
    /**
     * Test if NHIField's constructor initializes correctly
     */
    public function testConstructor()
    {
        $name = 'TestField';
        $options = ['test_option' => 'test_value'];
        $field = new NHIField($name, $options);

        $this->assertEquals($name, $field->getName());
        $this->assertEquals(7, $field->getSize());
    }

    /**
     * Test if scaffoldFormField returns an instance of NHIValidatorField
     */
    public function testScaffoldFormField()
    {
        $name = 'TestField';
        $title = 'Test Title';
        $field = new NHIField($name);

        $formField = $field->scaffoldFormField($title);

        $this->assertInstanceOf(NHIValidatorField::class, $formField);
        $this->assertEquals($name, $formField->getName());
        $this->assertEquals($title, $formField->getTitle());
    }
}
