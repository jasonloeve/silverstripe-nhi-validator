# silverstripe-nhi-validator

The SilverStripe NHI Validator module is a valuable extension for SilverStripe CMS, designed to enhance the validation process of NHI (National Health Index) numbers. This module provides a convenient validator input field that can be seamlessly integrated into both the CMS and the frontend of your website or web application.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Features
1. ***NHI Number Validation:*** The module enables you to validate NHI numbers, ensuring their accuracy and compliance with current and upcoming NHI format standards.
2. ***Effortless Integration:*** Easily incorporate the NHI validator input field into your SilverStripe CMS, allowing for streamlined validation of NHI numbers within your content management system.
3. ***User-Friendly Frontend Validation:*** Extend the validation functionality to the frontend of your website or web application, providing a seamless user experience by ensuring the correctness of NHI numbers entered by users.
4. ***Improved Data Integrity:*** With the NHI Validator module, you can eliminate the need for manual validation processes, reducing the risk of data errors and improving overall data integrity.

## Requirements
PHP 8  
SilverStripe Framework 4 / 5

## Installation
Install using composer
```bash
composer require jasonloeve/silverstripe-nhi-validator
```

## Usage

### Admin dataObject field

To add NHI number validation to a DataObject, which can then be manipulated in the SilverStripe admin:

```php
<?php

use SilverStripe\ORM\DataObject;
use JasonLoeve\NHIValidator\FieldType\NHIField;

class Patient extends DataObject
{
    private static $db = [
        'NHINumber' => NHIField::class,
    ];

    //...
}
```

### Frontend Form Validation Usage

To integrate NHI number validation into a frontend form, utilize the NHIValidatorField. This form field provides necessary validations and UI elements for users to input valid NHI numbers.

```php
<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\Form;
    use JasonLoeve\NHIValidator\Forms\NHIValidatorField;

    class PageController extends ContentController
    {
        private static $allowed_actions = [
            'PatientForm',
        ];
        
        public function PatientForm()
        {
            $fields = FieldList::create(
                NHIValidatorField::create('NHINumber', 'NHINumber')
            );

            $actions = FieldList::create(
                FormAction::create('handleSubmit', 'Submit')
            );

            return Form::create($this, 'PatientForm', $fields, $actions);
        }

        public function handleSubmit($data, Form $form)
        {
            //...
        }
    }
}
```

## License
This software is licensed under the BSD-3-Clause License.
