<?php namespace Modules\Accesos\Entities;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'accesos__sectores';
    protected $fillable = ['nombre','descripcion','activo'];
    protected $appends = ['activo_formateado',];

    function getActivoFormateadoAttribute() {
        return $this->activo == 1 ? "SI":"NO";
    }

    public function accesos()
    {
        return $this->hasMany('Modules\Accesos\Entities\Acceso');
    }
}
