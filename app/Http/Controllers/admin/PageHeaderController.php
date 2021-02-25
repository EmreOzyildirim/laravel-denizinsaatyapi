<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\page_header;
use Illuminate\Database\Eloquent\Model;


class PageHeaderController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //standart veri çekme yöntemi.
        //DB::table('page_header')->get();

        //modelli veri çekme yöntemi.
        $page_header = page_header::find(1);
        return view('/admin/page_header', $page_header);
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'mail_address' => 'required',
            'phone_number' => 'required',
            'call_us_button' => 'required'
        ]);

        //upload the files
        $page_header = page_header::find(1);

        $page_header->mail_address = $data['mail_address'];
        $page_header->phone_number = $data['phone_number'];
        $page_header->call_us_button = $data['call_us_button'];
        $page_header->save();

        return view('/admin/page_header', $data);

    }
}
