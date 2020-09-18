<?php namespace Modules\Camaras\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Camaras\Entities\Configuracion;
use Modules\Camaras\Repositories\ConfiguracionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ConfiguracionController extends AdminBaseController
{
    /**
     * @var ConfiguracionRepository
     */
    private $configuracion;

    public function __construct(ConfiguracionRepository $configuracion)
    {
        parent::__construct();

        $this->configuracion = $configuracion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$configuraciones = $this->configuracion->all();

        return view('camaras::admin.configuraciones.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('camaras::admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->configuracion->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('camaras::configuraciones.title.configuraciones')]));

        return redirect()->route('admin.camaras.configuracion.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Configuracion $configuracion
     * @return Response
     */
    public function edit(Configuracion $configuracion)
    {
        return view('camaras::admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Configuracion $configuracion
     * @param  Request $request
     * @return Response
     */
    public function update(Configuracion $configuracion, Request $request)
    {
        $this->configuracion->update($configuracion, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('camaras::configuraciones.title.configuraciones')]));

        return redirect()->route('admin.camaras.configuracion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Configuracion $configuracion
     * @return Response
     */
    public function destroy(Configuracion $configuracion)
    {
        $this->configuracion->destroy($configuracion);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('camaras::configuraciones.title.configuraciones')]));

        return redirect()->route('admin.camaras.configuracion.index');
    }
}
