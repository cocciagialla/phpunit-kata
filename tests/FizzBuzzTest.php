<?php

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    /** @var  FizzBuzz */
    private $fizzBuzz;

    public function setUp()
    {
        parent::setUp();
        $this->fizzBuzz = new FizzBuzz();
    }

    public function testNumberDivisibleBy3AreReplacedByFizz()
    {
        $strings = [3, 6, 9];
        $expected = ['Fizz', 'Fizz', 'Fizz'];
        $this->assertEquals($expected, $this->fizzBuzz->replace($strings));
    }

    public function testNumberDivisibleBy5AreReplacedByBuzz()
    {
        $strings = [5, 10, 20];
        $expected = ['Buzz', 'Buzz', 'Buzz'];
        $this->assertEquals($expected, $this->fizzBuzz->replace($strings));
    }

    public function testNumberDivisibleBy5And5AreReplacedByFizzBuzz()
    {
        $strings = [15, 30];
        $expected = ['FizzBuzz', 'FizzBuzz'];
        $this->assertEquals($expected, $this->fizzBuzz->replace($strings));
    }

    /**
     * @dataProvider providerTestAllCases
     */
    public function testAllCases($provided, $expected)
    {
        $strings = [15, 30];
        $expected = ['FizzBuzz', 'FizzBuzz'];
        $this->assertEquals($expected, $this->fizzBuzz->replace($strings));
    }

    public function providerTestAllCases()
    {
        return [
            [[15, 30], ['FizzBuzz', 'FizzBuzz']],
            [[3, 6, 8, 10, 20, 30], ['Fizz', 'Fizz', 8, 'Buzz', 'Buzz', 'FizzBuzz']],
        ];

    }
}
