<?php 
    $get_MasterAdminMenu = \App\AdminMenu::get();
    $menu = array();
    foreach($get_MasterAdminMenu as $getSection)
    {
        if($getSection->level == 1)
        {
            $arr_menu = array();
            $arr_menu['name'] = $getSection->name;
            $arr_menu['submenu'] = array();
            foreach($get_MasterAdminMenu as $getMenu)
            {
                if($getMenu->level == 2 && $getMenu->parent == $getSection->id)
                {
                    array_push($arr_menu['submenu'], $getMenu->name);
                }
            }
            array_push($menu, $arr_menu);
        }
    }
?>

<div id="leftmenu">

    <!--?php var_dump($menu); ?-->
    
    @if(count($menu) > 0)

        @foreach($menu as $menus)

            <h4>{{ $menus['name'] }}</h4>

            @if(count($menus['submenu'] > 0))
                
                <ul>

                @foreach($menus['submenu'] as $submenus)

                    <li><a href="{{ URL::to('admin-maxiblogger/'.$submenus) }}">{{ $submenus }}</a></li>

                @endforeach

                </ul>

            @endif

            <hr/>

        @endforeach

    @endif

</div>