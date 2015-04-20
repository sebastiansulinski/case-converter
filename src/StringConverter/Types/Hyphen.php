<?php namespace SSD\StringConverter\Types;

use SSD\StringConverter\Converter;
use SSD\StringConverter\RegEx;


class Hyphen extends Converter implements Contract {


    /**
     * Convert to hyphen format.
     *
     * @param \SSD\StringConverter\Types\Contract
     * @param string $string
     *
     * @return string
     */
    public function from(Contract $contract, $string)
    {

        return strtolower(
            $contract->recipe(
                $string,
                'hyphen'
            )
        );

    }

    /**
     * Return result of the regular expression replacement.
     *
     * @param $string
     * @param $method
     *
     * @return string
     */
    public function recipe($string, $method)
    {

        return preg_replace_callback(
            RegEx::REGEX_HYPHEN,
            [$this, $method],
            $string
        );

    }
}