<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\properties;
use App\Models\why_choose_us_icon_items;
use Illuminate\Http\Request;
use App\Models\page_header;
use App\Models\social_media;
use App\Models\agents;
use App\Models\categories;
use App\Models\why_choose_us;
use App\Models\property_details;

class HomeController extends Controller
{
    public function index()
    {

        function refactor_turkish_letters($string)
        {
            return strtolower(str_replace(array("ı", "ğ", "ü", "ş", "ö", "ç"), array("i", "g", "u", "s", "o", "c"), $string));
        }


        $properties = properties::getProperties();

        $new_properties = array('properties' => array());


        foreach ($properties as $property) {

            $item = array(
                'property' => $property,
                'details' => array(
                    'description' => '',
                    'year_built' => '',
                    'home_area' => '',
                    'rooms' => '',
                    'bedrooms' => '',
                    'garage' => '',
                    'category_id' => '',
                    'property_type' => ''
                ),
                'agent' => array(
                    'name_surname' => '',
                    'profile_image' => '',
                    'phone_number' => ''
                )
            );

            //add the property details
            $detail = json_decode(properties::getPropertyDetails($property['id']), true);

            $item['details']['description'] = $detail['description'];
            $item['details']['year_built'] = $detail['year_built'];
            $item['details']['home_area'] = $detail['home_area'];
            $item['details']['rooms'] = $detail['rooms'];
            $item['details']['bedrooms'] = $detail['bedrooms'];
            $item['details']['garage'] = $detail['garage'];
            $item['details']['description'] = $detail['year_built'];
            $item['details']['property_type'] = $detail['type_id'];
            $item['details']['category_id'] = $detail['category_id'];

            //add the agent infos.
            $agent = json_decode(properties::getPropertyAgent($property['agent_id']), true);

            $item['agent']['name_surname'] = $agent['name_surname'];
            $item['agent']['profile_image'] = $agent['profile_image'];
            $item['agent']['phone_number'] = $agent['phone_number'];


            //property item pushes in the properties array.
            array_push($new_properties['properties'], $item);
        }


        //why choose us module
        $why_choose_us_header = json_decode(why_choose_us::getWhyChooseUs(), true);

        $why_choose_us = array(
            'why_choose_us' => array(
                'title' => $why_choose_us_header['title'],
                'description' => $why_choose_us_header['description'],
                'bg_image_path' => $why_choose_us_header['bg_image_path']
            ),
            'icon_items' => array()
        );

        $items = json_decode(why_choose_us_icon_items::getWhyChooseUsIcons(),true);

        foreach ($items as $item) {

            $icon_item = array(
                'icon_path' => '',
                'title' => '',
                'description' => ''
            );

            $icon_item['icon_path'] = $item['icon_path'];
            $icon_item['title'] = $item['title'];
            $icon_item['description'] = $item['description'];

            array_push($why_choose_us['icon_items'], $icon_item);
        }

        $send = [
            //properties added in bottom array_push function
            'page_header' => page_header::find(1),
            'social_media_icons' => social_media::find(1),
            'agents' => agents::all()->take(3),
            'categories' => categories::all()->take(5),
            'property_listing' => $new_properties,
            'why_choose_us' => $why_choose_us
        ];
        return view('.frontend.home', $send);
    }


}
