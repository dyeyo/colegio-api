<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\InstitutionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{
    protected $institutionService;

    public function __construct(InstitutionService $institutionService)
    {
        $this->institutionService = $institutionService;
    }

    public function index()
    {
        return response()->json($this->institutionService->getAll());
    }

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

