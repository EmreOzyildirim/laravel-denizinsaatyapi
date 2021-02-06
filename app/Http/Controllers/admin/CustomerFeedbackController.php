<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\customer_feedbacks;

class CustomerFeedbackController extends Controller
{
    public function index()
    {
        $customer_feedbacks = customer_feedbacks::all();

        return view('/admin/customer_feedbacks', ['customer_feedbacks' => $customer_feedbacks]);
    }
}
