<?php

use Anam\Dashboard\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// This multi level menu function is for aside menus
function generate_multilevel_menus($parent_id = 0)
{
    $priority_id = Auth::user()->user_level;
    $html = "";
    $menues = Menu::where('parent_id', $parent_id)->where('status', 1)->where('sidebar_visibility', 1)->orderBy('serial_no')->get();

    if ($menues->count() > 0) {
        foreach ($menues as $key => $menu) {
            $has_access = DB::table('priority_menu')->where('priority_id', $priority_id)->where('menu_id', $menu->id)->first();
            if ($has_access) {
                if ($menu->route_name && $menu->route_name == '#') {
                    $html .= '<li id="' . $menu->selector . '-mm" class="treeview"><a href="javascript:;">';
                    if ($menu->parent_id == 0) {
                        if ($menu->icon) {
                            $html .= '<i class="'. $menu->icon .'"></i>';
                        }
                    } else {
                        $html .= '<i class="fa fa-circle-o"></i>';
                    }
                    $html .= '<span>';
                    $html .= $menu->menu_name; // $menu->parent_id
                    $html .= '</span><span class="pull-right-container">';
                    $html .= '<i class="fa fa-angle-left pull-right"></i>';
                    $html .= '</span></a>';
                    $html .= '<ul class="treeview-menu">';
                    $html .= generate_multilevel_menus($menu->id);
                    $html .= '</ul>';
                    $html .= '</li>';
                } else {
                    if ($menu->parent_id == 0) {
                        $html .= '<li id="' . $menu->selector . '-mm">';
                        $html .= '<a href="' . url($menu->route_name) . '">';
                        if ($menu->icon) {
                            $html .= '<i class="' . $menu->icon . '"></i>';
                        }
                    } else {
                        $html .= '<li id="' . $menu->selector . '-sm">';
                        $html .= '<a href="' . url($menu->route_name) . '">';
                        $html .= '<i class="fa fa-circle-o"></i>';
                    }
                    $html .= '<span>';
                    $html .= $menu->menu_name; // $menu->parent_id
                    $html .= '</span>';
                    $html .= '</a></li>';
                    $html .= generate_multilevel_menus($menu->id);
                }
            }
        }
    }
    return $html;
}

function siblingsHasChild($parent_id, $menu_id)
{
    $result = false;
    $siblings = Menu::where('parent_id', $parent_id)->where('id', '<>', $menu_id)->where('status', 1)->get(); // Get the Siblings
    foreach ($siblings as $sibling) {
        $has_child = Menu::where('parent_id', $sibling->id)->where('status', 1)->first(); // Check if the Siblings has child
        if ($has_child) {
            $result = true;
            break;
        }
    }
    return $result;
}

function generate_priority_menus($priority_id, $parent_id = 0)
{
    $html = "";
    $menues = Menu::where('parent_id', $parent_id)->where('status', 1)->orderBy('serial_no')->get();
    if ($menues->count() > 0) {
        $html .= "<ul>";
        foreach ($menues as $key => $menu) {
            $has_access = DB::table('priority_menu')->where('priority_id', $priority_id)->where('menu_id', $menu->id)->first();
            $checked = '';
            if ($has_access) {
                $checked = "checked";
            }
            if (($menu->route_name && $menu->route_name == '#') || $menu->parent_id == 0 || siblingsHasChild($menu->parent_id, $menu->id)) {
                $html .= '<li class="col-sm-12">';
                $html .= '<div class="form-group">';
                $html .= '<div class="checkbox main-menu">';
                $html .= '<label><input type="checkbox" class="flat-green" name="menu_id[]" value="' . $menu->id . '" id="menu-id-' . $menu->id . '" parent-id="' . $menu->parent_id . '" ' . $checked . '>' . $menu->menu_name . '<span></span></label>';
                $html .= '</div>';
                $html .= '</div>';
            } else {
                $html .= '<li class="col-sm-4">';
                $html .= '<div class="form-group">';
                $html .= '<div class="checkbox">';
                $html .= '<label><input type="checkbox" class="flat-green" name="menu_id[]" value="' . $menu->id . '" id="menu-id-' . $menu->id . '" parent-id="' . $menu->parent_id . '" ' . $checked . '>' . $menu->menu_name . '<span></span></label>';
                $html .= '</div>';
                $html .= '</div>';
            }
            $html .= generate_priority_menus($priority_id, $menu->id);

            $html .= "</li>";
        }
        $html .= "</ul>";
    }
    return $html;
}
