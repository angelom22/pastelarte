<?php

namespace App\Providers;

use App\Charts\AdminProfitChart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Schema::defaultStringLength(191);

        $charts->register([
            AdminProfitChart::class
        ]);

        // DB::statement("SET lc_time_names = 'es_ES'");
    }
}
