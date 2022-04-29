<?php

namespace App\Providers;

use App\Interface\Modules\ContactGroupRepositoryInterface;
use App\Repository\Modules\ContactGroupRepository;
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
