<?php

namespace App\Providers\ServiceImplementation;

use App\Services\User\CandidatePairService;
use App\Services\User\CandidatePairServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceImplementationProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        CandidatePairService::class => CandidatePairServiceImpl::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            CandidatePairService::class,
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
