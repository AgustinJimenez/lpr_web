<?php namespace Modules\Registros\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Registros\Entities\Registro;
use Modules\Registros\Repositories\RegistroRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class RegistroController extends AdminBaseController
{
    /**
     * @var RegistroRepository
     */
    private $registro;

    public function __construct(RegistroRepository $registro)
    {
        parent::__construct();

        $this->registro = $registro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accesos_list = \Acceso::select('id', 'nombre')
                        ->orderBy('nombre')
                        ->lists('nombre', 'id')
                        ->toArray();

        $accesos[''] = 'Todos';

        foreach ($accesos_list as $key => $value) 
            $accesos[$key] = $value;

        return view('registros::admin.registros.index', compact('accesos') );
    }

    public function index_ajax_edit(Registro $registro, Request $re)
    {
        $value = $re->get('value');
        $attribute = $re->get('attribute');

        $registro[$attribute] = $value;
        $registro->save();
    }

    public function index_ajax(Request $re)
    {
        $registros = Registro::select( 'id', 'date_time', 'acceso_id', 'plate', 'is_plate', 'plates_found_dir', 'image_file');

        if ($re->has('fecha_desde') && trim($re->get('fecha_desde')) !== '' )
        {
            $fecha_desde = \Carbon::createFromFormat('d/m/Y H:i', $re->get('fecha_desde'))->subDay()->format('Y-m-d H:i:s');
            $registros->where('date_time', '>=', $fecha_desde  );
           // dd( $registros->toSql().$fecha_desde );
        }

        if ($re->has('fecha_hasta') && trim($re->get('fecha_hasta')) !== '' )
        {
            $fecha_hasta = \Carbon::createFromFormat('d/m/Y H:i', $re->get('fecha_hasta'))->addDay()->format('Y-m-d H:i:s') ;
            $registros->where('date_time', '<', $fecha_hasta );
            //dd( $registros->toSql().$fecha_hasta );
        }

        if($re->has('plate') && trim($re->get('plate')) !== '')
            $registros->where('plate', 'like', "%" . $re->get('plate') . "%" );

        if($re->has('is_plate') && trim($re->get('is_plate')) !== '')
            $registros->where('is_plate', $re->get('is_plate') );

        if($re->has('acceso') && trim($re->get('acceso')) !== '')
            $registros->where('acceso_id', $re->get('acceso') );

        $object = \Datatables::of( $registros )
        ->addColumn('action', function ($tabla)
        {
            $as_edit = "admin.registros.registro.edit";
            $edit_route = route($as_edit, [$tabla->id]);

            $as_delete = "admin.registros.registro.destroy";
            $delete_route = route($as_edit, [$tabla->id]);

            $btn_group = 
            '<div class="btn-group">
                <a href="' . $edit_route . '" class="btn btn-default btn-flat">
                    <i class="glyphicon glyphicon-pencil"></i>
                </a>

                <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="' . $delete_route . '">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
            </div>';

            return $btn_group;
        })
        ->addColumn('acceso_sector_nombre', function ($tabla)
        {
            return $tabla->acceso->sector->nombre;
        })
        ->addColumn('acceso_nombre', function ($tabla)
        {
            return $tabla->acceso->nombre;
        })
        ->addColumn('acceso_tipo', function ($tabla)
        {
            return $tabla->acceso->tipo;
        })
        ->addColumn('imagen', function ($tabla)
        {
            return  '<img src="' . $tabla->small_thumb_url . '" class="imagen btn" alt="Imagen" imagen="' .  $tabla->image_url . '">';
        })
        ->editColumn('date_time', function($tabla)
        {
            return \Carbon::createFromFormat('Y-m-d H:i:s', $tabla->date_time)->format('d/m/Y H:i:s');
        })
        ->editColumn('plate', function($tabla)
        {
            return '<input class="form-control datatable_input-plate datatable-editable-input-focus-off" type="text" value="' . $tabla->plate . '" registro_id="' . $tabla->id . '" campo="plate">
                    <span class="bar"></span>';
        })
        ->editColumn('is_plate', function($tabla)
        {
            $si = ($tabla->is_plate == "SI")?'selected="selected"':'';
            $no = ($tabla->is_plate == "NO")?'selected="selected"':'';
            $probable = ($tabla->is_plate == "PROBABLE")?'selected="selected"':'';

            $select =  '
                            <select class="form-control datatable_select_is_plate" registro_id="' . $tabla->id . '" campo="is_plate">
                                <option value="SI" ' . $si . '>SI</option>
                                <option value="NO" ' . $no . '>NO</option>
                                <option value="PROBABLE" ' . $probable . '>PROBABLE</option>
                            </select>';
            return $select;
        })
        ->make(true);

        $data = $object->getData(true);

        $data['some'] = "here";

        return response()->json( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registros::admin.registros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->registro->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('registros::registros.title.registros')]));

        return redirect()->route('admin.registros.registro.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Registro $registro
     * @return Response
     */
    public function edit(Registro $registro)
    {
        return view('registros::admin.registros.edit', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Registro $registro
     * @param  Request $request
     * @return Response
     */
    public function update(Registro $registro, Request $request)
    {
        $this->registro->update($registro, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('registros::registros.title.registros')]));

        return redirect()->route('admin.registros.registro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Registro $registro
     * @return Response
     */
    public function destroy(Registro $registro)
    {
        $this->registro->destroy($registro);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('registros::registros.title.registros')]));

        return redirect()->route('admin.registros.registro.index');
    }
}
