<?php namespace Modules\Accesos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Accesos\Entities\Acceso;
use Modules\Accesos\Repositories\AccesoRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Accesos\Entities\Sector;
use Modules\Camaras\Entities\Camara;
use Modules\Accesos\Http\Requests\AccesoRequest;
use Illuminate\Support\Facades\Route;

class AccesoController extends AdminBaseController
{
    /**
     * @var AccesoRepository
     */
    private $acceso;

    public function __construct(AccesoRepository $acceso)
    {
        parent::__construct();

        $this->acceso = $acceso;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $accesos = Acceso::orderBy('nombre', 'ASC')->get();

        return view('accesos::admin.accesos.index', compact('accesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $sectores = Sector::orderBy("nombre")->lists('nombre','id')->all();
        $camaras = Camara::orderBy("nombre")->where('tipo','LPR')
                        ->lists('nombre','id')->all();
        $enum_options = Acceso::enumOptions();
        return view('accesos::admin.accesos.create', compact('enum_options','sectores','camaras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(AccesoRequest $request)
    {
        $this->acceso->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('accesos::accesos.title.accesos')]));

        return redirect()->route('admin.accesos.acceso.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Acceso $acceso
     * @return Response
     */
    public function edit(Acceso $acceso)
    {
        $sectores = Sector::orderBy("nombre")->lists('nombre','id')->all();
        $camaras = Camara::orderBy("nombre")->where('tipo','LPR')
                        ->lists('nombre','id')->all();
        $enum_options = Acceso::enumOptions();


        return view('accesos::admin.accesos.edit', compact('acceso','sectores','enum_options','camaras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Acceso $acceso
     * @param  Request $request
     * @return Response
     */
    public function update(Acceso $acceso, AccesoRequest $request)
    {
        $this->acceso->update($acceso, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('accesos::accesos.title.accesos')]));

        return redirect()->route('admin.accesos.acceso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Acceso $acceso
     * @return Response
     */
    public function destroy(Acceso $acceso)
    {
        $this->acceso->destroy($acceso);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('accesos::accesos.title.accesos')]));

        return redirect()->route('admin.accesos.acceso.index');
    }
}
