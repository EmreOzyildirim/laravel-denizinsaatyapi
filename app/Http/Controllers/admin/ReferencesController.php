<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferencesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        if (!Auth::check()) {
            return redirect('/login');
        }

    }

    public function index()
    {
        return "ReferencesController";
    }
}
