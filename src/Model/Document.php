<?php

namespace App\Model;

use JsonSerializable;

class Document implements ModelInterface, JsonSerializable
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var int
     */
    private int $document;

    /**
     * @var string
     */
    private string $docKind;

    /**
     * @var string
     */
    private string $docName;

    /**
     * @var string
     */
    private string $docNameEn;

    /**
     * @var string
     */
    private string $docInst;

    /**
     * @var string
     */
    private string $docNum;

    /**
     * @var mixed
     */
    private mixed $docDate;

    /**
     * @var mixed
     */
    private mixed $docAct;

    /**
     * @var string
     */
    private string $dvDanni;

    /**
     * @var mixed
     */
    private mixed $dvDate;

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
    public function getDocKind(): string
    {
        return $this->docKind;
    }

    /**
     * @param string $docKind
     * @return void
     */
    public function setDocKind(string $docKind): void
    {
        $this->docKind = $docKind;
    }

    /**
     * @return string
     */
    public function getDocName(): string
    {
        return $this->docName;
    }

    /**
     * @param string $docName
     * @return void
     */
    public function setDocName(string $docName): void
    {
        $this->docName = $docName;
    }

    /**
     * @return string
     */
    public function getDocNameEn(): string
    {
        return $this->docNameEn;
    }

    /**
     * @param string $docNameEn
     * @return void
     */
    public function setDocNameEn(string $docNameEn): void
    {
        $this->docNameEn = $docNameEn;
    }

    /**
     * @return string
     */
    public function getDocInst(): string
    {
        return $this->docInst;
    }

    /**
     * @param string $docInst
     * @return void
     */
    public function setDocInst(string $docInst): void
    {
        $this->docInst = $docInst;
    }

    /**
     * @return string
     */
    public function getDocNum(): string
    {
        return $this->docNum;
    }

    /**
     * @param string $docNum
     * @return void
     */
    public function setDocNum(string $docNum): void
    {
        $this->docNum = $docNum;
    }

    /**
     * @return mixed
     */
    public function getDocDate(): mixed
    {
        return $this->docDate;
    }

    /**
     * @param mixed $docDate
     * @return void
     */
    public function setDocDate(mixed $docDate): void
    {
        $this->docDate = $docDate;
    }

    /**
     * @return mixed
     */
    public function getDocAct(): mixed
    {
        return $this->docAct;
    }

    /**
     * @param mixed $docAct
     * @return void
     */
    public function setDocAct(mixed $docAct): void
    {
        $this->docAct = $docAct;
    }

    /**
     * @return string
     */
    public function getDvDanni(): string
    {
        return $this->dvDanni;
    }

    /**
     * @param string $dvDanni
     * @return void
     */
    public function setDvDanni(string $dvDanni): void
    {
        $this->dvDanni = $dvDanni;
    }

    /**
     * @return mixed
     */
    public function getDvDate(): mixed
    {
        return $this->dvDate;
    }

    /**
     * @param mixed $dvDate
     * @return void
     */
    public function setDvDate(mixed $dvDate): void
    {
        $this->dvDate = $dvDate;
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