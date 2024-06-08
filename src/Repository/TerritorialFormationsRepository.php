<?php

namespace App\Repository;

use PDO;

class TerritorialFormationsRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "territorial_formations";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * TerritorialFormationsRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}