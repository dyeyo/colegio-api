<?php
use App\Http\Controllers\Api\InstitutionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserCrudController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::apiResource('users', controller: UserCrudController::class);

    Route::get('me', [AuthController::class, 'me']);
    Route::get('institutions', [InstitutionController::class, 'index']);
    Route::post('institutions', [InstitutionController::class, 'store']);

    Route::get('institutions/{id}/schools', [SchoolController::class, 'index']);
    Route::post('schools', [SchoolController::class, 'store']);
    Route::put('schools/{id}', [SchoolController::class, 'update']);
    Route::delete('schools/{id}', [SchoolController::class, 'destroy']);

    Route::post('users/assign-schools', [UserController::class, 'assignToSchool']);
    Route::get('schools/{schoolId}/users', [UserController::class, 'usersBySchool']);
});    
