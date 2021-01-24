<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturedPropertiesController extends Controller
{
    public function index()
    {
        return "FeaturedPropertiesController";
    }

    //property status 1 = yayinda,
    //property status 2 = satildi,
    //property status 3 = yayinda degil.
}
