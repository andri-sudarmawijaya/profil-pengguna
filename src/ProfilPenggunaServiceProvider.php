<?php namespace Bantenprov\ProfilPengguna;

use Illuminate\Support\ServiceProvider;
use Bantenprov\ProfilPengguna\Console\Commands\ProfilPenggunaCommand;

/**
 * The ProfilPenggunaServiceProvider class
 *
 * @package Bantenprov\ProfilPengguna
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class ProfilPenggunaServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->traitHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('profil-pengguna', function ($app) {
            return new ProfilPengguna;
        });

        $this->app->singleton('command.profil-pengguna', function ($app) {
            return new ProfilPenggunaCommand;
        });

        $this->commands('command.profil-pengguna');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'profil-pengguna',
            'command.profil-pengguna',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('profil-pengguna.php');

        $this->mergeConfigFrom($packageConfigPath, 'profil-pengguna');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'profil-pengguna-config');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'profil-pengguna');

        $this->publishes([
            $packageViewsPath => resource_path('views/'),
        ], 'profil-pengguna-views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => public_path('vendor/profil-pengguna'),
        ], 'public');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function traitHandle()
    {
        $packageTraitsPath = __DIR__.'/stub/traits/trait.stub';
        $appConfigPath     = base_path('app/Traits/ProfilPenggunaTrait.php');
        

        $this->publishes([
            $packageTraitsPath => $appConfigPath,
        ], 'profil-pengguna-trait');
    }
}
