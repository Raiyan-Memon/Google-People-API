<?php

namespace App\Providers;

use App\Interface\Modules\ContactGroupRepositoryInterface;
use App\Interface\Modules\UserRepositoryInterface;
use App\Repository\Modules\ContactGroupRepository;
use App\Repository\Modules\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactGroupRepositoryInterface::class, ContactGroupRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
