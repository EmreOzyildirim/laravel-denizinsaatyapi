<?php

namespace denizinsaatyapi\MetaTag;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MetaTagController extends Controller
{

    public function meta_tag($attribute_key = "name", $attribute_value = null, $content = null)
    {
        return '<meta ' . $attribute_key . '"=' . $attribute_value . '" content="' . $content . '" />';
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
