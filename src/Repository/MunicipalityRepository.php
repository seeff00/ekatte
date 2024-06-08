<?php

namespace App\Repository;

use PDO;

class MunicipalityRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "municipalities";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * MunicipalityRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}