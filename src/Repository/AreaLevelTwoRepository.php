<?php

namespace App\Repository;

use PDO;

class AreaLevelTwoRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "areas_level_two";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * AreaLevelOneRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}