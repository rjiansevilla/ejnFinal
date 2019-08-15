<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

//MODElS
use App\User;
use App\Models\Activities;
use App\Models\Numbers;
use App\Models\Products;
use App\Models\Agents;
use App\Models\Transactions;
use App\Models\Cheque;
use App\Models\Stations;
use App\Models\Banks;
use App\Models\Shipments;

//Services
use App\Services\UserServices;
use App\Services\ActivityServices;
use App\Services\NumberServices;
use App\Services\AgentServices;
use App\Services\ProductServices;
use App\Services\TransactionServices;
use App\Services\ChequeServices;
use App\Services\BankServices;
use App\Services\StationServices;
use App\Services\ShipmentServices;

//Repository
use App\Repositories\Repository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('App\Services\UserServices', function () {
            return new UserServices(new Repository(new User));
        });

        $this->app->singleton('App\Services\ActivityServices', function () {
            return new ActivityServices(new Repository(new Activities));
        });

        $this->app->singleton('App\Services\NumberServices', function () {
            return new NumberServices(new Repository(new Numbers));
        });

        $this->app->singleton('App\Services\AgentServices', function () {
            return new AgentServices(new Repository(new Agents));
        });

        $this->app->singleton('App\Services\ProductServices', function () {
            return new ProductServices(new Repository(new Products));
        });

        $this->app->singleton('App\Services\TransactionServices', function () {
            return new TransactionServices(new Repository(new Transactions));
        });

        $this->app->singleton('App\Services\ChequeServices', function () {
            return new ChequeServices(new Repository(new Cheque));
        });

        $this->app->singleton('App\Services\BankServices', function () {
            return new BankServices(new Repository(new Banks));
        });

        $this->app->singleton('App\Services\StationServices', function () {
            return new StationServices(new Repository(new Stations));
        });

        $this->app->singleton('App\Services\ShipmentServices', function () {
            return new ShipmentServices(new Repository(new Shipments));
        });
        
    }
}
