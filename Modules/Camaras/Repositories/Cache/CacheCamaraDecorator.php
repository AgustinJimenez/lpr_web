<?php namespace Modules\Camaras\Repositories\Cache;

use Modules\Camaras\Repositories\CamaraRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCamaraDecorator extends BaseCacheDecorator implements CamaraRepository
{
    public function __construct(CamaraRepository $camara)
    {
        parent::__construct();
        $this->entityName = 'camaras.camaras';
        $this->repository = $camara;
    }
}
