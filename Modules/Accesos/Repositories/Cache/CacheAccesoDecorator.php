<?php namespace Modules\Accesos\Repositories\Cache;

use Modules\Accesos\Repositories\AccesoRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAccesoDecorator extends BaseCacheDecorator implements AccesoRepository
{
    public function __construct(AccesoRepository $acceso)
    {
        parent::__construct();
        $this->entityName = 'accesos.accesos';
        $this->repository = $acceso;
    }
}
