<?php

namespace App\Repositories;

interface InstitutionRepositoryInterface
{
    public function all();
    public function create(array $data);
}
