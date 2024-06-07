<?php

namespace App\Model;

use JsonSerializable;

class TerritorialUnit implements ModelInterface, JsonSerializable
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
     * @var string
     */
    private string $tvm;

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
    private string $oblast;

    /**
     * @var string
     */
    private string $obshtina;

    /**
     * @var string
     */
    private string $kmetstvo;

    /**
     * @var int
     */
    private int $kind;

    /**
     * @var int
     */
    private int $category;

    /**
     * @var int
     */
    private int $altitude;

    /**
     * @var int
     */
    private int $document;

    /**
     * @var string
     */
    private string $abc;

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
    private string $nuts3;

    /**
     * @var string
     */
    private string $text;

    /**
     * @var string
     */
    private string $oblastName;

    /**
     * @var string
     */
    private string $obshtinaName;

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
     * @return string
     */
    public function getTvm(): string
    {
        return $this->tvm;
    }

    /**
     * @param string $tvm
     * @return void
     */
    public function setTvm(string $tvm): void
    {
        $this->tvm = $tvm;
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
    public function getOblast(): string
    {
        return $this->oblast;
    }

    /**
     * @param string $oblast
     * @return void
     */
    public function setOblast(string $oblast): void
    {
        $this->oblast = $oblast;
    }

    /**
     * @param string $obshtina
     * @return void
     */
    public function setObshtina(string $obshtina): void
    {
        $this->obshtina = $obshtina;
    }

    /**
     * @return string
     */
    public function getObshtina(): string
    {
        return $this->obshtina;
    }

    /**
     * @return string
     */
    public function getKmetstvo(): string
    {
        return $this->kmetstvo;
    }

    /**
     * @param string $kmetstvo
     * @return void
     */
    public function setKmetstvo(string $kmetstvo): void
    {
        $this->kmetstvo = $kmetstvo;
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
     * @return int
     */
    public function getCategory(): int
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return void
     */
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getAltitude(): int
    {
        return $this->altitude;
    }

    /**
     * @param int $altitude
     * @return void
     */
    public function setAltitude(int $altitude): void
    {
        $this->altitude = $altitude;
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
     * @return string
     */
    public function getAbc(): string
    {
        return $this->abc;
    }

    /**
     * @param string $abc
     * @return void
     */
    public function setAbc(string $abc): void
    {
        $this->abc = $abc;
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
    public function getNuts3(): string
    {
        return $this->nuts3;
    }

    /**
     * @param string $nuts3
     * @return void
     */
    public function setNuts3(string $nuts3): void
    {
        $this->nuts3 = $nuts3;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getOblastName(): string
    {
        return $this->oblastName;
    }

    /**
     * @param string $oblastName
     * @return void
     */
    public function setOblastName(string $oblastName): void
    {
        $this->oblastName = $oblastName;
    }

    /**
     * @return string
     */
    public function getObshtinaName(): string
    {
        return $this->obshtinaName;
    }

    /**
     * @param string $obshtinaName
     * @return void
     */
    public function setObshtinaName(string $obshtinaName): void
    {
        $this->obshtinaName = $obshtinaName;
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