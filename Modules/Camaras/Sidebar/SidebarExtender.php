<?php namespace Modules\Camaras\Sidebar;

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
            $group->item(trans('Camaras'), function (Item $item) {
                $item->icon('fa fa-camera');
                $item->weight(2);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('camaras::camaras.title.camaras'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.camaras.camara.create');
                    $item->route('admin.camaras.camara.index');
                    $item->authorize(
                        $this->auth->hasAccess('camaras.camaras.index')
                    );
                });
                $item->item(trans('camaras::configuraciones.title.configuraciones'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.camaras.configuracion.create');
                    $item->route('admin.camaras.configuracion.index');
                    $item->authorize(
                        $this->auth->hasAccess('camaras.configuraciones.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
