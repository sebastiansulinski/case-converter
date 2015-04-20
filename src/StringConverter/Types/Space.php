<?php namespace SSD\StringConverter\Types;

use SSD\StringConverter\Converter;
use SSD\StringConverter\RegEx;


class Space extends Converter implements Contract {


    /**
     * Convert to space format.
     * Call optional function on callback.
     *
     * @param \SSD\StringConverter\Types\Contract
     * @param string $string
     * @param null $function
     *
     * @return string
     */
    public function from(Contract $contract, $string, $function = null)
    {

        $string = $contract->recipe($string, 'space');

        if (empty($function)) {

            return $string;

        }

        return call_user_func(
            $function,
            $string
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
            RegEx::REGEX_SPACE,
            [$this, $method],
            $string
        );

    }
}