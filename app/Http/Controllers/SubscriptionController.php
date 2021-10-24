<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Subscription List';
        $response = sendRequest('POST', config('api_path.subscription_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $subscriptions = $response->data;
        return view('subscription.index', compact([
            'subscriptions',
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
        $title = 'Create Subscription';
        return view('subscription.create', compact([
            'title',
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
            'name' => 'required|string',
            'monthly_price' => 'required|numeric|min:0',
            'onlinestore_presence' => 'required|string',
            'unlimited_product' => 'required|string',
            'product_upload' => 'required|string',
            'staff_account_available' => 'required|string',
            'online_template_access' => 'required|string',
            'support' => 'required|string',
            'status' => 'required|string',
            'live_chat' => 'required|string',
            'reports' => 'required|string',
            'discount_code_creation' => 'required|string',
            'manual_order_creation' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'name' => $request->name,
            'monthlyPrice' => $request->monthly_price,
            'onlineStorePresence' => $request->onlinestore_presence,
            'unlimitedProductsUpload' => $request->unlimited_product,
            'noOfProductUpload' => $request->product_upload,
            'onlineTemplatesAccess' => $request->online_template_access,
            'support' => $request->support,
            'manualOredrCreation' => $request->manual_order_creation,
            'staffAccountAvailable' => $request->staff_account_available,
            'reports' => $request->reports,
            'status' => $request->status,
            'liveChat' => $request->live_chat,
            'discountCodeCreation' => $request->discount_code_creation,
        ];

        $response = sendRequest('POST', config('api_path.add_subscription'), $data);
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
        $title = 'Edit/View Subscription';
        $data['subscriptionId'] = $id;
        $response = sendRequest('POST', config('api_path.get_subscription'), $data);
        if($response->status){
            $sub = $response->data[0];
            return view('subscription.edit', compact([
                'sub',
                'title',
            ]));
        }
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
            'monthly_price' => 'required|numeric|min:0',
            'onlinestore_presence' => 'required|string',
            'unlimited_product' => 'required|string',
            'product_upload' => 'required|string',
            'staff_account_available' => 'required|string',
            'online_template_access' => 'required|string',
            'support' => 'required|string',
            'status' => 'required|string',
            'live_chat' => 'required|string',
            'reports' => 'required|string',
            'discount_code_creation' => 'required|string',
            'manual_order_creation' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'subscriptionId' => $id,
            'name' => $request->name,
            'monthlyPrice' => $request->monthly_price,
            'onlineStorePresence' => $request->onlinestore_presence,
            'unlimitedProductsUpload' => $request->unlimited_product,
            'noOfProductUpload' => $request->product_upload,
            'onlineTemplatesAccess' => $request->online_template_access,
            'support' => $request->support,
            'manualOredrCreation' => $request->manual_order_creation,
            'staffAccountAvailable' => $request->staff_account_available,
            'reports' => $request->reports,
            'status' => $request->status,
            'liveChat' => $request->live_chat,
            'discountCodeCreation' => $request->discount_code_creation,
        ];

        $response = sendRequest('POST', config('api_path.update_subscription'), $data);
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
    public function destroySub($id)
    {
        $data['subscriptionId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_subscription'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('success', $response->message);
    }
}
