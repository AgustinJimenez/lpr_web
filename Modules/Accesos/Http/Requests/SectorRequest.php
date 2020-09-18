<?php namespace Modules\Accesos\Http\Requests;

use App\Http\Requests\Request;

class SectorRequest extends Request
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
          'nombre' => 'required|max:255|unique:accesos__sectores,nombre'. ($this->sector ? ','.$this->sector->id  : ''),
          'descripcion' => 'max:2000',
          'activo' => 'required',
      ];
    }
}
