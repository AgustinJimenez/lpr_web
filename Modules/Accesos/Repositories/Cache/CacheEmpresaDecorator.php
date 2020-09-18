<?php namespace Modules\Accesos\Repositories\Cache;

use Modules\Accesos\Repositories\EmpresaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEmpresaDecorator extends BaseCacheDecorator implements EmpresaRepository
{
    public function __construct(EmpresaRepository $empresa)
    {
        parent::__construct();
        $this->entityName = 'accesos.empresas';
        $this->repository = $empresa;
    }
}
