<?php

namespace App\Utils;

use DateTime;

class Common
{
    /**
     * Parse JSON file to associative array.
     *
     * @param string $file
     * @return array
     */
    public static function parseJsonFile(string $file): array
    {
        if (str_contains($file, '.json')) {
            return json_decode(file_get_contents($file), true);
        }

        return [];
    }

    /**
     * @param string|null $date
     * @param string $format
     * @return bool
     */
    public static function validateDate(?string $date, string $format = 'Y-m-d'): bool
    {
        if (!$date){
            return false;
        }

        $d = DateTime::createFromFormat($format, $date);

        return $d && $d->format($format) == $date;
    }

    /**
     * Clears array from empty values.
     *
     * @param array $array
     * @return array
     */
    public static function clearArray(array $array): array {
        $clearedArray = [];

        foreach ($array as $key => $value) {
            if(!empty(trim($value))){
                $clearedArray[$key] = $value;
            }
        }

        return $clearedArray;
    }
}