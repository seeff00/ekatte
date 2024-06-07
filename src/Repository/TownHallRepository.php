<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class TownHallRepository implements RepositoryInterface
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
    }

    /**
     * Retrieves all town halls.
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
     * Create town hall.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                        kmetstvo,
                        name,
                        name_en,
                        ekatte,
                        document,
                        category,
                        nuts1,
                        nuts2,
                        nuts3,
                        created_at
                     ) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getKmetstvo(),
                $model->getName(),
                $model->getNameEn(),
                $model->getEkatte(),
                $model->getDocument(),
                $model->getCategory(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update town hall.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $townHall = $this->getById($model->getId());
        if ($townHall) {
            $query = "UPDATE $this->tableName 
                        SET kmetstvo = ?,
                        SET name = ?, 
                        SET name_en = ?,
                        SET ekatte = ?,                        
                        SET document = ?,
                        SET category = ?,
                        SET nuts1 = ?,
                        SET nuts2 = ?,
                        SET nuts3 = ?,
                        SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getKmetstvo(),
                $model->getName(),
                $model->getNameEn(),
                $model->getEkatte(),
                $model->getDocument(),
                $model->getCategory(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve town hall from database by ID.
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
     * Delete town hall by ID.
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
     * Soft delete town hall by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $townHall = $this->getById($id);
        if ($townHall) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}