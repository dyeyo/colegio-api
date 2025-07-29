<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\InstitutionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(
 *     name="Institution",
 *     description="Operaciones relacionadas con instituciones"
 * )
 */
/**
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class InstitutionController extends Controller
{
    protected $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    /**
     * @OA\Get(
     *     path="/api/institutions",
     *     operationId="getInstitutions",
     *     tags={"Institution"},
     *     summary="Obtener lista de instituciones",
     *     description="Retorna todas las instituciones registradas",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de instituciones",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="rut", type="string"),
     *                 @OA\Property(property="region", type="string"),
     *                 @OA\Property(property="comuna", type="string"),
     *                 @OA\Property(property="address", type="string"),
     *                 @OA\Property(property="phone", type="string"),
     *                 @OA\Property(property="start_date", type="string", format="date"),
     *                 @OA\Property(property="created_by", type="integer")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json($this->institutionService->getAll());
    }

    /**
     * @OA\Post(
     *     path="/api/institutions",
     *     operationId="storeInstitution",
     *     tags={"Institution"},
     *     summary="Registrar una nueva institución",
     *     description="Crea una nueva institución en la base de datos",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","rut","region","comuna","address","phone","start_date"},
     *             @OA\Property(property="name", type="string", example="Institución ABC"),
     *             @OA\Property(property="rut", type="string", example="12345678-9"),
     *             @OA\Property(property="region", type="string", example="Región Metropolitana"),
     *             @OA\Property(property="comuna", type="string", example="Santiago"),
     *             @OA\Property(property="address", type="string", example="Calle Falsa 123"),
     *             @OA\Property(property="phone", type="string", example="+56 9 1234 5678"),
     *             @OA\Property(property="start_date", type="string", format="date", example="2023-01-01")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Institución creada exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="rut", type="string"),
     *             @OA\Property(property="region", type="string"),
     *             @OA\Property(property="comuna", type="string"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="phone", type="string"),
     *             @OA\Property(property="start_date", type="string", format="date"),
     *             @OA\Property(property="created_by", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Errores de validación"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'rut' => 'required|unique:institutions',
            'region' => 'required',
            'comuna' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'start_date' => 'required|date',
        ]);

        $validated['created_by'] = 1;

        $institution = $this->institutionService->create($validated);

        return response()->json($institution, 201);
    }
}

