<?php namespace Modules\Accesos\Entities;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $table = 'accesos__accesos';
    public $translatedAttributes = [];
    protected $fillable = ['nombre','entrada_salida','externa_interna',
                      'sector_id','activo','camara_lpr_id'];

    protected $appends = ['activo_formateado',];

    function getActivoFormateadoAttribute() {
        return $this->activo == 1 ? "SI":"NO";
    }

    function getTipoAttribute(){
      return $this->entrada_salida . "/" . $this->externa_interna;
    }

    static function enumOptions(){
      return [
                "entrada_salida" => ["Entrada" => "Entrada",
                                    "Salida" => "Salida"],
                "externa_interna" => ["Externa" => "Externa",
                                    "Interna" => "Interna"],
              ];
    }

    public function setCamaraLprIdAttribute($value) {
      $this->attributes['camara_lpr_id'] = $value ?: null;
    }

    public function sector()
    {
        return $this->belongsTo('Modules\Accesos\Entities\Sector');
    }

    public function camara_lpr()
    {
        return $this->belongsTo('Modules\Camaras\Entities\Camara');
    }

    public function registros()
    {
        return $this->hasMany('Modules\Registros\Entities\Registro');
    }
}
