<?php

namespace Sudip\MediaInput\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/media-input.php', 'media-input'
        );
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'media-input');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'media-input');

        $this->registerComponents();

        $this->publishes([
            __DIR__.'/../../config/media-input.php' => config_path('media-input.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../lang' => lang_path('vendor/media-input'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/media-input'),
        ], 'views');
    }

    /**
     * Register the Blade form components.
     *
     * @return $this
     */
    private function registerComponents(): self
    {
        Blade::componentNamespace('Sudip\\MediaInput\\View\\Components', 'media-input');

        return $this;
    }
}
