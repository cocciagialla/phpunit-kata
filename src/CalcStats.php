<?php


class CalcStats
{
    /** @var  array */
    private $numbers;

    /**
     * CalcStats constructor.
     */
    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function calcMinValue()
    {
        sort($this->numbers);
        return reset($this->numbers);
    }

    public function calcMaxValue()
    {
        sort($this->numbers);
        return end($this->numbers);
    }

    public function countElems()
    {
        return count($this->numbers);
    }

    public function calcAverage()
    {
        $sum = 0;
        foreach ($this->numbers as $number) {
            $sum += $number;
        }

        return round($sum / count($this->numbers), 6);
    }
}