<?php

namespace App\Repository;

use PDO;

class AreaRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "areas";

    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * AreaRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}