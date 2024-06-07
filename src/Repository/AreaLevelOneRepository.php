<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class AreaLevelOneRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected string $tableName = "areas_level_one";

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
    }

    /**
     * Retrieves all areas level one.
     *
     * @return array|false
     */
    public function getAll(): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param ModelInterface $model
     * @param int $page
     * @param int $perPage
     * @return array|false
     */
    public function search(ModelInterface $model, int $page, int $perPage): array|false
    {
        $modelAsArray = $model->jsonSerialize();

        $where = '';
        if (count(array_keys($modelAsArray)) > 0) {
            $where = ' WHERE ' . implode(' = ? AND ', array_keys($modelAsArray)) . ' = ? ';
        }

        $query = "SELECT * FROM $this->tableName $where LIMIT $perPage OFFSET " . ($page - 1) * $perPage;
        $stmt = $this->db->prepare($query);
        $stmt->execute(array_values($modelAsArray));

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Create area level one.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                         region,
                         nuts1,
                         name,
                         name_en,
                         document,
                         created_at
                     ) VALUES (?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getRegion(),
                $model->getNuts1(),
                $model->getName(),
                $model->getNameEn(),
                $model->getDocument(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update area level one.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $areaLevelOne = $this->getById($model->getId());
        if ($areaLevelOne) {
            $query = "UPDATE $this->tableName 
                          SET region = ?,
                          SET nuts1 = ?,
                          SET name = ?, 
                          SET name_en = ?,
                          SET document = ?,
                          SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getRegion(),
                $model->getNuts1(),
                $model->getName(),
                $model->getNameEn(),
                $model->getDocument(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve area level one from database by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $stmt->execute(array(":id" => $id));

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Delete area level one by ID.
     *
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        $query = "DELETE FROM $this->tableName WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }

    /**
     * Soft delete area level one by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $areaLevelOne = $this->getById($id);
        if ($areaLevelOne) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}