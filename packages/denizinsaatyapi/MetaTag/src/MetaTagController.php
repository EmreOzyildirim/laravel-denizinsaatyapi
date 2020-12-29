<?php

namespace denizinsaatyapi\MetaTag;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MetaTagController extends Controller
{

    public function meta_tag($name,$content){
        return '<meta name="'.$name.'" content="'.$content.'" />';
    }




    public function toplama($a, $b)
    {
        return $a + $b;
    }

    public function cikarma($a, $b)
    {
        return $a - $b;
    }

}
