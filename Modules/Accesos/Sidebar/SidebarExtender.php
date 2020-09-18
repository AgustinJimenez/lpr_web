<?php namespace Modules\Accesos\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Accesos'), function (Item $item) {
                $item->icon('fa fa-exchange');
                $item->weight(1);
                $item->authorize(
                     /* append */
                );
                // $item->item(trans('accesos::empresas.title.empresas'), function (Item $item) {
                //     $item->icon('fa fa-copy');
                //     $item->weight(0);
                //     $item->append('admin.accesos.empresa.create');
                //     $item->route('admin.accesos.empresa.index');
                //     $item->authorize(
                //         $this->auth->hasAccess('accesos.empresas.index')
                //     );
                // });

                $item->item(trans('Sectores'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.accesos.sector.create');
                    $item->route('admin.accesos.sector.index');
                    $item->authorize(
                        $this->auth->hasAccess('accesos.sectores.index')
                    );
                });

                $item->item(trans('Accesos'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.accesos.acceso.create');
                    $item->route('admin.accesos.acceso.index');
                    $item->authorize(
                        $this->auth->hasAccess('accesos.accesos.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
