<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use denizinsaatyapi\MetaTag;

class PropertiesController extends Controller
{
    public function index()
    {

        $meta = new MetaTag\MetaTagController();

        $title = $meta->meta_tag('title','Sahibinden Satılık Vw Passat');
        $description = $meta->meta_tag('description','Sahibinden Satılık Vw Passat 1.6 FSI motorlu, 230.000km, değisensiz.');
        $keywords = $meta->meta_tag('keywords','volkswagen passat, sahibinden satilik vw passat, passat 2018.');

        return $title.", ".$description.", ".$keywords;
    }




}
