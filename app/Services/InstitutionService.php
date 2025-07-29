<?php

namespace App\Services;

use App\Repositories\InstitutionRepositoryInterface;

class InstitutionService
{
    protected InstitutionRepositoryInterface $repository;

    public function __construct(InstitutionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
