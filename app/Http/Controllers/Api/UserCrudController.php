<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserCrudController
 *
 * Controlador para la gestión de usuarios.
 * Provee métodos para listar, crear, ver, actualizar y eliminar usuarios.
 */
class UserCrudController extends Controller
{
    /**
     * Constructor del controlador.
     *
     * @param UserService $service Servicio para la lógica de negocio de usuarios.
     */
    public function __construct(protected UserService $service) {}

    /**
     * Lista todos los usuarios.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->service->getAll());
    }

    /**
     * Crea un nuevo usuario.
     *
     * @param StoreUserRequest $request Datos validados para el nuevo usuario.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    /**
     * Muestra un usuario específico.
     *
     * @param int $id ID del usuario.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->service->find($id));
    }

    /**
     * Actualiza un usuario existente.
     *
     * @param UpdateUserRequest $request Datos validados para actualizar el usuario.
     * @param int $id ID del usuario a actualizar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        return response()->json($this->service->update($id, $request->validated()));
    }

    /**
     * Elimina un usuario.
     *
     * @param int $id ID del usuario a eliminar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
