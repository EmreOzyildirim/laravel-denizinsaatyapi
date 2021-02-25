<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\why_choose_us;
use App\Models\why_choose_us_icon_items;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    protected $icons = [
        'icon1' => '/backend/know-how/chooseus-icon-1.png',
        'icon2' => '/backend/know-how/chooseus-icon-2.png',
        'icon3' => '/backend/know-how/chooseus-icon-3.png',
        'icon4' => '/backend/know-how/chooseus-icon-4.png',
    ];

    public function index()
    {
        $why_choose_us = why_choose_us::find(1)->toArray();
        $why_choose_us_icon_items = why_choose_us_icon_items::all()->where('why_choose_us_id', '=', $why_choose_us['id'])->toArray();

        return view('.admin.why_choose_us', ['why_choose_us' => $why_choose_us, 'icon_items' => $why_choose_us_icon_items]);
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            '_token' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $why_choose_us = why_choose_us::find(1);

        $why_choose_us['title'] = $data['title'];
        $why_choose_us['description'] = $data['description'];
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
