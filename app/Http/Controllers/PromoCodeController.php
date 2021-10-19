<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Promo Code List';
        $response = sendRequest('POST', config('api_path.promo_code_list'));
        if($response->status){
            $promos = $response->data;
            return view('promocode.index', compact([
                'promos',
                'title',
            ]));
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create new Promocode';
        $response = sendRequest('POST', config('api_path.product_list'));
        if($response->status){
            $products = $response->data;
            return view('promocode.create', compact([
                'products',
                'title',
            ]));
        }

        return redirect()->back()->with('erroe', $response->message);
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
            'name' => 'required|string',
            'type' => 'required|string',
            'value' => 'required|numeric|min:0',
            'min_spend' => 'required|string',
            'min_spend_amount' => 'nullable|numeric|min:0',
            'total_usage' => 'required|numeric|min:0',
            'total_usage_person' => 'required|numeric|min:0',
            'product_specification' => 'required|string',
            'product_sku' => 'required|string',
            'expire_date' => 'required',
            'product_id' => 'required|string',
            'product_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'minimumSpending' => $request->min_spend,
            'expiryDate' => date("d-m-Y",strtotime($request->expire_date)),
            'totalUsage' => $request->total_usage,
            'noOfUsagePerPerson' => $request->total_usage_person,
            'productspecific' => $request->product_specification,
            'productSKU' => $request->product_sku,
            'productId' => $request->product_id,
            'productName' => $request->product_name,
        ];
        if($request->min_spend == "Yes"){
           $data['minimumSpendingAmount']  = $request->min_spend_amount;
        }

        $response = sendRequest('POST', config('api_path.add_promo_code'), $data);
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
        $title = 'Edit Promo Code';
        $data['promoCodeId'] = $id;
        $response = sendRequest('POST', config('api_path.get_promo_code'), $data);
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $prodResponse = sendRequest('POST', config('api_path.product_list'));
        if(!$prodResponse->status){
            return redirect()->back()->with('error', $prodResponse->message);
        }
        $promo = $response->data[0];
        $products = $prodResponse->data;

        return view('promocode.edit' ,compact([
            'products',
            'promo',
            'title',
        ]));
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
            'name' => 'required|string',
            'type' => 'required|string',
            'value' => 'required|numeric|min:0',
            'min_spend' => 'required|string',
            'min_spend_amount' => 'nullable|numeric|min:0',
            'total_usage' => 'required|numeric|min:0',
            'total_usage_person' => 'required|numeric|min:0',
            'product_specification' => 'required|string',
            'product_sku' => 'required|string',
            'expire_date' => 'required',
            'product_id' => 'required|string',
            'product_name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'promoCodeId' => $id,
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'minimumSpending' => $request->min_spend,
            'expiryDate' => date("d-m-Y",strtotime($request->expire_date)),
            'totalUsage' => $request->total_usage,
            'noOfUsagePerPerson' => $request->total_usage_person,
            'productspecific' => $request->product_specification,
            'productSKU' => $request->product_sku,
            'productId' => $request->product_id,
            'productName' => $request->product_name,
        ];
        if($request->min_spend == "Yes"){
           $data['minimumSpendingAmount']  = $request->min_spend_amount;
        }

        $response = sendRequest('POST', config('api_path.update_promo_code'), $data);
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
    public function destroyPromo($id)
    {
        $data['promoCodeId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_promo_code'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
