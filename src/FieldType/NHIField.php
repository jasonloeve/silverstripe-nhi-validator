<?php

namespace JasonLoeve\NHIValidator\FieldType;

use JasonLoeve\NHIValidator\Forms\NHIValidatorField;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBVarchar;

/**
 * NHI FieldType
 * This class represents a custom NHI (National Health Index) field type that extends DBVarchar.
 * The NHIField class is used to store and handle NHI numbers in SilverStripe applications.
 */
/**
 * Class Varchar represents a variable-length string of up to 255 characters, designed to store raw text
 *
 * @see DBHTMLText
 * @see DBHTMLVarchar
 * @see DBText
 */
class NHIField extends DBVarchar
{
    /**
     * Constructor for the NHIField class.
     *
     * @param string|null $name The name of the field.
     * @param array $options An array of options for the field.
     */
    public function __construct($name = null, $options = [])
    {
        // Call the parent class constructor (DBVarchar) passing the name and a fixed size of 7 characters for the field.
        parent::__construct($name, 7, $options);
    }

    /**
     * Create a form field for the NHIField.
     *
     * @param string|null $title The title/label of the form field.
     * @param array|null $params Additional parameters for form field creation (not used in this method).
     * @return NHIValidatorField The form field instance for NHI validation.
     */
    public function scaffoldFormField($title = null, $params = null)
    {
        // Create a new instance of NHIValidatorField, passing the field's name and title.
        // NHIValidatorField is a custom form field designed for validating NHI numbers.
        return NHIValidatorField::create($this->name, $title);
    }
}
