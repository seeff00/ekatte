<?php

namespace App\Repository;

use PDO;

class RegionRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "regions";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * RegionRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}