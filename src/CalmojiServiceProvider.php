<?php

namespace Ahmad\Calmoji;

use Illuminate\Support\ServiceProvider;

class CalmojiServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../config/config.php' => config_path('calmoji.php'),
                ]
            );
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'calmoji');

        $this->app->singleton(
            'command.calmoji',
            function () {
                return new CalmojiCommand(new Calmoji);
            }
        );
        $this->commands(['command.calmoji']);
    }
}
