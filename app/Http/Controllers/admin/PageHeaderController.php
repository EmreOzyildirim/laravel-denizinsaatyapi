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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_header = json_decode(page_header::getPageHeader(), true);
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

        //save the NEW logo
        if (!empty($request->logo)) {

            $image = $request->file('logo');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $logo_image = $image_file_name . '-' . time() . '.' . $image->extension();

            $image->move(public_path('images/page_header'), $logo_image);

            //save the new path.
            $page_header->logo_path = $logo_image;

            //remove the old image
            $old_image = json_decode(page_header::getPageHeader(), true);
            unlink(public_path('images/page_header/' . $old_image['logo_path']));
        }

        $page_header->save();


        return redirect('/admin/page-header')->with(['status'=>true,'message'=>'Sayfa başlığı başarıyla güncellendi.']);
    }
}
