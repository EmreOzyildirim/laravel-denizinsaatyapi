<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\agents;
use App\Models\references;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferencesController extends Controller
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
        return view('.admin.references',
            [
                'references' => json_decode(references::getReferences(6), true)
            ]);
    }

    public function details($id)
    {
        return view('.admin.reference-detail', [
            'reference_details' => json_decode(references::getReferenceDetail($id)),
            'agents' => json_decode(agents::getAgents(), true)
        ]);
    }

    public function create(){
        return view('.admin.create_reference',[
            'agents' => json_decode(agents::getAgents(), true)
        ]);
    }

    public function create_post(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'agent_id'=>'required'
        ]);

        $reference = new references();
        $reference->title = $request['title'];
        $reference->description = $request['description'];
        $reference->image_path = 'image to be added';
        $reference->agent_id = $request['agent_id'];

        if ($request->file('image')){
            $image = $request->file('image');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $reference_image = $image_file_name . '-' . time() . '.' . $image->extension();
            $reference->image_path = $reference_image;
            $image->move(public_path('images/references'), $reference_image);
        }

        $reference->save();

        return redirect('/admin/references');
    }

    public function update_reference(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'agent_id' => 'required'
        ]);

        $reference = references::find($request['id']);
        $reference->title = $request['title'];
        $reference->description = $request['description'];
        $reference->agent_id = $request['agent_id'];

        if (!empty($request['image'])) {

            // remove old image file.
            unlink(public_path('images/references/' . $reference->image_path));

            $image = $request->file('image');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $reference_image = $image_file_name . '-' . time() . '.' . $image->extension();
            $reference->image_path = $reference_image;
            $image->move(public_path('images/references'), $reference_image);

        }

        $reference->save();

        return redirect('/admin/reference-details/' . $reference->id)->with(['status' => true, 'message' => 'Referans başarıyla güncellendi..']);
    }

    public function delete($id)
    {
        $reference = references::find($id);
        unlink(public_path('images/references/' . $reference->image_path));
        references::destroy($id);
        return redirect('/admin/references');
    }


}
