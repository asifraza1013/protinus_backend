<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * category list
    */
    public function index()
    {
        $title = 'Category List';
        $response = sendRequest('POST', config('api_path.category_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $categryList = $response->data;
        return view('category.index', compact([
            'categryList',
            'title',
        ]));
    }

    /**
     * category create
     */
    public function create()
    {
        $title = 'Create Category';
        return view('category.create', compact([
            'title'
        ]));
    }

    /**
     * store category
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'prodcut_type' => 'required|string',
            'status' => 'required|string',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        if($request->file('image')){
            $img = base64_encode(file_get_contents($request->image->path()));
        }

        $data = [
            'name' => $request->name,
            'productType' => $request->prodcut_type,
            'status' => $request->status,
            'image' => $img,
        ];
        $response = sendRequest('POST', config('api_path.add_category'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * delete category
     */
    public function deleteCategory($id)
    {
        $data['categoryId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_category'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
