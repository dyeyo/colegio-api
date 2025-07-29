<?php

namespace App\Repositories;

use App\Models\Institution;

class InstitutionRepository implements InstitutionRepositoryInterface
{

    public function all()
    {
        return Institution::with('schools')->get();
    }

    public function create(array $data)
    {
        return Institution::create($data);
    }
}
