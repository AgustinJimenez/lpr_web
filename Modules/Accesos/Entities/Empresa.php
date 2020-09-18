<?php namespace Modules\Accesos\Entities;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'accesos__empresas';
    public $translatedAttributes = [];
    protected $fillable = [];
}
