<?php namespace Modules\Camaras\Http\Requests;

use App\Http\Requests\Request;
use Modules\Accesos\Entities\Acceso;

class CamaraRequest extends Request
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
          'nombre' => 'required|max:255|unique:camaras__camaras,nombre'. ($this->camara ? ','.$this->camara->id  : ''),
          'source' => 'in:camera,video',
          'crop_data' => 'json',
          'perspective_data' => 'json',
      ];
    }

    public function getValidatorInstance() {

        $validator = parent::getValidatorInstance();

        $validator->after(function() use ($validator) {
            if(!$this->controlarTipoCamara()){
                $message = 'No se puede editar el tipo de cámara,
                            ya que está asociada a su tipo de
                            cámara actual en Acceso.';
                $validator->errors ()->add('tipo', $message);
            }
        });

        return $validator;
    }

    private function controlarTipoCamara(){
        if ($this->camara){
            if ($this->camara->tipo != $this->request->get('tipo')){
                $accesos = Acceso::where('camara_lpr_id', $this->camara->id)->get();
                return $accesos->isEmpty() ? true : false;
            }
        }
        return true;
    }

}
