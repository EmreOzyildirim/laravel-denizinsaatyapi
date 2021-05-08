<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\categories;
use http\Client\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
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
        $categories = categories::all();
        return view('/admin/categories', ['categories' => $categories]);
    }

    public function create_category_post(Request $request)
    {

        $request->validate([
            'category_image' => ['required|image'],
            'name' => ['required'],
            'url' => ['required', 'unique:categories']
        ]);


        //save the image
        $image = $request->file('category_image');

        $image_file_name = strtok($image->getClientOriginalName(), '.');
        $category_image = $image_file_name . '-' . time() . '.' . $image->extension();

        $image->move(public_path('images/categories'), $category_image);


        if (!str_starts_with($request['url'], '/'))
            return redirect('/admin/categories')->with(['status' => false, 'message' => "Kategori URL'iniz / ile başlamalıdır."]);

        $category = new categories();
        $category->name = $request['name'];
        $category->url = $request['url'];
        $category->image_path = $category_image;
        $category->save();

        $send = ['status' => true, 'message' => 'Kategori başarıyla oluşturuldu'];
        return redirect('/admin/categories')->with($send);
    }


    public function create_category()
    {
        return view('/admin/create_category');
    }

    //category detail page
    public function update($id)
    {
        if (!empty($id))
            $category = categories::find($id);

        return view('/admin/category_update', ['category' => $category]);
    }

    //category post update page
    public function update_post(Request $request)
    {

        $request->validate([
            '_token' => ['required'],
            'category_image' => ['image'],
            'id' => ['required'],
            'name' => ['required'],
            'url' => ['required']
        ]);

        $category = categories::find($request['id']);

        if (!empty($request->category_image)) {

            //remove the old image if it exists.
            if (file_exists(public_path('images/categories/') . $category->image_path)) {
                unlink(public_path('images/categories/' . $category->image_path));
            }

            //save the NEW image
            $image = $request->file('category_image');

            $image_file_name = strtok($image->getClientOriginalName(), '.');
            $category_image = $image_file_name . '-' . time() . '.' . $image->extension();

            $image->move(public_path('images/categories'), $category_image);
            $category->image_path = $category_image;

        }


        $category->name = $request['name'];
        $category->url = $request['url'];
        $category->save();


        $send = ['category' => $category, 'status' => true, 'message' => 'Kategori başarıyla güncellendi'];
        return redirect('/admin/categories')->with($send);
    }

}
