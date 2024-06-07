<?php

namespace App\Model;

use JsonSerializable;

class AreaLevelTwo implements ModelInterface, JsonSerializable
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $region;

    /**
     * @var string
     */
    private string $nuts1;

    /**
     * @var string
     */
    private string $nuts2;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $nameEn;

    /**
     * @var int
     */
    private int $document;

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
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param string $region
     * @return void
     */
    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getNuts1(): string
    {
        return $this->nuts1;
    }

    /**
     * @param string $nuts1
     * @return void
     */
    public function setNuts1(string $nuts1): void
    {
        $this->nuts1 = $nuts1;
    }

    /**
     * @return string
     */
    public function getNuts2(): string
    {
        return $this->nuts2;
    }

    /**
     * @param string $nuts2
     * @return void
     */
    public function setNuts2(string $nuts2): void
    {
        $this->nuts2 = $nuts2;
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