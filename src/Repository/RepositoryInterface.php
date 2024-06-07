<?php

namespace App\Repository;

use App\Model\ModelInterface;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed;

    /**
     * @return array|false
     */
    public function getAll(): array|false;

    /**
     * @param ModelInterface $model
     * @param int $page
     * @param int $perPage
     * @return array|false
     */
    public function search(ModelInterface $model, int $page, int $perPage): array|false;

    /**
     * @param ModelInterface $model
     * @return mixed
     */
    public function create(ModelInterface $model): int;

    /**
     * @param ModelInterface $model
     * @return mixed
     */
    public function update(ModelInterface $model): int;

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): int;

    /**
     * @param int $id
     * @return mixed
     */
    public function softDelete(int $id): int;
}