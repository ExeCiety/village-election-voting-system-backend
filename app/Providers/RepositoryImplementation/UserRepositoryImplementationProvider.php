<?php

namespace App\Providers\RepositoryImplementation;

use App\Repositories\Permission\RoleRepository;
use App\Repositories\Permission\RoleRepositoryImpl;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserRepositoryImplementationProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        RoleRepository::class => RoleRepositoryImpl::class,
        UserRepository::class => UserRepositoryImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            RoleRepository::class,
            UserRepository::class,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
