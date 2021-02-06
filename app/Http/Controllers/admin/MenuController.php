<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\main_menu;

class MenuController extends Controller
{
    public function index()
    {

        function parseMenu($id = 0)
        {
            $main_menu = main_menu::all()->where('parent_id', '=', $id)->toArray();

            $html_output = '';
            $html_output .= '<ul class="sortable" style="list-style-type: none;">';

            foreach ($main_menu as $item) {
                $html_output .= "<li>" . '<div class="input-group"><input type="text" class="form-control" value="'.$item['name'].'" disabled><span class="input-group-addon"><i class="fa fa-close"></i></span></div>';
                $html_output .= parseMenu($item['id']);
                $html_output .= "</li>";
            }

            $html_output .= "</ul>";

            return $html_output;
        }

        $menu = parseMenu(0);

        return view('/admin/menu', ['menu' => $menu]);
    }

}
