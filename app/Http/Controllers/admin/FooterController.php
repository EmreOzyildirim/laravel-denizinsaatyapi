<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\footer;
use App\Models\footer_links;
use Illuminate\Http\Request;


class FooterController extends Controller
{
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

        } else {

            $footer = new footer();

            $footer->short_description = $data['short_description'];
            $footer->social_media_icons = $data['social_media_icons'];
            $footer->copy_text = $data['copy_text'];
            $footer->save();

        }


        $f = footer::all();
        return view('/admin/footer', ['footer' => $f]);
    }

    public function useful_links()
    {

        $footer_links = footer_links::all();
        return view('.admin.useful_links', ['footer_links' => $footer_links]);
    }

    public function useful_links_post(Request $request)
    {
        $footer =  footer_links::all();

        return count($footer);
        die();

        return view('.admin.useful_links', ['footer_links' => footer_links::all()]);
    }

}
