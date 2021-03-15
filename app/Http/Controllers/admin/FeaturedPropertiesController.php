<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\agents;
use App\Models\categories;
use App\Models\provinces;
use App\Models\statuses;
use App\Models\types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeaturedPropertiesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        if (!Auth::check()) {
            return redirect('/login');
        }

    }

    public function index()
    {


        $agents = agents::all();
        $categories = categories::all();
        $types = types::all();
        $statuses = statuses::all();

        $provinces = provinces::all();

        return view('.admin.create_featured_property',['agents' => $agents, 'categories' => $categories, 'types' => $types, 'statuses' => $statuses, 'provinces' => $provinces]);
    }

    //property status 1 = yayinda,
    //property status 2 = satildi,
    //property status 3 = yayinda degil.
}
