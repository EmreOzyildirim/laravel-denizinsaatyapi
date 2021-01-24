<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use http\Client\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = categories::all();

        return view('/admin/categories', ['categories' => $categories]);
    }

    public function create_category()
    {
        return view('/admin/create_category');
    }

    public function create_category_post(Request $request)
    {


        // Setup the validator
        $rules = array('name' => 'required', 'url' => 'required');
        $validator = Validator::make($request->all(), $rules);

// Validate the input and return correct response
        if ($validator->fails()) {
            return array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            , 400); // 400 being the HTTP code for an invalid request.
        }

        $data = $request->validate([
            //image to be added
            'name' => ['required'],
            'url' => ['required', 'unique:categories']
        ]);


        $category = new categories();

        $category->name = $request->name;
        $category->url = $request->url;
        $category->image_path = 'image_path to be added';

        $category->save();


        return view('/admin/create_category', ['exception' => '$query_exception_errors']);
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
        $data = $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'url' => ['required'],
            'image_path' => ['required']
        ]);
        $category = categories::find($request->id);

        if (!empty($category)) {
            $category->name = $request->name;
            $category->url = $request->url;
            $category->image_path = $request->image_path;
            $category->save();

        } else {
            return view('/admin/category_update', ['status' => false, 'message' => 'İşlem başarısız']);
        }


        return view('/admin/category_update', ['category' => $category, 'status' => true, 'message' => 'Kategori başarıyla güncellendi']);
    }

}
