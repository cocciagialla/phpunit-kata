<?php


class CalcStatsTest extends PHPUnit_Framework_TestCase
{
    /** @var  CalcStats */
    private $calcStats;

    private $numbers = [6, 9, 15, -2, 92, 11];

    public function setUp()
    {
        parent::setUp();
        $this->calcStats = new CalcStats($this->numbers);
    }

    public function testCalcMinValue()
    {
        $this->assertEquals(-2, $this->calcStats->calcMinValue());
    }

    public function testCalcMaxValue()
    {
        $this->assertEquals(92, $this->calcStats->calcMaxValue());
    }

    public function testCountElems()
    {
        $this->assertEquals(6, $this->calcStats->countElems());
    }

    public function testCalcAverage()
    {
        $this->assertEquals(21.833333, $this->calcStats->calcAverage());
    }
}
