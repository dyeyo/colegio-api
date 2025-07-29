<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este espacio de nombres se aplicará automáticamente a sus controladores.
     *
     * Nota: Ya no se usa por defecto en Laravel 8+ pero puedes usarlo si quieres.
     */
    public const HOME = '/home';

    /**
     * Define tus rutas aquí.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Cargar rutas API con prefijo /api y middleware 'api'
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Cargar rutas web normales
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
