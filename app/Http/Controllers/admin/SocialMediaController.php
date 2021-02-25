<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\social_media;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $social_medias = social_media::find(1);
        $send = ['social_media' => $social_medias];

        if (isset($_GET['status']) && $_GET['message'] == 'updated') {
            $send = array_merge($send, ['status' => true, 'message' => 'Sosyal medya hesapları başarıyla güncellendi.']);

        } elseif (isset($_GET['status']) && $_GET['message'] == 'created') {
            $send = array_merge($send, ['status' => true, 'message' => 'Sosyal medya hesapları başarıyla oluşturuldu.']);

        }

        return view('/admin/social_media', $send);
    }

    public function social_media_icons_update(Request $request)
    {

        $data = $request->validate([
            'facebook_url' => 'required|max:120',
            'twitter_url' => 'required|max:120',
            'youtube_url' => 'required|max:120',
            'instagram_url' => 'required|max:120',
            'linkedin_url' => 'required|max:120'
        ]);

        $social_media_icons = social_media::all();
        if (count($social_media_icons) == 1) {

            $social_medias = social_media::find(1);
            $social_medias->facebook_url = $data['facebook_url'];
            $social_medias->twitter_url = $data['twitter_url'];
            $social_medias->youtube_url = $data['youtube_url'];
            $social_medias->instagram_url = $data['instagram_url'];
            $social_medias->linkedin_url = $data['linkedin_url'];
            $social_medias->save();

            $send = ['status' => true, 'message' => 'Sosyal medya hesap linkleriniz başarıyla güncellendi.'];
            return redirect('/admin/social-media')
                ->with($send);

        } else {

            $social_medias = new social_media();

            $social_medias->facebook_url = $data['facebook_url'];
            $social_medias->twitter_url = $data['twitter_url'];
            $social_medias->youtube_url = $data['youtube_url'];
            $social_medias->instagram = $data['instagram'];
            $social_medias->linkedin = $data['linkedin'];
            $social_medias->save();

            $send = ['status' => true, 'message' => 'Sosyal medya hesap linkleriniz başarıyla oluşturuldu.'];
            return redirect('/admin/social-media')
                ->with($send);

        }

    }
}
