<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\footer;
use App\Models\footer_links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FooterController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

        if (!Auth::check()) {
            return redirect('/login');
        }

    }

    public function index()
    {
        $footer = footer::all();
        $footer_links = footer_links::all();
        return view('.admin.footer', ['footer' => $footer, 'footer_links' => $footer_links]);
    }

    public function footer(Request $request)
    {

        $data = $request->validate([
            '_token' => 'required',
            'short_description' => 'required',
            'social_media_icons' => 'required',
            'copy_text' => 'required'
        ]);

        if (footer::find(1)) {

            $footer = footer::find(1);
            $footer->short_description = $data['short_description'];
            $footer->social_media_icons = $data['social_media_icons'];
            $footer->copy_text = $data['copy_text'];
            $footer->save();

            $send = ['status' => true, 'message' => 'Footer başarıyla güncellendi.'];

        } else {

            $footer = new footer();

            $footer->short_description = $data['short_description'];
            $footer->social_media_icons = $data['social_media_icons'];
            $footer->copy_text = $data['copy_text'];
            $footer->save();

            $send = ['status' => true, 'message' => 'Footer başarıyla oluşturuldu.'];

        }


        return redirect('/admin/footer')->with($send);
    }

    public function useful_links()
    {

        $footer_links = footer_links::all();
        return view('.admin.useful_links', ['footer_links' => $footer_links]);
    }

    public function useful_links_post(Request $request)
    {
        $data = $request->validate([
            '_token' => 'required',
            'name' => 'required',
            'url' => 'required'
        ]);


        $starts_with_slash = str_starts_with($data['url'], '/');
        if (!$starts_with_slash) {
            $send = ['status' => false, 'message' => 'Girdiğiniz URL "/" ile başlamalıdır .'];
            return redirect('/admin/useful-links')
                ->with($send);
        }


        $footer = footer_links::all();
        if (count($footer) < 4) {


            $useful_link = new footer_links();
            $useful_link->name = $data['name'];
            $useful_link->url = $data['url'];
            $useful_link->save();

            $send = ['status' => true, 'message' => "Link, Footer'a başarıyla eklendi . "];

            return redirect('/admin/useful-links')
                ->with($send);

        } else {

            $send = ['status' => false, 'message' => "Footer alanında 4'ten fazla link oluşturulamaz."];
            return redirect('/admin/useful-links')
                ->with($send);
        }

    }

}
