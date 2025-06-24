<?php

namespace App\Providers;

use App\Models\Logo;
use App\Models\News;
use App\Models\Contact;
use App\Models\FrontendMenu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

	if($this->app->environment('production')) {
	    \URL::forceScheme('https');
	}

        Paginator::useBootstrap();

        $mujib100 = Logo::where('status', 1)->where('id', 1)->first();
        view()->share('mujib100', $mujib100);
 
        $bupLogo = Logo::where('status', 1)->where('id', 2)->first();
        view()->share('bupLogo', $bupLogo);

        $top_menus = FrontendMenu::where('menu_type_id', 1)->where('status', 1)->orderBy('sort_order', 'asc')->get();
        view()->share('top_menus', $top_menus);

        $contacts  = Contact::first();
        view()->share('contacts', $contacts);

        $latest_news  = News::latest()->take(6)->get();
        view()->share('latest_news', $latest_news);

    }
}
