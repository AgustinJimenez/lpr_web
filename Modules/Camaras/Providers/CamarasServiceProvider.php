<?php namespace Modules\Camaras\Providers;

use Illuminate\Support\ServiceProvider;

class CamarasServiceProvider extends ServiceProvider
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
            'Modules\Camaras\Repositories\CamaraRepository',
            function () {
                $repository = new \Modules\Camaras\Repositories\Eloquent\EloquentCamaraRepository(new \Modules\Camaras\Entities\Camara());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Camaras\Repositories\Cache\CacheCamaraDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Camaras\Repositories\ConfiguracionRepository',
            function () {
                $repository = new \Modules\Camaras\Repositories\Eloquent\EloquentConfiguracionRepository(new \Modules\Camaras\Entities\Configuracion());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Camaras\Repositories\Cache\CacheConfiguracionDecorator($repository);
            }
        );
// add bindings


    }
}
