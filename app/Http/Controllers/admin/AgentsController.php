<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\agents;

class AgentsController extends Controller
{
    public function index()
    {
        $agents = agents::all();
        return view('.admin.agents', ['agents' => $agents]);
    }

    public function create_agent()
    {
        return view('admin.agent_create');
    }

    public function create_agent_post(Request $request)
    {

        //validate to be control

        $agent = new agents();

        $agent->name_surname = $request['name_surname'];
        $agent->profile_image = 'profile image to be added';
        $agent->email = $request['email'];
        $agent->phone_number = $request['phone_number'];
        $agent->title = $request['title'];
        $agent->description = $request['description'];
        $agent->updated_at = date('Y-m-d h:i:s');
        $agent->save();

        $agents = agents::all();
        return view('.admin.agents', ['agents' => $agents, 'status' => true, 'message' => 'Danışman başarıyla oluşturuldu.']);
    }

    public function update_agent($id)
    {

        if (is_numeric($id)) {
            $agent = agents::find($id);
            return view('.admin.agent_update', ['agent' => $agent]);
        }


        $agents = agents::all();
        return view('.admin.agents', ['agents' => $agents, 'status', false, 'message' => 'Geçersiz danışman id.']);
    }

    public function update_agent_post(Request $request)
    {
        /*
                $data = $request->validate([
                    'id' => 'required',
                    '_token' => 'required',
                    'profile_image' => 'required',
                    'email' => 'required',
                    'phone_number' => 'required',
                    'title' => 'required',
                    'description' => 'required'
                ]);
        */
        $agent = agents::find($request->id);

        $agent->name_surname = $request['name_surname'];
        $agent->profile_image = 'to be added';
        $agent->email = $request['email'];
        $agent->phone_number = $request['phone_number'];
        $agent->title = $request['title'];
        $agent->description = $request['description'];
        $agent->facebook = $request['facebook'];
        $agent->twitter = $request['twitter'];
        $agent->save();

        $agents = agents::all();


        return view('.admin.agents', ['agents' => $agents, 'status' => true, 'message' => 'Yeni danışman başarıyla eklendi.']);
    }

    public function delete_agent($id)
    {

        $agent = agents::find($id);

        if (!empty($agent)) {

            $agents = agents::all();
            $agent->delete();

            $parameters = ['agents' => $agents,'status' => true,'message', 'Danışman başarıyla silindi'];
            return redirect('admin/agents')
                ->with($parameters);

        } else {
            $agents = agents::all();
            return redirect('/admin/agents')->with('agents',$agents);
        }
    }

}
