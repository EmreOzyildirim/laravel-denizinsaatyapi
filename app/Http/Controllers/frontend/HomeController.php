<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\about_us;
use App\Models\customer_feedbacks;
use App\Models\footer;
use App\Models\footer_links;
use App\Models\get_random_validation_image;
use App\Models\properties;
use App\Models\references;
use App\Models\why_choose_us_icon_items;
use Illuminate\Http\Request;
use App\Models\page_header;
use App\Models\social_media;
use App\Models\agents;
use App\Models\categories;
use App\Models\why_choose_us;
use App\Models\contact_and_map;
use App\Models\about_us_page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Factory;

class HomeController extends Controller
{
    public function index()
    {

        function refactor_turkish_letters($string)
        {
            return strtolower(str_replace(array("ı", "ğ", "ü", "ş", "ö", "ç"), array("i", "g", "u", "s", "o", "c"), $string));
        }


        //get the properties
        $properties = json_decode(properties::getPropertiesOrderByDesc(), true);
        $new_properties = array('properties' => array());

        foreach ($properties as $property) {


            //get property address
            $address = json_decode(properties::getPropertyAddress($property['id']), true);
            //add the property details
            $detail = json_decode(properties::getPropertyDetails($property['id']), true);
            //add the agent infos.
            $agent = json_decode(properties::getPropertyAgent($property['agent_id']), true);


            $item = array(
                'property' => $property,
                'details' => array(
                    'description' => $detail['description'],
                    'year_built' => $detail['year_built'],
                    'home_area' => $detail['home_area'],
                    'rooms' => $detail['rooms'],
                    'bedrooms' => $detail['bedrooms'],
                    'garage' => $detail['garage'],
                    'category_id' => $detail['category_id'],
                    'type_id' => $detail['type_id']
                ),
                'agent' => array(
                    'name_surname' => $agent['name_surname'],
                    'profile_image' => $agent['profile_image'],
                    'phone_number' => $agent['phone_number']
                ),
                'property_address' => array(
                    'province' => $address['property_province'],
                    'district' => $address['property_district'],
                    'neighborhood' => $address['property_neighborhood'],
                )
            );

            //property item pushes in the properties array.
            array_push($new_properties['properties'], $item);
        }


        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'slider_properties' => json_decode(properties::getSliderProperties(), true),
            'social_media_icons' => social_media::find(1),
            'agents' => json_decode(agents::all()->take(3)),
            'categories' => json_decode(categories::getCategories(5), true),
            'why_choose_us' => json_decode(why_choose_us::getWhyChooseUs(), true),
            'why_choose_us_icons' => json_decode(why_choose_us_icon_items::getWhyChooseUsIcons(), true),
            'property_listing' => json_decode(properties::getHomeProductsList(6), true),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'customer_feedbacks' => json_decode(customer_feedbacks::getCustomerFeedbacks(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true)
        ];

        return view('.frontend.home', $send);
    }

    public function contact()
    {
        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'random_image' => get_random_validation_image::random_pic(),
            'social_media_icons' => social_media::find(1),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true)
        ];
        return view('.frontend.contact', $send);
    }

    public function agents()
    {

        $send = [
            //properties added in bottom array_push function
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'agents' => json_decode(agents::getAgentsWithCount(), true),
            'social_media_icons' => social_media::find(1),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true)
        ];
        return view('.frontend.agents', $send);
    }

    public function properties()
    {

        $send = [
            //properties added in bottom array_push function
            'agents' => json_decode(agents::getAgentsWithCount(), true),
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'properties' => json_decode(properties::getproperties(), true),
            'social_media_icons' => social_media::find(1),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true)
        ];

        return view('.frontend.properties', $send);
    }

    public function property_details($id)
    {
        $property_item = json_decode(properties::getPropertyById($id), true);


        $property = array(
            'property' => $property_item,
            'property_details' => json_decode(properties::getPropertyDetails($id), true),
            'property_address' => array('province' => '', 'district' => '', 'neighborhood' => ''),
            'property_images' => json_decode(properties::getPropertyImages($id), true),
            'property_agent' => json_decode(properties::getPropertyAgent($property_item['agent_id']), true),
            'office' => json_decode(contact_and_map::getMapEmbed(), true)
        );


        //get property address
        $address = json_decode(properties::getPropertyAddress($id), true);
        $property['property_address']['province'] = $address['property_province'];
        $property['property_address']['district'] = $address['property_district'];
        $property['property_address']['neighborhood'] = $address['property_neighborhood'];

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
            'random_image' => get_random_validation_image::random_pic(),
            'property' => $property,
            'social_media_icons' => social_media::find(1),
            'agents' => agents::all()->take(3),
            'categories' => categories::all()->take(5),
            'contact_and_map' => json_decode(contact_and_map::getContactAndMap(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true)
        ];
        return view('.frontend.property_details', $send);
    }

    public function agents_properties($agent_id)
    {

        $send = [
            'agent' => json_decode(agents::getAgentById($agent_id)),
            'properties' => properties::getPropertiesByAgent($agent_id),
            'social_media_icons' => json_decode(social_media::getSocialMedia(), true),
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'footer' => json_decode(footer::getFooter(), true)
        ];

        return view('.frontend.agents_properties', $send);

    }

    public function about_us()
    {

        $send = [
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'about_us' => json_decode(about_us_page::getAboutUs(), true),
            'social_media_icons' => json_decode(social_media::getSocialMedia(), true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true),
            'why_choose_us_icons' => json_decode(why_choose_us_icon_items::getWhyChooseUsIcons(), true)
        ];
        return view('.frontend.about_us', $send);
    }

    public function search_with_details(Request $request)
    {

        $request->validate([
            'type' => ['required'],
            'province_id' => ['required'],
            'district_id' => ['required'],
            'neighborhood_id' => ['required'],
            'home_area' => ['required'],
            'price' => ['required']
        ]);

        return view('.admin.properties');
    }

    public function references()
    {
        $references = json_decode(references::getReferences(), true);


        $send = array(
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'references' => json_decode(references::getReferences(),true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true),
            'social_media_icons' => json_decode(social_media::getSocialMedia(), true)
        );
        return view('.frontend.references', $send);
    }

    public function reference_detail($id){

        $send = array(
            'page_header' => json_decode(page_header::getPageHeader(), true),
            'reference_detail' => json_decode(references::getReferenceDetail($id),true),
            'last_references' => json_decode(references::getLastReferences(3),true),
            'footer' => json_decode(footer::getFooter(), true),
            'footer_links' => json_decode(footer_links::getFooterLinks(), true),
            'social_media_icons' => json_decode(social_media::getSocialMedia(), true)
        );

        return view('.frontend.reference_detail',$send);
    }


}
