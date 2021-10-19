<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeveloperController extends Controller
{
    /**
     * developer list
     */
    public function index()
    {
        $title = 'Developer List';
        $response = sendRequest('POST', config('api_path.developer_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $developers = $response->developer;
        return view('developer.index', compact([
            'developers',
            'title',
        ]));
    }

    /**
     * craete developer
     */
    public function create()
    {
        $title = 'Create Develoepr';
        return view('developer.create', compact([
            'title'
        ]));
    }

    /**
     * create developer
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'user_name' => 'required|string',
            'password' => 'required|string',
            'password_confirmation'=>'required|same:password',
            'status'=>'required|string',
            'bank_name'=>'required|string',
            'account_number'=>'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'email' => $request->email,
            'userName' => $request->user_name,
            'password' => $request->password,
            'status' => $request->status,
            'bankName' => $request->bank_name,
            'accountNumber' => $request->account_number,
        ];
        $response = sendRequest('POST', config('api_path.add_developer'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * edit developer
     */
    public function edit($id)
    {
        $title = 'Edit Developer';
        $data['developerId'] = $id;
        $response = sendRequest('POST', config('api_path.get_developer'), $data);
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $developer = $response->developer[0];
        return view('developer.edit', compact([
            'developer',
            'title',
        ]));
    }

    /**
     * update developer
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'required|email',
            'user_name' => 'required|string',
            'status'=>'required|string',
            'bank_name'=>'required|string',
            'account_number'=>'required|string',
        ];

        if($request->has('password') && $request->password){
            $rules['password'] = 'required|string';
            $rules['password_confirmation'] = 'required|same:password';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}

        $data = [
            'developerId' => $id,
            'email' => $request->email,
            'userName' => $request->user_name,
            'status' => $request->status,
            'bankName' => $request->bank_name,
            'accountNumber' => $request->account_number,
        ];
        if($request->has('password') && $request->password){
            $data['password'] = $request->password;
        }
        $response = sendRequest('POST', config('api_path.update_developer'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * delete developer
     */
    public function deleteDeveloper($id)
    {
        $data['developerId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_developer'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
