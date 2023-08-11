<?php

namespace Core\Domain\Entity;

use Core\Domain\Validation\DomainValidation;
use Core\Domain\ValueObjects\Uuid;
use DateTime;

class Car extends Entity
{
    public function __construct(
        protected string $model,
        protected int $year,
        protected string $brand,
        protected string $licensePlate,
        protected ?Uuid $id = null,
        protected ?DateTime $createdAt = null
    ){
        $this->id ? $this->id : Uuid::generate();
        $this->createdAt ? $this->createdAt : new DateTime(date('Y-m-d H:i:s'));
        $this->validate();
    }

    private function validate(){
        DomainValidation::notNull($this->model);
        DomainValidation::notNull($this->year);
        DomainValidation::notNull($this->brand);
        DomainValidation::notNull($this->licensePlate);

        DomainValidation::strMinLength($this->model);
        DomainValidation::strMinLength($this->brand);

        DomainValidation::strMaxLength($this->model);
        DomainValidation::strMaxLength($this->brand);
        DomainValidation::strMaxLength($this->licensePlate, 7);
    }

    public function update(string $model, int $year, string $brand, string $licensePlate){
        $this->model = $model;
        $this->year = $year;
        $this->brand = $brand;
        $this->licensePlate = $licensePlate;

        $this->validate();
    }
}