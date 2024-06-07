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
}