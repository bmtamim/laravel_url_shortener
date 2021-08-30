<?php

namespace App\Providers;

use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        View::composer('frontend.home', function ($view) {
            $links = DB::table('links')->select('clicks')->get();
            $totalLinks = $links->count();
            $totalClicks = $links->sum('clicks');
            $todayClicks = DB::table('links')->select('clicks')->whereDate('updated_at', Carbon::today())->sum('clicks');

            $view->with([
                'totalLinks'  => $totalLinks,
                'totalClicks' => $totalClicks,
                'todayClicks' => $todayClicks,
            ]);
        });
    }
}
