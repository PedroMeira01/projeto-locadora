<?php

namespace Core\Domain\Repository\Interfaces;

use Core\Domain\Entity\Entity;

interface BaseRepositoryInterface
{
    public function insert(Entity $entity): Entity;
    public function findById(string $id): Entity;
    public function findAll(string $filter = '', $order = 'DESC'): array;
    public function paginate(string $filter = '', $order = 'DESC', $page = 1, $totalPerPage = 15): PaginationInterface;
    public function update(Entity $entity): Entity;
    public function delete(string $id): Entity;
}