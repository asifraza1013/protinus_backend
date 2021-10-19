<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product List';
        $response = sendRequest('POST', config('api_path.product_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $products = $response->data;
        return view('product.index', compact([
            'products',
            'title',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Product';
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
        return view('product.create', compact([
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
        // dd($request->all());
        $rules = [
            'user_name' => 'required|string',
            'product_name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sub_category' => 'required|string',
            'product_id' => 'required|string',
            'status' => 'required|string',
            'prod_description' => 'required|string',
            'attribute' => 'required|string',
            'quantity' => 'required|string',
            'sku' => 'required|string',
            'images' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            dd('here');
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        // get attributes
        $attributes = explode(',' ,$request->attribute);
        $quantity = explode(',' ,$request->quantity);
        $sku = explode(',' ,$request->sku);
        if(count($attributes) != count($quantity) || count($attributes) != count($sku)){
            return redirect()->back()->with('error', 'Please add correct data for attributes.')->withInput();
        }
        $productAttributes = [];
        $attr_array = [];
        $sku_array = [];
        $quantity_array = [];
        foreach($attributes as $key=>$attr){
            $productAttributes['productAttributes['.$key.']'] = [$attr, $quantity[$key], $sku[$key]];
        }
        dd($request->all());

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
