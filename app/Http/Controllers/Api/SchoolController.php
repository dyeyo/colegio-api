<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Services\SchoolService;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    /**
     * @OA\Get(
     *     path="/api/schools/{institutionId}",
     *     summary="Listar escuelas por institución",
     *     tags={"Schools"},
     *     @OA\Parameter(
     *         name="institutionId",
     *         in="path",
     *         required=true,
     *         description="ID de la institución",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Listado de escuelas"
     *     )
     * )
     */
    public function index($institutionId)
    {
        return response()->json($this->schoolService->listByInstitution($institutionId));
    }

    /**
     * @OA\Post(
     *     path="/api/schools",
     *     summary="Crear una nueva escuela",
     *     tags={"Schools"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="institution_id", type="integer"),
     *             @OA\Property(property="code", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Escuela creada exitosamente"
     *     )
     * )
     */
    public function store(StoreSchoolRequest $request)
    {
        return response()->json($this->schoolService->create($request->validated()), 201);
    }

    /**
     * @OA\Put(
     *     path="/api/schools/{id}",
     *     summary="Actualizar una escuela",
     *     tags={"Schools"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la escuela",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="code", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Escuela actualizada exitosamente"
     *     )
     * )
     */
    public function update(UpdateSchoolRequest $request, $id)
    {
        return response()->json($this->schoolService->update($id, $request->validated()));
    }

    /**
     * @OA\Delete(
     *     path="/api/schools/{id}",
     *     summary="Eliminar una escuela",
     *     tags={"Schools"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID de la escuela",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Escuela eliminada exitosamente"
     *     )
     * )
     */
    public function destroy($id)
    {
        return response()->json($this->schoolService->delete($id));
    }
}
