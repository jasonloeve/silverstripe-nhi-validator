<?php

namespace JasonLoeve\NHIValidator\Utils;

use JasonLoeve\NHIValidator\Utils\LetterExtractor;

class StringValidator
{
    private string $string;
    private string $legacyPattern;
    private string $newFormatPattern;

    /**
     * Constructor initializes the string and its patterns.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
        $this->legacyPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{3}[0-9]$/';
        $this->newFormatPattern = '/^(?=.{7}$)[A-Za-z]{3}[0-9]{2}[A-Za-z]{2}$/';
    }

    /**
     * Validates the string based on the patterns.
     *
     * @return bool True if the string matches either pattern, false otherwise.
     */
    public function validateString(): bool
    {
        // Adapted to return a boolean
        if (preg_match($this->legacyPattern, $this->string)) {
            return $this->processString('legacyFormat');
        } elseif (preg_match($this->newFormatPattern, $this->string)) {
            return $this->processString('newFormat');
        } else {
            return false;
        }
    }

    /**
     * Processes and validates the string based on the specified format type.
     *
     * @param string $formatType Either 'legacyFormat' or 'newFormat'.
     * @return bool True if the string is valid, false otherwise.
     */
    private function processString(string $formatType): bool
    {
        $extractor = new LetterExtractor();

        $nhi = $this->string;
        $chars = str_split($nhi);

        // Calculate the sum based on the format type
        $calc1 = $extractor->extractLetter($chars[0]) * 7;
        $calc2 = $extractor->extractLetter($chars[1]) * 6;
        $calc3 = $extractor->extractLetter($chars[2]) * 5;
        $calc4 = intval($chars[3]) * 4;
        $calc5 = intval($chars[4]) * 3;
        $calc6 = ($formatType === 'newFormat') ? $extractor->extractLetter($chars[5]) * 2 : intval($chars[5]) * 2;
        $sum = $calc1 + $calc2 + $calc3 + $calc4 + $calc5 + $calc6;

        // Calculate the divisor and check digit based on the format type
        $divisor = ($formatType === 'newFormat') ? 23 : 11;
        $rest = $sum % $divisor;
        $check_digit = ($divisor - $rest) === 10 ? 0 : ($divisor - $rest);

        // Compare the last character value with the calculated check digit
        $last_character_value = ($formatType === 'newFormat') ? $extractor->extractLetter($chars[6]) : intval($chars[6]);
        if ($last_character_value !== $check_digit) {
            //echo ucfirst($formatType) . ' format failed - NHI not valid'; // Debug
            return false;
        }

        //echo ucfirst($formatType) . ' format succeeded - NHI is valid'; // Debug

        return true;
    }
}

