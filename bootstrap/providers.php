<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\MorphMapServiceProvider::class,

    // Service Implementation Providers
    App\Providers\ServiceImplementation\AuthServiceImplementationProvider::class,

    // Repository Implementation Providers
    App\Providers\RepositoryImplementation\UserRepositoryImplementationProvider::class,
];
