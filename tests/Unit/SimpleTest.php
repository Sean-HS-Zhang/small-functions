<?php

namespace Tests\Unit;

use Tests\TestCase;

class SimpleTest extends TestCase
{
    /**
     * Verify duplicate checking function.
     *
     * @return void
     */
    public function testWordValidation()
    {
        $response = $this->get('/wordValidation/hasDuplicate');
        $response->assertSee('No word is provided');

        $response = $this->get('/wordValidation/hasDuplicate?word=documentarily');
        $this->assertTrue($response->original === true);

        $response = $this->get('/wordValidation/hasDuplicate?word=Double-down');
        $this->assertTrue($response->original === false);
    }

    /**
     * Verify parsing date function.
     *
     * @return void
     */
    public function testDateParsing()
    {
        $response = $this->get('/date/parsing');
        $response->assertSee('No date is provided');

        $response = $this->get('/date/parsing?date_description=The first Monday of October 2019');
        $response->assertSee('2019-10-07');
    }

    /**
     * Verify merging string function.
     *
     * @return void
     */
    public function testStringMerging()
    {
        $response = $this->get('/stringAction/merge');
        $response->assertSee('Two strings are required');

        $response = $this->get('/stringAction/merge?string_1=sean&string_2=zhang');
        $response->assertSee('szehaanng');

        $response = $this->get('/stringAction/merge?string_1=MICHAEL&string_2=JORDAN');
        $response->assertSee('MJIOCRHDAAENL');
    }

    /**
     * Verify super int function.
     *
     * @return void
     */
    public function testSuperIntCalculation()
    {
        $response = $this->get('/number/superInt');
        $response->assertSee('Please provide an integer');

        $response = $this->get('/number/superInt?number=4');
        $response->assertSee('4');

        $response = $this->get('/number/superInt?number=258');
        $response->assertSee('6');
    }

    /**
     * Verify the result of parsed XML file.
     *
     * @return void
     */
    public function testXmlParsingResult()
    {
        $response = $this->get('/xml/parsing');
        $response->assertSee('{"1P3115":"commercial","1P0116":"commercial","1P0117":"commercial","1P0118":"rental","1P0119":"rural","1P0120":"business","1P0121":"business","1P0122":"business","1P0123":"holidayRental","1P0036":"residential","1P0006":"commercial","2631096":"holidayRental"}', false);
    }
}
