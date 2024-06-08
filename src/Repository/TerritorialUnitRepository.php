<?php

namespace App\Repository;

use Exception;
use PDO;

class TerritorialUnitRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "territorial_units";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * TerritorialUnitRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}