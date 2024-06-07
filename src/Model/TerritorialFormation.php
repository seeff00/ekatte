<?php

namespace App\Model;

use JsonSerializable;

class TerritorialFormation implements ModelInterface, JsonSerializable
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $ekatte;

    /**
     * @var int
     */
    private int $kind;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $nameEn;

    /**
     * @var string
     */
    private string $area1;

    /**
     * @var string
     */
    private string $area2;

    /**
     * @var int
     */
    private int $document;

    /**
     * @var int
     */
    private int $abc;

    /**
     * @var mixed
     */
    private mixed $createdAt;

    /**
     * @var mixed
     */
    private mixed $updatedAt;

    /**
     * @var bool
     */
    private bool $isDeleted;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEkatte(): string
    {
        return $this->ekatte;
    }

    /**
     * @param string $ekatte
     * @return void
     */
    public function setEkatte(string $ekatte): void
    {
        $this->ekatte = $ekatte;
    }

    /**
     * @return int
     */
    public function getKind(): int
    {
        return $this->kind;
    }

    /**
     * @param int $kind
     * @return void
     */
    public function setKind(int $kind): void
    {
        $this->kind = $kind;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNameEn(): string
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEn
     * @return void
     */
    public function setNameEn(string $nameEn): void
    {
        $this->nameEn = $nameEn;
    }

    /**
     * @return string
     */
    public function getArea1(): string
    {
        return $this->area1;
    }

    /**
     * @param string $area1
     * @return void
     */
    public function setArea1(string $area1): void
    {
        $this->area1 = $area1;
    }

    /**
     * @return string
     */
    public function getArea2(): string
    {
        return $this->area2;
    }

    /**
     * @param string $area2
     * @return void
     */
    public function setArea2(string $area2): void
    {
        $this->area2 = $area2;
    }

    /**
     * @return int
     */
    public function getDocument(): int
    {
        return $this->document;
    }

    /**
     * @param int $document
     * @return void
     */
    public function setDocument(int $document): void
    {
        $this->document = $document;
    }

    /**
     * @return int
     */
    public function getAbc(): int
    {
        return $this->abc;
    }

    /**
     * @param int $abc
     * @return void
     */
    public function setAbc(int $abc): void
    {
        $this->abc = $abc;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt(): mixed
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt(mixed $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt(): mixed
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt(mixed $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param bool $isDeleted
     * @return void
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}