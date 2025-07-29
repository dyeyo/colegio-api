<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index($institutionId)
    {
        return response()->json($this->schoolService->listByInstitution($institutionId));
    }

    public function store(StoreSchoolRequest $request)
    {
        return response()->json($this->schoolService->create($request->validated()), 201);
    }

    public function update(UpdateSchoolRequest $request, $id)
    {
        return response()->json($this->schoolService->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json($this->schoolService->delete($id));
    }
}
