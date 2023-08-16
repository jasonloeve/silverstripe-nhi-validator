# silverstripe-nhi-validator

The SilverStripe NHI Validator module is a valuable extension for SilverStripe CMS, designed to enhance the validation process of NHI (National Health Index) numbers. This module provides a convenient validator input field that can be seamlessly integrated into both the CMS and the frontend of your website or web application.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Features
1. ***NHI Number Validation:*** The module enables you to validate NHI numbers, ensuring their accuracy and compliance with the current and upcoming NHI format standards.


2. ***Effortless Integration:*** Easily incorporate the NHI validator input field into your SilverStripe CMS, allowing for streamlined validation of NHI numbers within your content management system.


3. ***User-Friendly Frontend Validation:*** Extend the validation functionality to the frontend of your website or web application, providing a seamless user experience by ensuring the correctness of NHI numbers entered by users.


4. ***Improved Data Integrity:*** With the NHI Validator module, you can eliminate the need for manual validation processes, reducing the risk of data errors and improving the overall data integrity.

## Requirements
PHP 8  
SilverStripe Framework 5

## Installation
Install using composer
```bash
composer require jasonloeve/silverstripe-nhi-validator ^5@dev
```

## Usage
To specify an NHI database field on a DataObject, you can create a new class called "Patient" that extends "DataObject" and define the "NHINumber" field as a custom database field with the type "NHIField," which is equivalent to a Varchar(7). Additionally, when scaffolding a form, any NHI database field will automatically use the "NHIField" form field instead of the standard "TextField."

```php
<?php

use JasonLoeve\NHIValidator\FieldType\NHIField;use SilverStripe\ORM\DataObject;

class Patient extends DataObject
{
    private static $db = [
        'NHINumber' => NHIField::class,
    ];

    ...
}
```

## Validation

## License
This software is licensed under the BSD-3-Clause License.
