<?php namespace Modules\Registros\Sidebar;

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
            $group->item(trans('Registros'), function (Item $item) {
                $item->icon('fa fa-car');
                $item->weight(3);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('registros::registros.title.registros'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.registros.registro.create');
                    $item->route('admin.registros.registro.index');
                    $item->authorize(
                        $this->auth->hasAccess('registros.registros.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
