<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserCrudController extends Controller
{
     public function __construct(protected UserService $service) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(StoreUserRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function show($id)
    {
        return response()->json($this->service->find($id));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        return response()->json($this->service->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
