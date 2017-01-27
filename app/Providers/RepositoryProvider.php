<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 9/12/2016
 * Time: 11:45 PM
 */

namespace App\Providers;

use App\Repositories\BannerRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {

        $this->app->bind('App\Interfaces\CategoryRepositoryInterface', function ($app) {
            return new CategoryRepository();
        });
        $this->app->bind('App\Interfaces\BannerRepositoryInterface', function ($app) {
            return new BannerRepository();
        });
    }
}
