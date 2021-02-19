<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\statuses;
use Illuminate\Http\Request;
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


        return view('.admin.properties', ['properties' => $properties]);
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

        //Featured Image and ALL IMAGES will be added after the image directory.
        $data = $request->validate([
            '_token' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'type_id' => ['required'],
            'price' => ['required'],
            'agent' => ['required'],
            'status' => ['required'],
            'category_id' => ['required'],
            'year_built' => ['required'],
            'home_area' => ['required'],
            'rooms' => ['required'],
            'bedrooms' => ['required'],
            'garage' => ['required']
        ]);

        $property = new properties();
        $property->title = $data['title'];
        $property->type = $data['type_id'];
        $property->image_path = 'image path to be added';
        $property->image_alt_text = 'image alt text to be added';
        $property->price = $data['price'];
        $property->agent_id = $data['agent'];
        $property->status = $data['status'];
        $property->category_id = $data['category_id'];
        $property->save();

        $property_details = new property_details();
        $property_details->description = $data['description'];
        $property_details->property_id = $property->id;
        $property_details->category_id = $data['category_id'];
        $property_details->year_built = $data['year_built'];
        $property_details->type_id = $data['type_id'];
        $property_details->agent_id = $data['agent'];
        $property_details->home_area = $data['home_area'];
        $property_details->rooms = $data['rooms'];
        $property_details->bedrooms = $data['bedrooms'];
        $property_details->garage = $data['garage'];
        $property_details->save();

        $property_images = new property_images();
        //TODO: image gallery will be updated after the image directory development|

        $properties = DB::table('properties')
            ->join('agents', 'properties.agent_id', '=', 'agents.id')
            ->select('properties.*', 'agents.name_surname')
            ->get();

        $send = ['status'=> true, 'message' => 'İlan başarıyla oluşturuldu.'];
        return redirect('/admin/properties')->with($send);
    }


    public function update($id = null)
    {

        if (!empty($id)){
            $property = properties::find($id);
            $property_details = property_details::where('property_id', $id)->first();
            $property_images = property_images::select('image_path', 'image_alt_text')->where('property_id', $id)->get();

            $agents = agents::all();
            $categories = categories::all();
            $types = types::all();
            $statuses = statuses::all();

            return view('/admin/property_update', ['property' => $property, 'details' => $property_details, 'agents' => $agents, 'types' => $types, 'categories' => $categories, 'statuses' => $statuses]);
        }
        return view('/admin/property_update', ['status' => false, 'message' => false]);
    }


    public function update_post(Request $request)
    {

        $data = $request->validate([
            'id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'type' => ['required'],
            'price' => ['required'],
            'agent' => ['required'],
            'status' => ['required'],
            'category' => ['required'],
            'year_built' => ['required'],
            'home_area' => ['required'],
            'rooms' => ['required'],
            'bedrooms' => ['required'],
            'garage' => ['required'],
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
