<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function assignToSchool(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'school_ids' => 'required|array',
            'school_ids.*' => 'exists:schools,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->schools()->sync($request->school_ids); // asignar múltiples colegios

        return response()->json(['message' => 'Asignado correctamente.']);
    }

    public function usersBySchool($schoolId)
    {
        $school = School::with('users')->findOrFail($schoolId);
        return response()->json($school->users);
    }
}
