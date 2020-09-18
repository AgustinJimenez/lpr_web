<?php namespace Modules\Registros\Providers;

use Illuminate\Support\ServiceProvider;

class RegistrosServiceProvider extends ServiceProvider
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
            'Modules\Registros\Repositories\RegistroRepository',
            function () {
                $repository = new \Modules\Registros\Repositories\Eloquent\EloquentRegistroRepository(new \Modules\Registros\Entities\Registro());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Registros\Repositories\Cache\CacheRegistroDecorator($repository);
            }
        );
// add bindings

    }
}
