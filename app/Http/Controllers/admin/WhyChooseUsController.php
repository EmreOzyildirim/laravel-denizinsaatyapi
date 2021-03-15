<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\why_choose_us;
use App\Models\why_choose_us_icon_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhyChooseUsController extends Controller
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
        $why_choose_us = why_choose_us::find(1)->toArray();
        $why_choose_us_icon_items = why_choose_us_icon_items::all()->where('why_choose_us_id', '=', $why_choose_us['id'])->toArray();

        return view('.admin.why_choose_us', ['why_choose_us' => $why_choose_us, 'icon_items' => $why_choose_us_icon_items]);
    }

    public function update(Request $request)
    {

        $request->validate([
            '_token' => 'required',
            'background_image' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $why_choose_us = why_choose_us::find(1);

        if (!empty($request->background_image)) {

            //remove the old image if it exists.
            if (file_exists(public_path('images/chooseus/') . $why_choose_us->bg_image_path)) {
                unlink(public_path('images/chooseus/' . $why_choose_us->bg_image_path));
            }

            //save the NEW image
            $image = $request->file('background_image');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $choose_us_image = $image_file_name . '-' . time() . '.' . $image->extension();

            $image->move(public_path('images/chooseus'), $choose_us_image);
            $why_choose_us->bg_image_path = $choose_us_image;

        }


        $why_choose_us->title = $request->title;
        $why_choose_us->description = $request->description;
        $why_choose_us->save();

        $send = ['status' => true, 'message' => 'Güncelleme işlemi başarıyla gerçekleşti.'];
        return redirect('/admin/why-choose-us')->with($send);
    }

    public function why_choose_us_icons()
    {
        $icon_items = why_choose_us_icon_items::all();
        return view('.admin.why_choose_us_icon_item', ['icons' => $this->icons, 'icon_items' => $icon_items]);
    }

    public function create_icon_item(Request $request)
    {

        $data = $request->validate([
            '_token' => ['required'],
            'title' => ['required'],
            'description' => ['required']
        ]);

        $why_choose_us_icon_items = why_choose_us_icon_items::create([
            'why_choose_us_id' => 1,
            'icon_path' => 'image to be added',
            'title' => $data['title'],
            'description' => $data['description']
        ]);
        $saved = $why_choose_us_icon_items->save();

        if (!$saved) {
            $send = ['status' => false, 'message' => 'Neden Biz? modülü için madde oluşturulurken bir hata oluştu.'];
        }


        $send = ['status' => true, 'message' => 'Neden Biz? modülü için madde başarıyla oluşturuldu.'];
        return redirect('.admin.why_choose_us_icons')->with($send);
    }

    public function icon_item($id)
    {

        $why_choose_us_icon_item = why_choose_us_icon_items::find($id);
        return view('.admin.update_why_choose_us_icon_item', ['icon_items' => $why_choose_us_icon_item, 'icons' => $this->icons]);
    }

    public function update_icon_item(Request $request)
    {

        $data = $request->validate([
            '_token' => ['required'],
            'icon_path' => ['required'],
            'title' => ['required'],
            'id' => ['required'],
            'description' => ['required']
        ]);

        $why_choose_us_item = why_choose_us_icon_items::find($data['id']);

        $why_choose_us_item->icon_path = $data['icon_path'];
        $why_choose_us_item->title = $data['title'];
        $why_choose_us_item->description = $data['description'];
        $saved = $why_choose_us_item->save();


        $why_choose_us_icon_items = why_choose_us_icon_items::all();

        if (!$saved) {
            $send = ['status' => false, 'message' => 'Neden Biz? modülü için madde güncellenirken bir hata oluştu.'];
        }

        $send = ['status' => true, 'message' => 'Neden Biz? modülü için madde başarıyla güncellendi'];
        return redirect('/admin/why-choose-us-icons')->with($send);
    }

    public function delete_icon_item($id)
    {

        $item = why_choose_us_icon_items::find($id);

        if (!empty($item)) {
            $item->delete();
        }

        if ($item == null) {
            $send = ['status' => false, 'message' => 'Belirttiğiniz madde silinirken bir hata oluştu.'];
        }

        $send = ['status' => true, 'message' => 'Belirttiğiniz madde başarıyla silindi.'];
        return redirect('/admin/why-choose-us-icons')->with($send);
    }

}
