<?php

namespace MichaelBarrows\Portfolio\Providers;

use Illuminate\Support\ServiceProvider;
use MichaelBarrows\Portfolio\Models\Contact;
use MichaelBarrows\Portfolio\Models\Education;
use MichaelBarrows\Portfolio\Models\Employment;
use MichaelBarrows\Portfolio\Observers\ContactObserver;
use MichaelBarrows\Portfolio\Observers\EducationObserver;
use MichaelBarrows\Portfolio\Observers\EmploymentObserver;
use PDO;

class PortfolioServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Contact::observe(ContactObserver::class);
        Education::observe(EducationObserver::class);
        Employment::observe(EmploymentObserver::class);

        $this->loadRoutesFrom(__DIR__.'/../Routes/portfolio.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->publishes([
            __DIR__.'/../Config/portfolio.php' => config_path('portfolio.php'),
        ], 'portfolio');

        config(['database.connections.portfolio' => [
                'driver' => 'mysql',
                'url' => config('portfolio.database.url', env('PORTFOLIO_DATABASE_URL')),
                'host' => config('portfolio.database.host', env('PORTFOLIO_DB_HOST', '127.0.0.1')),
                'port' => config('portfolio.database.port', env('PORTFOLIO_DB_PORT', '3306')),
                'database' => config('portfolio.database.database', env('PORTFOLIO_DB_DATABASE', 'forge')),
                'username' => config('portfolio.database.username', env('PORTFOLIO_DB_USERNAME', 'forge')),
                'password' => config('portfolio.database.password', env('PORTFOLIO_DB_PASSWORD', '')),
                'unix_socket' => config('portfolio.database.socket', env('PORTFOLIO_DB_SOCKET', '')),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => config('portfolio.database.MYSQL_ATTR_SSL_CA', env('MYSQL_ATTR_SSL_CA')),
                ]) : [],
        ]]);
    }
}
