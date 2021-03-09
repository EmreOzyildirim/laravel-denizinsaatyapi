<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\customer_feedbacks;
use App\Models\footer;
use App\Models\footer_links;
use App\Models\properties;
use App\Models\why_choose_us_icon_items;
use Illuminate\Http\Request;
use App\Models\page_header;
use App\Models\social_media;
use App\Models\agents;
use App\Models\categories;
use App\Models\why_choose_us;
use App\Models\contact_and_map;
use App\Models\property_details;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        function refactor_turkish_letters($string)
        {
            return strtolower(str_replace(array("ı", "ğ", "ü", "ş", "ö", "ç"), array("i", "g", "u", "s", "o", "c"), $string));
        }


        //get the properties
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

        $items = json_decode(why_choose_us_icon_items::getWhyChooseUsIcons(), true);

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

        //send footer
        $footer = [
            'footer' => array(
                'copy_text' => '',
                'short_description' => '',
                'social_media_icons' => ''
            ),
            'footer_links' => array()
        ];

        $get_footer = json_decode(footer::getFooter(), true);
        $footer['footer']['copy_text'] = $get_footer['copy_text'];
        $footer['footer']['short_description'] = $get_footer['short_description'];
        $footer['footer']['social_media_icons'] = $get_footer['social_media_icons'];

        $get_footer_links = json_decode(footer_links::getFooterLinks(), true);

        foreach ($get_footer_links as $item) {
            $link_item = array(
                'name' => '',
                'url' => ''
            );
            $link_item['name'] = $item['name'];
            $link_item['url'] = $item['url'];

            array_push($footer['footer_links'], $link_item);
        }

        //customer feedbacks
        $customer_feedbacks = array();
        $get_customer_feedbacks = json_decode(customer_feedbacks::getCustomerFeedbacks(), true);
        foreach ($get_customer_feedbacks as $item) {
            $feedback = array(
                'image' => '',
                'description' => '',
                'name_surname' => '',
                'job' => '',
                'star' => ''
            );

            $feedback['image'] = $item['image'];
            $feedback['description'] = $item['description'];
            $feedback['name_surname'] = $item['name_surname'];
            $feedback['job'] = $item['job'];
            $feedback['star'] = $item['star'];

            array_push($customer_feedbacks, $feedback);
        }


        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'social_media_icons' => social_media::find(1),
            'agents' => agents::all()->take(3),
            'categories' => categories::all()->take(5),
            'why_choose_us' => $why_choose_us,
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'customer_feedbacks' => $customer_feedbacks,
            'footer' => $footer
        ];
        return view('.frontend.home', $send);
    }

    public function contact()
    {
        //send footer
        $footer = [
            'footer' => array(
                'copy_text' => '',
                'short_description' => '',
                'social_media_icons' => ''
            ),
            'footer_links' => array()
        ];

        $get_footer = json_decode(footer::getFooter(), true);
        $footer['footer']['copy_text'] = $get_footer['copy_text'];
        $footer['footer']['short_description'] = $get_footer['short_description'];
        $footer['footer']['social_media_icons'] = $get_footer['social_media_icons'];

        $get_footer_links = json_decode(footer_links::getFooterLinks(), true);

        foreach ($get_footer_links as $item) {
            $link_item = array(
                'name' => '',
                'url' => ''
            );
            $link_item['name'] = $item['name'];
            $link_item['url'] = $item['url'];

            array_push($footer['footer_links'], $link_item);
        }

        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'social_media_icons' => social_media::find(1),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'footer' => $footer
        ];
        return view('.frontend.contact', $send);
    }

    public function agents()
    {

        $agents = json_decode(agents::getAgents(), true);
        //send footer
        $footer = [
            'footer' => array(
                'copy_text' => '',
                'short_description' => '',
                'social_media_icons' => ''
            ),
            'footer_links' => array()
        ];

        $get_footer = json_decode(footer::getFooter(), true);
        $footer['footer']['copy_text'] = $get_footer['copy_text'];
        $footer['footer']['short_description'] = $get_footer['short_description'];
        $footer['footer']['social_media_icons'] = $get_footer['social_media_icons'];

        $get_footer_links = json_decode(footer_links::getFooterLinks(), true);

        foreach ($get_footer_links as $item) {
            $link_item = array(
                'name' => '',
                'url' => ''
            );
            $link_item['name'] = $item['name'];
            $link_item['url'] = $item['url'];

            array_push($footer['footer_links'], $link_item);
        }

        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'social_media_icons' => social_media::find(1),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'agents' => $agents,
            'footer' => $footer
        ];
        return view('.frontend.agents', $send);
    }


}
