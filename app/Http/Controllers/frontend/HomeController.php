<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\properties;
use Illuminate\Http\Request;
use App\Models\page_header;
use App\Models\social_media;
use App\Models\agents;
use App\Models\categories;
use App\Models\property_details;

class HomeController extends Controller
{
    public function index()
    {


        $page_header = page_header::find(1);
        $social_media_icons = social_media::find(1);
        $agents = agents::all()->take(3);
        $categories = categories::all()->take(5);

        $category_property_counts = array();

        function replace_tr($text)
        {

            $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
            $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '_');
            $new_text = str_replace($search, $replace, $text);
            return strtolower($new_text);
        }

        $new_category = [];
        foreach ($categories as $category) {
            array_push($new_category,
                array('category' => $category, 'category_property_count' => count(properties::all()->where('category_id', '=', $category['id'])))
            );

        }

        $properties = properties::all()->take(8);

        $new_properties = [];
        foreach ($properties as $property) {
            array_push($new_properties,
                array('properties'=>$property,'property_details' => property_details::select('garage','rooms','bedrooms','home_area','agent_id')->where('property_id', '=', $property['id'])->get())
            );
        }


        return view('.frontend.home', [
            'page_header' => $page_header,
            'social_media_icons' => $social_media_icons,
            'properties' => $properties,
            'agents' => $agents,
            'categories' => $new_category
        ]);
    }
}
