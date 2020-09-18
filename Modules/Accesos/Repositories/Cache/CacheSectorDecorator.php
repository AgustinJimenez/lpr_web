<?php namespace Modules\Accesos\Repositories\Cache;

use Modules\Accesos\Repositories\SectorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSectorDecorator extends BaseCacheDecorator implements SectorRepository
{
    public function __construct(SectorRepository $sector)
    {
        parent::__construct();
        $this->entityName = 'accesos.sectores';
        $this->repository = $sector;
    }
}
