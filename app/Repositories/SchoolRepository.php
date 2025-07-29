<?php

namespace App\Repositories;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function allByInstitution($institutionId)
    {
        return School::where('institution_id', $institutionId)->with('users')->get();
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function update($id, array $data)
    {
        $school = School::findOrFail($id);
        $school->update($data);
        return $school;
    }

    public function delete($id)
    {
        return School::destroy($id);
    }
}
