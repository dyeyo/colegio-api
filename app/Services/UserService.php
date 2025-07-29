<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    public function __construct(protected  UserRepositoryInterface $repo)
    {
    }

    public function getAll()
    {
        return $this->repo->all();
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }
}
