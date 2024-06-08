<?php

namespace App\Repository;

use PDO;

class TownHallRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "town_halls";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * TownHallRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}