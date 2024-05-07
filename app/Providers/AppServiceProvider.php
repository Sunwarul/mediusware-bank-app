<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\IAuthService;
use App\Services\IUserService;
use App\Services\UserService;
use App\Services\WithdrawService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use IWithdrawService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IWithdrawService::class, WithdrawService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
