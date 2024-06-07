<?php

namespace App\Repository;

use PDO;
use PDOException;
use Exception;

class DB
{
    /**
     * @var PDO
     */
    private static PDO $instance;

    /**
     * The constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct() { }

    /**
     * Based on 'Singleton pattern' this function will always return a single PDO instance.
     *
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if(!isset(self::$instance)) {
            try {
                $options = [
                    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
                ];
                self::$instance = new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }

        return self::$instance;
    }

    /**
     * Prevent cloning.
     *
     * @return void
     */
    protected function __clone() : void { }

    /**
     * Prevent restore from strings.
     *
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }
}