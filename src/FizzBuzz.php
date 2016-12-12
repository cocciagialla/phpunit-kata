<?php

class FizzBuzz
{

    /**
     * Given a series of numbers
     * - if divisible by 3 replace with Fizz
     * - if divisible by 5 replace with Buzz
     * - if divisible by 3 nad 5 replace with FizzBuzz
     * @param array $strings
     * @return array
     */
    public function replace(array $strings)
    {
        foreach ($strings as $k => $v) {
            switch (true) {
                case $v % 15 == 0:
                    $strings[$k] = 'FizzBuzz';
                    break;
                case $v % 3 == 0:
                    $strings[$k] = 'Fizz';
                    break;
                case $v % 5 == 0:
                    $strings[$k] = 'Buzz';
                    break;
            }
        }

        return $strings;
    }
}