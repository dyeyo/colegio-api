<?php

namespace App\Services;

use App\Repositories\SchoolRepositoryInterface;

class SchoolService
{
    protected SchoolRepositoryInterface $schoolRepo;

    public function __construct(SchoolRepositoryInterface $schoolRepo)
    {
        $this->schoolRepo = $schoolRepo;
    }

    public function listByInstitution($id)
    {
        return $this->schoolRepo->allByInstitution($id);
    }

    public function create(array $data)
    {
        return $this->schoolRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->schoolRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->schoolRepo->delete($id);
    }
}
