<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\provinces;
use App\Models\statuses;
use Illuminate\Http\Request;
use App\Models\properties;
use App\Models\property_details;
use App\Models\property_images;
use App\Models\agents;
use App\Models\types;
use App\Models\districts;
use App\Models\neighborhoods;
use Illuminate\Support\Facades\DB;

class PropertiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $properties = DB::table('properties')
            ->join('agents', 'properties.agent_id', '=', 'agents.id')
            ->select('properties.*', 'agents.name_surname')
            ->orderByDesc('id')
            ->get();


        return view('.admin.properties', ['properties' => $properties]);
    }

    public function create_property()
    {

        $agents = agents::all();
        $categories = categories::all();
        $types = types::all();
        $statuses = statuses::all();
        $provinces = provinces::all();

        return view('.admin.property_create', ['agents' => $agents, 'categories' => $categories, 'types' => $types, 'statuses' => $statuses, 'provinces' => $provinces]);
    }

    public function search_districts(Request $request)
    {

        $data = $request->validate([
            '_token' => ['required'],
            'province_id' => ['required'],
        ]);

        $districts = districts::where('ilce_sehirkey', $data['province_id'])->get();

        $options = '';
        foreach ($districts as $item) {
            $options .= '<option value="' . $item['ilce_key'] . '">' . $item['ilce_title'] . '</option>' . PHP_EOL;
        }

        print_r($options);

    }

    public function search_neighborhoods(Request $request)
    {

        $neighborhoods = neighborhoods::where('mahalle_ilcekey', $request['district_id'])->get();

        $neighborhood = '';
        foreach ($neighborhoods as $item) {
            $neighborhood .= '<option value="' . $item['mahalle_id'] . '">' . $item['mahalle_title'] . '</option>' . PHP_EOL;
        }

        print_r($neighborhood);

    }

    public function create_property_post(Request $request)
    {

        //Featured Image and ALL IMAGES will be added after the image directory.
        $data = $request->validate([
            'property_images' => ['required'],
            '_token' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'type_id' => ['required'],
            'price' => ['required'],
            'agent' => ['required'],
            'province_id' => ['required'],
            'district_id' => ['required'],
            'neighborhood_id' => ['required'],
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
        $property->province_id = $data['province_id'];
        $property->district_id = $data['district_id'];
        $property->neighborhood_id = $data['neighborhood_id'];
        $property->image_alt_text = $data['title'];
        $property->image_path = 'image path to be added.';
        $property->price = $data['price'];
        $property->agent_id = $data['agent'];
        $property->status = $data['status'];
        $property->category_id = $data['category_id'];
        $property->save();


        $get_first_image = json_decode(property_images::getFirstPropertyImage($property->id));
        if ($request->file('property_images')) {
            $images = $request->file('property_images');

            //upload the property images.
            foreach ($images as $image) {
                $image_file_name = strtok($image->getClientOriginalName(), '.');
                $propert_image = $image_file_name . '-' . time() . '.' . $image->extension();
                $image->move(public_path('images/properties'), $propert_image);

                $property_images = new property_images();
                $property_images->property_id = $property->id;
                $property_images->image_path = $propert_image;
                $property_images->image_alt_text = $property->title;
                $property_images->save();
            }
            $property_images = json_decode(property_images::getFirstPropertyImage($property->id), true);
            $find = properties::find($property->id);
            $find->image_path = $property_images['image_path'];
            $find->save();
        }


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


        $send = ['status' => true, 'message' => 'İlan başarıyla oluşturuldu.'];
        return redirect('/admin/properties')->with($send);
    }


    public function update($id = null)
    {

        if (!empty($id)) {
            $property = properties::find($id);
            $property_details = property_details::where('property_id', $id)->first();
            $agents = agents::all();
            $categories = categories::all();
            $types = types::all();
            $statuses = statuses::all();
            $property_images = json_decode(properties::getPropertyImages($id), true);

            $provinces = provinces::all();
            $districts = districts::where('ilce_sehirkey', $property['province_id'])->get();
            $neighborhoods = neighborhoods::where('mahalle_ilcekey', $property['district_id'])->get();

            return view('/admin/property_update', ['property' => $property, 'details' => $property_details, 'property_images' => $property_images, 'agents' => $agents, 'types' => $types, 'categories' => $categories, 'statuses' => $statuses, 'provinces' => $provinces, 'districts' => $districts, 'neighborhoods' => $neighborhoods]);
        }
        return view('/admin/property_update', ['status' => false, 'message' => 'İşlem başarısız']);
    }


    public function update_post(Request $request)
    {

        $request->validate([
            'id' => ['required'],
            '_token' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'type_id' => ['required'],
            'price' => ['required'],
            'agent' => ['required'],
            'province_id' => ['required'],
            'district_id' => ['required'],
            'neighborhood_id' => ['required'],
            'status' => ['required'],
            'category_id' => ['required'],
            'year_built' => ['required'],
            'home_area' => ['required'],
            'rooms' => ['required'],
            'bedrooms' => ['required'],
            'garage' => ['required']
        ]);


        $property = properties::find($request->id);
        $property->title = $request->title;
        $property->type = $request->type_id;
        $property->province_id = $request->province_id;
        $property->district_id = $request->district_id;
        $property->neighborhood_id = $request->neighborhood_id;
        $property->price = $request->price;
        $property->agent_id = $request->agent;
        $property->status = $request->status;
        $property->category_id = $request->category_id;
        $property->save();

        property_details::where('property_id', $request->id)
            ->update([
                'description' => $request->description,
                'type_id' => $request->type_id,
                'category_id' => $request->category_id,
                'year_built' => $request->year_built,
                'agent_id' => $request->agent,
                'home_area' => $request->home_area,
                'rooms' => $request->rooms,
                'bedrooms' => $request->bedrooms,
                'garage' => $request->garage
            ]);

        if (!empty($request->property_images)){
            if ($request->file('property_images')) {
                $images = $request->file('property_images');

                //upload the property images.
                foreach ($images as $image) {

                    $image_file_name = strtok($image->getClientOriginalName(), '.');
                    $propert_image = $image_file_name . '-' . time() . '.' . $image->extension();
                    $image->move(public_path('images/properties'), $propert_image);

                    $property_images = new property_images();
                    $property_images->property_id = $property->id;
                    $property_images->image_path = $propert_image;
                    $property_images->image_alt_text = $property->title;
                    $property_images->save();
                }
            }
        }


        $send = ['status' => true, 'message' => 'İlan başarıyla güncellendi.'];
        return redirect('/admin/properties')->with($send);
    }

    public function delete($id = null)
    {

        if (!empty($id)) {
            DB::table('properties')->where('id', '=', $id)->delete();
            DB::table('property_images')->where('property_id', '=', $id)->delete();
            DB::table('property_details')->where('property_id', '=', $id)->delete();

            $to_be_removed_images = json_decode(property_images::getPropertyImages($id), true);
            foreach($to_be_removed_images as $image){
                unlink(public_path('images/properties/'.$image->image_path));
            }


        }

        return redirect('/admin/properties')->with(['status' => true, 'message' => 'İlan başarıyla silindi.']);
    }

    //property status 1 = yayinda,
    //property status 2 = satildi,
    //property status 3 = yayinda degil.
}
