<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        if (!Auth::check()) {
            return redirect('/login');
        }

    }

    public function index()
    {
        return view('/admin/index');
    }
}
