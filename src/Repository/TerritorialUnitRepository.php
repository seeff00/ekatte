<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use Exception;
use PDO;

class TerritorialUnitRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected string $tableName = "territorial_units";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * TerritorialUnitRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Retrieves all $this->tableName.
     *
     * @return array|false
     */
    public function getAll(): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
     * Create territorial unit.
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
                        oblast,
                        obshtina,
                        kmetstvo,
                        kind,
                        category,
                        altitude,
                        document,
                        abc,
                        nuts1,
                        nuts2,
                        nuts3,
                        text,
                        oblast_name,
                        obshtina_name,
                        created_at
                     ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getTVM(),
                $model->getName(),
                $model->getNameEn(),
                $model->getOblast(),
                $model->getObshtina(),
                $model->getKmetstvo(),
                $model->getKind(),
                $model->getCategory(),
                $model->getAltitude(),
                $model->getDocument(),
                $model->getAbc(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getText(),
                $model->getOblastName(),
                $model->getObshtinaName(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update territorial unit.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $territorialUnit = $this->getById($model->getId());
        if ($territorialUnit) {
            $query = "UPDATE $this->tableName 
                        SET ekatte = ?,
                        SET t_v_m = ?,                        
                        SET name = ?, 
                        SET name_en = ?,
                        SET oblast = ?,
                        SET obshtina = ?,
                        SET kmetstvo = ?,
                        SET kind = ?,
                        SET category = ?,
                        SET altitude = ?,
                        SET document = ?,
                        SET abc = ?,
                        SET nuts1 = ?,
                        SET nuts2 = ?,
                        SET nuts3 = ?,
                        SET text = ?,
                        SET oblast_name = ?,
                        SET obshtina_name = ?,
                        SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getTVM(),
                $model->getName(),
                $model->getNameEn(),
                $model->getOblast(),
                $model->getObshtina(),
                $model->getKmetstvo(),
                $model->getKind(),
                $model->getCategory(),
                $model->getAltitude(),
                $model->getDocument(),
                $model->getAbc(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getText(),
                $model->getOblastName(),
                $model->getObshtinaName(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve territorial unit from database by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $stmt->execute(array(":id" => $id));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Delete territorial unit by ID.
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
     * Soft delete territorial unit by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $territorialUnit = $this->getById($id);
        if ($territorialUnit) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}