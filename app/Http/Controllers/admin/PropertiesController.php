<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\statuses;
use Illuminate\Http\Request;
use denizinsaatyapi\MetaTag;
use App\Models\properties;
use App\Models\property_details;
use App\Models\property_images;
use App\Models\agents;
use App\Models\types;
use DB;
use phpDocumentor\Reflection\Types\Context;

class PropertiesController extends Controller
{
    public function index()
    {

        $properties = DB::table('properties')
            ->join('agents', 'properties.agent_id', '=', 'agents.id')
            ->select('properties.*', 'agents.name_surname')
            ->get();


        return view('/admin/properties', ['properties' => $properties]);
    }

    public function create_property()
    {

        $agents = agents::all();
        $categories = categories::all();
        $types = types::all();
        $statuses = statuses::all();

        return view('.admin.property_create', ['agents' => $agents, 'categories' => $categories, 'types' => $types, 'statuses' => $statuses]);
    }

    public function create_property_post(Request $request)
    {

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'type' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'agent' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],
            'year_built' => ['required', 'numeric'],
            'home_area' => ['required', 'numeric'],
            'rooms' => ['required', 'numeric'],
            'bedrooms' => ['required', 'numeric'],
            'garage' => ['required', 'numeric'],
            '_token' => ['required']
        ]);

        $property = new properties();
        $property->title = $data['title'];
        $property->type = $data['type'];
        $property->image_path = 'image path to be added';
        $property->image_alt_text = 'image alt text to be added';
        $property->price = $data['price'];
        $property->agent_id = $data['agent'];
        $property->status = $data['status'];
        $property->category_id = $data['category'];
        $property->save();

        $properties = DB::table('properties')
            ->join('agents', 'properties.agent_id', '=', 'agents.id')
            ->select('properties.*', 'agents.name_surname')
            ->get();

        return view('.admin.properties', ['properties' => $properties]);
    }


    public function update($id = null)
    {
        if (!empty($id)) {
            $property = properties::find($id);
            $property_details = property_details::where('property_id', $id)->first();
            $property_images = property_images::select('image_path', 'image_alt_text')->where('property_id', $id)->get();

            $agents = agents::all();
            $categories = categories::all();
            $types = types::all();
            $statuses = statuses::all();

            return view('/admin/property_update', ['property' => $property, 'details' => $property_details, 'agents' => $agents, 'types' => $types, 'categories' => $categories, 'statuses' => $statuses]);
        }
        return view('/admin/property_update',
            ['status' => false, 'message' => false]);
    }


    public function update_post(Request $request)
    {

        $data = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'type' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'agent' => ['required', 'numeric'],
            'status' => ['required', 'numeric'],
            'category' => ['required', 'numeric'],
            'year_built' => ['required', 'numeric'],
            'home_area' => ['required', 'numeric'],
            'rooms' => ['required', 'numeric'],
            'bedrooms' => ['required', 'numeric'],
            'garage' => ['required', 'numeric'],
            '_token' => ['required']
        ]);


        $property = properties::find($data['id']);
        $property->title = $data['title'];
        $property->type = $data['type'];
        $property->price = $data['price'];
        $property->agent_id = $data['agent'];
        $property->status = $data['status'];
        $property->category_id = $data['category'];
        $property->save();


        property_details::where('property_id', $data['id'])
            ->update([
                'description' => $data['description'],
                'type_id' => $data['type'],
                'category_id' => $data['category'],
                'year_built' => $data['year_built'],
                'agent_id' => $data['agent'],
                'home_area' => $data['home_area'],
                'rooms' => $data['rooms'],
                'bedrooms' => $data['bedrooms'],
                'garage' => $data['garage']
            ]);


        $property_images = property_images::select('image_path', 'image_alt_text')->where('property_id', $data['id'])->get();
        $property_details = property_details::where('property_id', $data['id'])->first();

        $agents = agents::all();
        $categories = categories::all();
        $types = types::all();
        $statuses = statuses::all();

        return view('/admin/property_update', ['property' => $property, 'details' => $property_details, 'categories' => $categories, 'property_images' => $property_images, 'agents' => $categories, 'types' => $types, 'statuses' => $statuses]);

    }

    public function delete($id = null)
    {

        if (!empty($id))
            $property = properties::find($id);
        $property->delete();

        return view('/admin/properties', ['properties' => properties::all()]);
    }

    //property status 1 = yayinda,
    //property status 2 = satildi,
    //property status 3 = yayinda degil.
}
