<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return "route PageController@index fonskiyonu üzerinden sayfaya ulaştınız";
    }

    public function show(){
        return "route PageController@show fonskiyonu üzerinden sayfaya ulaştınız";
    }

}
