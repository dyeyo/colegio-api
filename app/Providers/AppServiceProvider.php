<?php

namespace App\Providers;

use App\Repositories\InstitutionRepository;
use App\Repositories\InstitutionRepositoryInterface;
use App\Repositories\SchoolRepository;
use App\Repositories\SchoolRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(InstitutionRepositoryInterface::class, InstitutionRepository::class);
         $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
         $this->app->bind(InstitutionRepositoryInterface::class, InstitutionRepository::class);
         $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
