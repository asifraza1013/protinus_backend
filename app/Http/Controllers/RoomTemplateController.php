<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Get Room Template List';
        $response = sendRequest('POST', config('api_path.room_template_list'));
        if($response->status){
            $room_templates = $response->data;
            return view('roomTemplate.index', compact([
                'room_templates',
                'title',
            ]));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Room Template';
        $userList = sendRequest('POST', config('api_path.user_list'));
        if(!$userList->status){
            return redirect()->with('error', $userList->message);
        }
        $userList = $userList->user;

        $subCateList = sendRequest('POST', config('api_path.subcategory_list'));
        if(!$subCateList->status){
            return redirect()->with('error', $userList->message);
        }
        $subCateList = $subCateList->data;

        $response = sendRequest('POST', config('api_path.product_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $products = $response->data;
        return view('roomTemplate.create', compact([
            'products',
            'subCateList',
            'title',
            'userList',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'user_name' => 'required|string',
            'room_name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sub_category' => 'required|string',
            'product_id' => 'required|string',
            'status' => 'required|string',
            'product_description' => 'required|string',
            'status' => 'required|string',
            'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'userName' => $request->user_name,
            'roomName' => $request->room_name,
            'type' => $request->type,
            'price' => $request->price,
            'subCategory' => $request->sub_category,
            'productId' => $request->product_id,
            'productDescription' => $request->prod_description,
            'roomImage' => $request->roomImage,
        ];

        $response = sendRequest('POST', config('api_path.add_room_template'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Room Template';
        $data['roomId'] = $id;

        $userList = sendRequest('POST', config('api_path.user_list'));
        if(!$userList->status){
            return redirect()->with('error', $userList->message);
        }
        $userList = $userList->user;

        $subCateList = sendRequest('POST', config('api_path.subcategory_list'));
        if(!$subCateList->status){
            return redirect()->with('error', $userList->message);
        }
        $subCateList = $subCateList->data;

        $response = sendRequest('POST', config('api_path.product_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $products = $response->data;
        $response = sendRequest('POST', config('api_path.get_room_template'), $data);
        if($response->status){
            $template = $response->data[0];
            return view('roomTemplate.edit', compact(
                'title',
                'products',
                'subCateList',
                'template',
                'userList',
            ));
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'user_name' => 'required|string',
            'room_name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sub_category' => 'required|string',
            'product_id' => 'required|string',
            'status' => 'required|string',
            'product_description' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'userName' => $request->user_name,
            'roomName' => $request->room_name,
            'type' => $request->type,
            'price' => $request->price,
            'subCategory' => $request->sub_category,
            'productId' => $request->product_id,
            'productDescription' => $request->prod_description,
            'roomImage' => $request->roomImage,
        ];

        $response = sendRequest('POST', config('api_path.update_room_template'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyTempalte($id)
    {
        $data['roomId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_room_template'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
