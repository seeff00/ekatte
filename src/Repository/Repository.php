<?php

namespace App\Repository;

use Exception;
use PDO;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected string $tableName;

    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * Repository constructor.
     *
     * @param PDO $db
     * @param string $tableName
     */
    public function __construct(PDO $db, string $tableName)
    {
        $this->db = $db;
        $this->tableName = $tableName;
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function getById(int $id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $stmt->execute(array(":id" => $id));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array|false
     * @throws Exception
     */
    public function getAll(): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $model
     * @param int $page
     * @param int $perPage
     * @return array|false
     * @throws Exception
     */
    public function search(array $model, int $page, int $perPage): array|false
    {
        $where = '';
        if (count(array_keys($model)) > 0) {
            $where = "WHERE " . implode(" = ? AND ", array_keys($model)) . " = ? ";
        }

        $query = "SELECT * FROM $this->tableName $where LIMIT $perPage OFFSET " . ($page - 1) * $perPage;
        $stmt = $this->db->prepare($query);
        $stmt->execute(array_values($model));

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param array $model
     * @return mixed
     * @throws Exception
     */
    public function create(array $model): int
    {
        $intoColumns = implode(",", array_keys($model));
        $placeholders = implode(",", array_fill(0, count(array_keys($model)), "?"));
        $query = "INSERT INTO $this->tableName ($intoColumns) VALUES ($placeholders)";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array_values($model));

        return $stmt->rowCount();
    }

    /**
     * @param array $model
     * @return mixed
     * @throws Exception
     */
    public function update(array $model): int
    {
        $row = $this->getById($model["id"]);
        if (!$row) {
            return 0;
        }

        $updateSets = [];
        foreach (array_keys($model) as $column) {
            $updateSets[] = sprintf("SET %s = ?", $column);
        }
        $updateSetsAsString = implode(", ", $updateSets);

        $query = "UPDATE $this->tableName $updateSetsAsString ,SET updated_at = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(array_values($model));

        return $stmt->rowCount();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->tableName WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function softDelete(int $id): int
    {
        $row = $this->getById($id);
        if (!$row) {
            return 0;
        }

        $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}