<?php

namespace MichaelBarrows\Portfolio\Providers;

use Illuminate\Support\ServiceProvider;
use MichaelBarrows\Portfolio\Console\Commands\SeedPortfolioData;
use MichaelBarrows\Portfolio\Models\Contact;
use MichaelBarrows\Portfolio\Observers\ContactObserver;
use PDO;

class PortfolioServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Contact::observe(ContactObserver::class);

        $this->commands([
            SeedPortfolioData::class,
        ]);

        $this->loadRoutesFrom(__DIR__.'/../Routes/portfolio.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        config(['database.connections.portfolio' => [
                'driver' => 'mysql',
                'url' => env('PORTFOLIO_DATABASE_URL'),
                'host' => env('PORTFOLIO_DB_HOST', '127.0.0.1'),
                'port' => env('PORTFOLIO_DB_PORT', '3306'),
                'database' => env('PORTFOLIO_DB_DATABASE', 'forge'),
                'username' => env('PORTFOLIO_DB_USERNAME', 'forge'),
                'password' => env('PORTFOLIO_DB_PASSWORD', ''),
                'unix_socket' => env('PORTFOLIO_DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
        ]]);

        $this->publishes([
            __DIR__.'/../Config/portfolio.php' => config_path('portfolio.php'),
        ], 'portfolio');
    }
}
