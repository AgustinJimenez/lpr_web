<?php namespace Modules\Registros\Repositories\Cache;

use Modules\Registros\Repositories\RegistroRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRegistroDecorator extends BaseCacheDecorator implements RegistroRepository
{
    public function __construct(RegistroRepository $registro)
    {
        parent::__construct();
        $this->entityName = 'registros.registros';
        $this->repository = $registro;
    }
}
