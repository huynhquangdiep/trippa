<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('glide', function ($app) {
            return ServerFactory::create([
                'source' => \Storage::disk('image')->getDriver(),
                'cache' => \Storage::disk('image')->getDriver(),
                'cache_path_prefix' => 'cache',
                'base_url' => null,
                'max_image_size' => 2000 * 2000,
                'presets' => [
                    'thumbnail' => [
                        'w' => 100,
                        'h' => 100,
                        'fit' => 'crop',
                    ],
                    'small' => [
                        'w' => 320,
                        'h' => 240,
                        'fit' => 'crop',
                    ],
                    'medium' => [
                        'w' => 640,
                        'h' => 480,
                        'fit' => 'crop',
                    ],
                    'large' => [
                        'w' => 800,
                        'h' => 600,
                        'fit' => 'crop',
                    ],
                    'slider' => [
                        'w' => 900,
                        'h' => 450,
                        'fit' => 'crop',
                    ],
                ],
                'response' => new LaravelResponseFactory(),
            ]);
        });
    }
}
