<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\customer_feedbacks;

class CustomerFeedbackController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $customer_feedbacks = customer_feedbacks::all();
        return view('/admin/customer_feedbacks', ['customer_feedbacks' => $customer_feedbacks]);
    }

    public function create_customer_feedback()
    {
        return view('.admin.create_customer_feedback');
    }

    public function create_customer_feedback_post(Request $request)
    {

        $data = $request->validate([
            'description' => 'required',
            'name_surname' => 'required',
            'job' => 'required',
            'star' => 'required'
        ]);

        $customer_feedbacks = new customer_feedbacks();
        $customer_feedbacks->image = 'image to be added';
        $customer_feedbacks->description = $request['description'];
        $customer_feedbacks->name_surname = $request['name_surname'];
        $customer_feedbacks->job = $request['job'];
        $customer_feedbacks->star = $request['star'];
        $customer_feedbacks->save();

        $send = ['status' => true, 'message' => 'Müşteri Görüşü başarıyla eklendi.'];
        return redirect('/admin/customer-feedbacks')
            ->with($send);

    }
}
