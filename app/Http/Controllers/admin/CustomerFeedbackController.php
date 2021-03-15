<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\customer_feedbacks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerFeedbackController extends Controller
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
        $customer_feedbacks = DB::table('customer_feedbacks')->orderByDesc('id')->get();
        return view('/admin/customer_feedbacks', ['customer_feedbacks' => $customer_feedbacks]);
    }

    public function create_customer_feedback()
    {
        return view('.admin.create_customer_feedback');
    }

    public function create_customer_feedback_post(Request $request)
    {

        $request->validate([
            '_token' => ['required'],
            'profile_image' => ['required'],
            'description' => ['required'],
            'name_surname' => ['required'],
            'job' => ['required'],
            'star' => ['required']
        ]);


        //Customer feedback images will be uploaded in images/musteri-gorusleri.
        $profile_image = $request->file('profile_image');
        $image_name = strtok($profile_image->getClientOriginalName(), '.');
        $new_image_name = $image_name . '-' . time() . $profile_image->extension();

        $profile_image->move(public_path('images/musteri-yorumlari'), $new_image_name);

        $customer_feedbacks = new customer_feedbacks();
        $customer_feedbacks->image = $new_image_name;
        $customer_feedbacks->description = $request['description'];
        $customer_feedbacks->name_surname = $request['name_surname'];
        $customer_feedbacks->job = $request['job'];
        $customer_feedbacks->star = $request['star'];
        $customer_feedbacks->save();

        $send = ['status' => true, 'message' => 'Müşteri Görüşü başarıyla eklendi.'];
        return redirect('/admin/customer-feedbacks')
            ->with($send);

    }

    public function update_customer_feedback($id)
    {
        $customer_feedback = customer_feedbacks::find($id);
        return view('admin.update_customer_feedback', ['customer_feedback' => $customer_feedback]);
    }

    public function update_customer_feedback_post(Request $request)
    {

        $request->validate([
            'id' => ['required'],
            'profile_image' => ['required'],
            'name_surname' => ['required'],
            'job' => ['required'],
            'star' => ['required'],
            'description' => ['required']
        ]);

        $customer_feedback = customer_feedbacks::find($request['id']);
        $image = $request->file('profile_image');

        $file_name = strtok($image->getClientOriginalName(), '.');
        $image_name = $file_name . '-' . time() . '.' . $image->extension();

        //move the image what we want directory.
        $image->move(public_path('images/musteri-yorumlari'), $image_name);

        //remove the old image if it exists.
        if (file_exists(public_path('images/musteri-yorumlari/') . $customer_feedback['image'])) {
            unlink(public_path('images/musteri-yorumlari/' . $customer_feedback['image']));
        }


        $customer_feedback->image = $image_name;
        $customer_feedback->name_surname = $request['name_surname'];
        $customer_feedback->job = $request['job'];
        $customer_feedback->star = $request['star'];
        $customer_feedback->description = $request['description'];
        $customer_feedback->save();

        return redirect('/admin/customer-feedbacks')->with(['status' => 'true', 'message' => 'Müşteri görüşü başarıyla güncellendi.']);
    }

    public function delete_customer_feedback($id)
    {

        $customer_feedbacks = customer_feedbacks::find($id)->delete();
        $image = $customer_feedbacks['image'];

        customer_feedbacks::find($id)->delete();
        unlink(public_path('images/musteri-yorumlari', $customer_feedbacks), $image);

        return redirect('/admin/customer-feedback')->with(['status' => true, 'message' => 'Müşteri Yorumu başarıyla silindi.']);
    }

}
