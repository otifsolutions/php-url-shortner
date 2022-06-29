<?php

namespace OTIFSolutions\ShortUrlApp;

use Illuminate\Support\ServiceProvider;
use OTIFSolutions\ShortUrlApp\Http\Middleware\ShortUrlApp;

class ShortUrlServiceProvider extends ServiceProvider {

    public function register() {

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
    public function boot() {

    }
}
