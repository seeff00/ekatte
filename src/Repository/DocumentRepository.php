<?php

namespace App\Repository;

use PDO;

class DocumentRepository extends Repository
{
    /**
     * @var string
     */
    protected string $tableName = "documents";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * DocumentRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
        parent::__construct($db, $this->tableName);
    }
}