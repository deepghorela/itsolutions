<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public static function getMenuItems($menuName = "Main menu")
    {
        return self::select(
            'ni.name',
            'ni.open_in_new_tab',
            'ni.custom_link',
            'ni.page_id',
            'ni.show_icon_only',
            'ni.icon',
            'pg.title',
            'pg.slug'
        )
            ->rightJoin('nav_items as ni', 'ni.nav_id', 'navigations.id')
            ->leftJoin('pages as pg', 'pg.id', 'ni.page_id')
            ->where('navigations.name', $menuName)
            ->where('ni.is_active', 1)
            ->orderBy('ni.display_order')
            ->get()->toArray();
    }
}
