<?php

namespace JasonLoeve\NHIValidator\Forms;

use JasonLoeve\NHIValidator\NHIField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\TextField;

/**
 * NHI validator field
 */
class NHIValidatorField extends TextField
{
    public function __construct($name, $title = null, $value = '', $form = null)
    {
        parent::__construct($name, $title, $value, 7, $form);
    }

    public function validateString()
    {

    }

    private function processString(string $formatType)
    {

    }

    private function extractLetter($c)
    {

    }
}
