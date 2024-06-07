<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class TerritorialFormationsRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected string $tableName = "territorial_formations";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * TerritorialFormationsRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Retrieves all territorial formations.
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
     * Create territorial formation.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                        ekatte,
                        kind,
                        name,
                        name_en,
                        area1,
                        area2,
                        document,
                        abc,
                        created_at
                     ) VALUES (?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getKind(),
                $model->getName(),
                $model->getNameEn(),
                $model->getArea1(),
                $model->getArea2(),
                $model->getDocument(),
                $model->getAbc(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update territorial formation.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $territorialFormation = $this->getById($model->getId());
        if ($territorialFormation) {
            $query = "UPDATE $this->tableName 
                        SET ekatte = ?,
                        SET kind = ?,
                        SET name = ?, 
                        SET name_en = ?,
                        SET area1 = ?,
                        SET area2 = ?,
                        SET document = ?,
                        SET abc = ?,
                        SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getEkatte(),
                $model->getKind(),
                $model->getName(),
                $model->getNameEn(),
                $model->getArea1(),
                $model->getArea2(),
                $model->getDocument(),
                $model->getAbc(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve territorial formation from database by ID.
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
     * Delete territorial formation by ID.
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
     * Soft delete territorial formation by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $territorialFormation = $this->getById($id);
        if ($territorialFormation) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}