<?php namespace Modules\Accesos\Http\Requests;

use App\Http\Requests\Request;

class AccesoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'nombre' => 'required|max:255|unique:accesos__accesos,nombre'. ($this->acceso ? ','.$this->acceso->id  : ''),
          'entrada_salida' => 'required|in:Entrada,Salida',
          'externa_interna' => 'required|in:Externa,Interna',
          'activo' => 'required',
          'sector_id' => 'required',
          'camara_lpr_id' => 'unique:accesos__accesos,camara_lpr_id'. ($this->acceso ? ','.$this->acceso->id  : ''),
      ];
    }
}
