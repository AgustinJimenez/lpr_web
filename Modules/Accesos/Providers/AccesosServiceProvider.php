<?php namespace Modules\Accesos\Providers;

use Illuminate\Support\ServiceProvider;

class AccesosServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Accesos\Repositories\EmpresaRepository',
            function () {
                $repository = new \Modules\Accesos\Repositories\Eloquent\EloquentEmpresaRepository(new \Modules\Accesos\Entities\Empresa());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Accesos\Repositories\Cache\CacheEmpresaDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Accesos\Repositories\SectorRepository',
            function () {
                $repository = new \Modules\Accesos\Repositories\Eloquent\EloquentSectorRepository(new \Modules\Accesos\Entities\Sector());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Accesos\Repositories\Cache\CacheSectorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Accesos\Repositories\AccesoRepository',
            function () {
                $repository = new \Modules\Accesos\Repositories\Eloquent\EloquentAccesoRepository(new \Modules\Accesos\Entities\Acceso());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Accesos\Repositories\Cache\CacheAccesoDecorator($repository);
            }
        );
// add bindings



    }
}
