<?php namespace Modules\Accesos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Accesos\Entities\Empresa;
use Modules\Accesos\Repositories\EmpresaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class EmpresaController extends AdminBaseController
{
    /**
     * @var EmpresaRepository
     */
    private $empresa;

    public function __construct(EmpresaRepository $empresa)
    {
        parent::__construct();

        $this->empresa = $empresa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$empresas = $this->empresa->all();

        return view('accesos::admin.empresas.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('accesos::admin.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->empresa->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('accesos::empresas.title.empresas')]));

        return redirect()->route('admin.accesos.empresa.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Empresa $empresa
     * @return Response
     */
    public function edit(Empresa $empresa)
    {
        return view('accesos::admin.empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Empresa $empresa
     * @param  Request $request
     * @return Response
     */
    public function update(Empresa $empresa, Request $request)
    {
        $this->empresa->update($empresa, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('accesos::empresas.title.empresas')]));

        return redirect()->route('admin.accesos.empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Empresa $empresa
     * @return Response
     */
    public function destroy(Empresa $empresa)
    {
        $this->empresa->destroy($empresa);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('accesos::empresas.title.empresas')]));

        return redirect()->route('admin.accesos.empresa.index');
    }
}
