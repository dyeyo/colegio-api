<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;

/**
 * Class UserController
 *
 * Controlador para operaciones personalizadas de usuarios, como asignación a escuelas
 * y obtención de usuarios por escuela.
 */
class UserController extends Controller
{
    /**
     * Asigna un usuario a una o más escuelas.
     *
     * @param Request $request Contiene los campos `user_id` y `school_ids`.
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignToSchool(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'school_ids' => 'required|array',
            'school_ids.*' => 'exists:schools,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->schools()->sync($request->school_ids);

        return response()->json(['message' => 'Asignado correctamente.']);
    }

    /**
     * Retorna los usuarios asignados a una escuela específica.
     *
     * @param int $schoolId ID de la escuela.
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersBySchool($schoolId)
    {
        $school = School::with('users')->findOrFail($schoolId);
        return response()->json($school->users);
    }
}
