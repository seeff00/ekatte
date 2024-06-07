<?php

namespace App\Repository;

use App\Model\ModelInterface ;
use PDO;

class DocumentRepository implements RepositoryInterface
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
    }

    /**
     * Retrieves all documents.
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
     * Create document.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function create(ModelInterface $model): int
    {
        try {
            $query = "INSERT INTO $this->tableName (
                         document,
                         doc_kind,
                         doc_name,
                         doc_name_en,
                         doc_inst,
                         doc_num,
                         doc_date,
                         doc_act,
                         dv_danni,
                         dv_date,
                         created_at
                     ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getDocument(),
                $model->getDocKind(),
                $model->getDocName(),
                $model->getDocNameEn(),
                $model->getDocInst(),
                $model->getDocNum(),
                $model->getDocDate(),
                $model->getDocAct(),
                $model->getDvDanni(),
                $model->getDvDate(),
                $model->getCreatedAt(),
            ]);

            return $stmt->rowCount();
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

        return 0;
    }

    /**
     * Update document.
     *
     * @param ModelInterface $model
     * @return int
     */
    public function update(ModelInterface $model): int
    {
        $document = $this->getById($model->getId());
        if ($document) {
            $query = "UPDATE $this->tableName
                          SET document = ?,
                          SET doc_kind = ?,
                          SET doc_name = ?,
                          SET doc_name_en = ?,
                          SET doc_inst = ?,
                          SET doc_num = ?,
                          SET doc_date = ?,
                          SET doc_act = ?,
                          SET dv_danni = ?,
                          SET dv_date = ?,
                          SET updated_at = ?
                      WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $model->getDocument(),
                $model->getDocKind(),
                $model->getDocName(),
                $model->getDocNameEn(),
                $model->getDocInst(),
                $model->getDocNum(),
                $model->getDocDate(),
                $model->getDocAct(),
                $model->getDvDanni(),
                $model->getDvDate(),
                $model->getUpdatedAt(),
                $model->getId()
            ]);

            return $stmt->rowCount();
        }

        return 0;
    }

    /**
     * Retrieve document from database by ID.
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
     * Delete document by ID.
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
     * Soft delete document by ID.
     *
     * @param int $id
     * @return int
     */
    public function softDelete(int $id): int
    {
        $document = $this->getById($id);
        if ($document) {
            $query = "UPDATE $this->tableName SET is_deleted = false WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);

            return $stmt->rowCount();
        }

        return 0;
    }
}