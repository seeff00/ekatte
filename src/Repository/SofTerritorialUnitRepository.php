<?php

namespace App\Repository;

use PDO;

class SofTerritorialUnitRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "sof_territorial_units";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * SofTerritorialUnitRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}