<?php

namespace JasonLoeve\NHIValidator\Tests;

use SilverStripe\Dev\SapphireTest;
use JasonLoeve\NHIValidator\Utils\LetterExtractor;

class LetterExtractorTest extends SapphireTest
{
    public function testExtractLetter()
    {
        $extractor = new LetterExtractor();

        // Test valid letters
        $this->assertEquals(1, $extractor->extractLetter('A'));
        $this->assertEquals(24, $extractor->extractLetter('Z'));

        // Test a letter that's not in the mapping
        $this->assertEquals(0, $extractor->extractLetter('I'));

        // Test case insensitivity
        $this->assertEquals(1, $extractor->extractLetter('a'));
    }
}
