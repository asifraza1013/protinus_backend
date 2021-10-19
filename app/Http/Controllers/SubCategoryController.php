<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * subcategory list
     */
    public function index()
    {
        $title = 'Subcategory List';
        $response = sendRequest('POST', config('api_path.subcategory_list'));
        if($response->status){
            $list = $response->data;
            return view('subcategory.index', compact([
                'list',
                'title',
            ]));
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * create sub category
     */
    public function create()
    {
        $title = 'Create sub Category';
        $response = sendRequest('POST', config('api_path.category_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $categryList = $response->data;
        return view('subcategory.create', compact([
            'categryList',
            'title',
        ]));
    }

    /**
     * create new subcategory
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'prodcut_type' => 'required|string',
            'main_category' => 'required|string',
            'status' => 'required|string',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'name' => $request->name,
            'productType' => $request->prodcut_type,
            'mainCategory' => $request->main_category,
            'image' => $request->image,
            'status' => $request->status,
        ];
        $response = sendRequest('POST', config('api_path.add_subcategory'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * edit sub category
     */
    public function edit($id)
    {
        $title = 'Edit sub category';
        $data['subCategoryId'] = $id;
        $response = sendRequest('POST', config('api_path.get_subcategory'), $data);
        $subcate = $response->data[0];
        $response = sendRequest('POST', config('api_path.category_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $categryList = $response->data;
        if($response->status){
            return view('subcategory.edit', compact([
                'categryList',
                'subcate',
                'title',
            ]));
        }
        return redirect()->with('error', $response->message);
    }

    /**
     * update sub category
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'prodcut_type' => 'required|string',
            'main_category' => 'required|string',
            'status' => 'required|string',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'subCategoryId' => $id,
            'name' => $request->name,
            'productType' => $request->prodcut_type,
            'mainCategory' => $request->main_category,
            'image' => $request->image,
            'status' => $request->status,
        ];
        $response = sendRequest('POST', config('api_path.update_subcategory'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    public function deleteSubcategory($id)
    {
        $data['subCategoryId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_subcategory'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
