<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\main_menu;

class MenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $main_menu = main_menu::where('parent_id', 0);
        $html = '';
        foreach ($main_menu as $menu) {
            $html .= '<span>' . $menu['name'] . '</span>';
            $parents = main_menu::where('parent_id', $menu['id']);
            foreach ($parents as $parent) {
                $html .= '<span>' . $parent['name'] . '</span>';
            }
        }
        return view('/admin/menu', ['menu' => $html]);
    }

}
