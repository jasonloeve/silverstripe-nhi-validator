<?php

namespace JasonLoeve\NHIValidator\Forms;

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Validator;
use JasonLoeve\NHIValidator\Utils\StringValidator;

/**
 * NHIValidatorField represents a form input field specifically designed
 * to handle and validate National Health Index (NHI) numbers.
 */
class NHIValidatorField extends TextField
{
    /**
     * Constructs the NHIValidatorField.
     *
     * @param string $name Name of the form input field.
     * @param null|string $title Title or label for the input field.
     * @param string $value Pre-filled value for the field.
     * @param null|Form $form The parent form instance (if any) this field belongs to.
     */
    public function __construct($name, $title = null, $value = '', $form = null)
    {
        // Assign the field to the provided form, if a form is given.
        if ($form) {
            $this->setForm($form);
        }

        // Call the parent constructor while defining a maximum character limit of 7.
        parent::__construct($name, $title, $value, $form);

        // Add a CSS class 'text' to the field for styling.
        $this->addExtraClass('text');
    }

    /**
     * Validates the current value of the field against NHI formats.
     *
     * @return bool True if the value is a valid NHI string, false otherwise.
     */
    public function validateString(): bool
    {
        // Instantiate the string validator with the current field value.
        $validator = new StringValidator($this->Value());

        // Return the validation result.
        return $validator->validateString();
    }

    /**
     * Validates the field value both for basic TextField requirements and NHI specifics.
     *
     * @param Validator $validator Validator instance for registering validation errors.
     * @return bool True if validation passes, false otherwise.
     */
    public function validate($validator)
    {
        // First, ensure basic TextField validations are satisfied.
        if (!parent::validate($validator)) {
            return false;
        }

        // Then, check if the value is a valid NHI format.
        if (!$this->validateString()) {
            // If not, add a validation error to the field.
            $validator->validationError(
                $this->getName(),
                _t('JasonLoeve\NHIValidator\Forms\NHIValidatorField.INVALID_FORMAT', 'Invalid NHI format.'),
                "validation"
            );
            return false;
        }
        return true;
    }
}
