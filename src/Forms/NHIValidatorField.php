<?php

namespace JasonLoeve\NHIValidator\Forms;

use SilverStripe\Forms\Form;
use SilverStripe\Forms\TextField;

/**
 * NHI validator field
 */
class NHIValidatorField extends TextField
{
    /**
     * Returns an input field.
     *
     * @param string $name
     * @param null|string $title
     * @param string $value
     * @param null|Form $form
     */
    public function __construct($name, $title = null, $value = '', $form = null)
    {
        if ($form) {
            $this->setForm($form);
        }

        parent::__construct($name, $title, 7, $value, $form);
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



//
//
//
///**
// * Validate this field
// *
// * @param Validator $validator
// * @return bool
// */
//public function validate($validator)
//{
//    $result = true;
//    if (!is_null($this->maxLength) && mb_strlen($this->value ?? '') > $this->maxLength) {
//        $name = strip_tags($this->Title() ? $this->Title() : $this->getName());
//        $validator->validationError(
//            $this->name,
//            _t(
//                'SilverStripe\\Forms\\TextField.VALIDATEMAXLENGTH',
//                'The value for {name} must not exceed {maxLength} characters in length',
//                ['name' => $name, 'maxLength' => $this->maxLength]
//            ),
//            "validation"
//        );
//        $result = false;
//    }
//    return $this->extendValidationResult($result, $validator);
//}
//
//public function getSchemaValidation()
//{
//    $rules = parent::getSchemaValidation();
//    if ($this->getMaxLength()) {
//        $rules['max'] = [
//            'length' => $this->getMaxLength(),
//        ];
//    }
//    return $rules;
//}
