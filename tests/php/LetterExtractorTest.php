<?php

namespace JasonLoeve\NHIValidator\Tests;

use SilverStripe\Dev\SapphireTest;
use JasonLoeve\NHIValidator\Utils\LetterExtractor;

class LetterExtractorTest extends SapphireTest
{
    // Test the extractLetter method with valid inputs
    public function testExtractLetterWithValidLetters()
    {
        $extractor = new LetterExtractor();

        // Test valid letters
        $this->assertEquals(1, $extractor->extractLetter('A'));
        $this->assertEquals(7, $extractor->extractLetter('G'));
        $this->assertEquals(24, $extractor->extractLetter('Z'));

        // Test a letter that's not in the mapping
        $this->assertEquals(0, $extractor->extractLetter('I'));
    }

    // Test the extractLetter method with invalid letter
    public function testExtractLetterWithInvalidLetter()
    {
        $extractor = new LetterExtractor();

        // Test an invalid letter
        $this->assertEquals(0, $extractor->extractLetter('I'));
    }
}
