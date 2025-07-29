<?php

namespace App\Repositories;

interface SchoolRepositoryInterface
{
    public function allByInstitution($institutionId);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
