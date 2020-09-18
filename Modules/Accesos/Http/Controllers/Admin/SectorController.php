<?php namespace Modules\Accesos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Accesos\Entities\Sector;
use Modules\Accesos\Repositories\SectorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Accesos\Http\Requests\SectorRequest;

class SectorController extends AdminBaseController
{
    /**
     * @var SectorRepository
     */
    private $sector;

    public function __construct(SectorRepository $sector)
    {
        parent::__construct();

        $this->sector = $sector;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sectores = Sector::orderBy('nombre', 'ASC')->get();

        return view('accesos::admin.sectores.index', compact('sectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('accesos::admin.sectores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(SectorRequest $request)
    {
        $this->sector->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('accesos::sectores.title.sectores')]));

        return redirect()->route('admin.accesos.sector.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Sector $sector
     * @return Response
     */
    public function edit(Sector $sector)
    {
        return view('accesos::admin.sectores.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Sector $sector
     * @param  Request $request
     * @return Response
     */
    public function update(Sector $sector, SectorRequest $request)
    {
        $this->sector->update($sector, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('accesos::sectores.title.sectores')]));

        return redirect()->route('admin.accesos.sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Sector $sector
     * @return Response
     */
    public function destroy(Sector $sector)
    {
        $this->sector->destroy($sector);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('accesos::sectores.title.sectores')]));

        return redirect()->route('admin.accesos.sector.index');
    }
}
