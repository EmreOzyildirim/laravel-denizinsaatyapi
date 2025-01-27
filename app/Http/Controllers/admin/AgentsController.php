<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\agents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        if (!Auth::check()) {
            return redirect('/login');
        }

    }

    public function index()
    {
        $agents = DB::table('agents')->orderByDesc('id')->get();
        return view('.admin.agents', ['agents' => $agents]);
    }

    public function create_agent()
    {
        return view('.admin.agent_create');
    }

    public function create_agent_post(Request $request)
    {

        $data = $request->validate([
            'name_surname' => ['required'],
            'profile_image' => ['required|image'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'facebook' => ['required'],
            'twitter' => ['required']
        ]);

        $agent = new agents();

        $agent->name_surname = $data['name_surname'];
        $agent->email = $data['email'];
        $agent->phone_number = $data['phone_number'];
        $agent->title = $data['title'];
        $agent->description = $data['description'];
        $agent->facebook = $data['facebook'];
        $agent->twitter = $data['twitter'];


        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $agent_image = $image_file_name . '-' . time() . '.' . $image->extension();
            $agent->profile_image = $agent_image;
            $image->move(public_path('images/agents'), $agent_image);
        }

        $agent->save();

        $send = ['status' => true, 'message' => 'Danışman başarıyla oluşturuldu.'];

        return redirect('/admin/agents')
            ->with($send);
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
        $request->validate([
            'id' => ['required'],
            '_token' => ['required'],
            'profile_image' => ['image'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'title' => ['required'],
            'description' => ['required']
        ]);

        $agent = agents::find($request->id);

        $agent->name_surname = $request['name_surname'];
        $agent->email = $request['email'];
        $agent->phone_number = $request['phone_number'];
        $agent->title = $request['title'];
        $agent->description = $request['description'];
        $agent->facebook = $request['facebook'];
        $agent->twitter = $request['twitter'];

        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');

            // remove old image file if has new image
            unlink(public_path('images/agents/' . $agent->profile_image));

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $agent_image = $image_file_name . '-' . time() . '.' . $image->extension();
            $agent->profile_image = $agent_image;
            $image->move(public_path('images/agents'), $agent_image);
        }


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

            // remove old image file.
            unlink(public_path('images/agents/' . $agent->profile_image));

            agents::deleteAgentProperties($id);

            $parameters = ['agents' => $agents, 'status' => true, 'message', 'Danışman başarıyla silindi'];
            return redirect('/admin/agents')
                ->with($parameters);

        } else {
            $agents = agents::all();
            return redirect('/admin/agents')->with('agents', $agents);
        }
    }

}
