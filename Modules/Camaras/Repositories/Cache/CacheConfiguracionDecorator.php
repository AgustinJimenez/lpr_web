<?php namespace Modules\Camaras\Repositories\Cache;

use Modules\Camaras\Repositories\ConfiguracionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheConfiguracionDecorator extends BaseCacheDecorator implements ConfiguracionRepository
{
    public function __construct(ConfiguracionRepository $configuracion)
    {
        parent::__construct();
        $this->entityName = 'camaras.configuraciones';
        $this->repository = $configuracion;
    }
}
