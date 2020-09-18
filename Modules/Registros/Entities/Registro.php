<?php namespace Modules\Registros\Entities;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros__registros';
    public $translatedAttributes = [];
    protected $fillable = [];

    public function acceso()
    {
        return $this->belongsTo('Modules\Accesos\Entities\Acceso');
    }

    public function format_attributes()
    {
        $this->date_time = \Carbon::createFromFormat('Y-m-d H:i:s', $this->date_time)->format('d/m/Y H:i:s');
        return $this;
    }

    public function getImageUrlAttribute()
    {
        return $this->plates_found_dir  . "/" . $this->image_file;
    }

    public function getSmallThumbUrlAttribute()
    {
        return $this->plates_found_dir  . "/" . $this->small_thumb_file;
    }

    public function getSmallThumbFileAttribute()
    {
      return implode(".",array_slice(explode(".",$this->image_file),0,-1)) . "_small_thumb.jpg";
    }
}
