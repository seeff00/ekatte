<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class SofTerritorialUnitRepository implements RepositoryInterface
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
    }

    /**
     * Retrieves all sof territorial units.
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
     * Create sof territorial unit.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                       ekatte,
                       t_v_m,
                       name,
                       name_en,
                       raion,
                       kind,
                       document,
                       created_at
                     ) VALUES (?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getTVM(),
                $model->getName(),
                $model->getNameEn(),
                $model->getRaion(),
                $model->getKind(),
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
     * Update sof territorial unit.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $sofTerritorialUnit = $this->getById($model->getId());
        if ($sofTerritorialUnit) {
            $query = "UPDATE $this->tableName 
                          SET ekatte = ?,
                          SET t_v_m = ?,
                          SET name = ?, 
                          SET name_en = ?,
                          SET raion = ?,
                          SET kind = ?,
                          SET document = ?,
                          SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getTVM(),
                $model->getName(),
                $model->getNameEn(),
                $model->getRaion(),
                $model->getKind(),
                $model->getDocument(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve sof territorial unit from database by ID.
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
     * Delete sof territorial unit by ID.
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
     * Soft delete sof territorial unit by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $sofTerritorialUnit = $this->getById($id);
        if ($sofTerritorialUnit) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}