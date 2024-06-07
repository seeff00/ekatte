<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class RegionRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    protected string $tableName = "regions";
    
    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * RegionRepository constructor.
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Retrieve region from database by ID.
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
     * Retrieves all regions.
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
     * Create region.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                         oblast,
                         ekatte,
                         name,
                         name_en,
                         region,
                         nuts1,
                         nuts2,
                         nuts3,
                         document,
                         full_name_bul,
                         created_at
                     ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getOblast(),
                $model->getEkatte(),
                $model->getName(),
                $model->getNameEn(),
                $model->getRegion(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getDocument(),
                $model->getFullNameBul(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update region.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $region = $this->getById($model->getId());
        if ($region) {
            $query = "UPDATE $this->tableName 
                          SET oblast = ?, 
                          SET ekatte = ?, 
                          SET name = ?, 
                          SET name_en = ?, 
                          SET region = ?,
                          SET nuts1 = ?,
                          SET nuts2 = ?,
                          SET nuts3 = ?,
                          SET document = ?,
                          SET full_name_bul = ?,
                          SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getOblast(),
                $model->getEkatte(),
                $model->getName(),
                $model->getNameEn(),
                $model->getRegion(),
                $model->getNuts1(),
                $model->getNuts2(),
                $model->getNuts3(),
                $model->getDocument(),
                $model->getFullNameBul(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Delete region by ID.
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
     * Soft delete region by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $region = $this->getById($id);
        if ($region) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}