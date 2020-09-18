<?php namespace Modules\Camaras\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Camaras\Entities\Camara;
use Modules\Camaras\Repositories\CamaraRepository;
use Modules\User\Repositories\Sentinel\SentinelAuthentication;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Camaras\Http\Requests\CamaraRequest;


class CamaraController extends AdminBaseController
{
    /**
     * @var CamaraRepository
     */
    private $camara;

    public function __construct(CamaraRepository $camara, SentinelAuthentication $auth)
    {
        parent::__construct();

        $this->camara = $camara;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $camaras = Camara::orderBy('nombre','ASC')->get();

        return view('camaras::admin.camaras.index', compact('camaras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $advanced_config = $this->auth->hasAccess('camaras.camaras.advancedconfig');
        $enum_options = Camara::enumOptions();
        return view('camaras::admin.camaras.create',compact('enum_options','advanced_config'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CamaraRequest $request)
    {
        $this->camara->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('camaras::camaras.title.camaras')]));

        return redirect()->route('admin.camaras.camara.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Camara $camara
     * @return Response
     */
    public function edit(Camara $camara)
    {
        $advanced_config = $this->auth->hasAccess('camaras.camaras.advancedconfig');
        $enum_options = Camara::enumOptions();
        return view('camaras::admin.camaras.edit', compact('camara','enum_options','advanced_config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Camara $camara
     * @param  Request $request
     * @return Response
     */
    public function update(Camara $camara, CamaraRequest $request)
    {
        $this->camara->update($camara, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('camaras::camaras.title.camaras')]));

        return redirect()->route('admin.camaras.camara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Camara $camara
     * @return Response
     */
    public function destroy(Camara $camara)
    {
        $this->camara->destroy($camara);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('camaras::camaras.title.camaras')]));

        return redirect()->route('admin.camaras.camara.index');
    }


}
