<?php

namespace KodeKraft\OpenSwarm;

use Exception;

/**
 * Class Replacer
 *
 * @package KodeKraft\OpenSwarm
 */
class Replacer
{
    /**
     * Takes an array and iterates through the values, calls functions
     * referenced in any placeholders, and sets the value.
     *
     * @param array $body
     *
     * @return mixed
     * @throws Exception
     */
    public static function replace(array &$body)
    {
        foreach ($body as $key => &$value) {
            if (self::isPlaceHolder($value)) {
                $token = strtok($value, "{ }");
                $array = explode('|', $token);
                $function = $array[0];

                if (function_exists($function)) {
                    $body[$key] = call_user_func_array($function, self::parseArguments($array));
                    continue;
                }

                throw new Exception("Unknown function '{$function}' for '{$key}'.");
            }

            if (is_array($value)) {
                self::replace($value);
            }
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private static function isPlaceHolder($value)
    {
        return is_string($value) && preg_match('/{{[\W\w]+}}/', $value);
    }

    /**
     * @param array $arguments
     *
     * @return array
     */
    private static function parseArguments(array $arguments = [])
    {
        if (isset($arguments[1])) {
            $arguments = explode(',', $arguments[1]);
        }

        return $arguments;
    }
}
