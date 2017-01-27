<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/23/2017
 * Time: 11:32 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer(['errors.404', 'layouts.master','home.index'], function ($view) {
            $categories=$this->app->make('App\Interfaces\CategoryRepositoryInterface')->getAllCategory();
            $banners=$this->app->make('App\Interfaces\BannerRepositoryInterface')->getAllBanner();
            $view->with('categories',$categories)
                 ->with('banners',$banners);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
