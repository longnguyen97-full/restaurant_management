<?php
if (!function_exists('get_menu_list')) {
    function get_menu_list($menu = '')
    {
        $items = \App\Models\Item::all();
        $list_menu = [];
        $list_menu['starter'] = [];
        $list_menu['main_dish'] = [];
        $list_menu['desserts'] = [];
        $list_menu['drinks'] = [];

        foreach ($items as $item) {
            if ($item->category->slug == 'starter') {
                $list_menu['starter'][] = $item;
            }
            if ($item->category->slug == 'main-dish') {
                $list_menu['main_dish'][] = $item;
            }
            if ($item->category->slug == 'desserts') {
                $list_menu['desserts'][] = $item;
            }
            if ($item->category->slug == 'drinks') {
                $list_menu['drinks'][] = $item;
            }
        }

        return !empty($menu) ? $list_menu[$menu] : $list_menu;
    }
}

if (!function_exists('get_total_cart_items')) {
    function get_total_cart_items()
    {
        return session()->has('id_list') ? count(session('id_list')) : 0;
    }
}
