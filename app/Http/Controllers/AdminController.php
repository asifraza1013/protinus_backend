<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * admin list
     */
    public function adminList()
    {
        $title = 'Admin List';
        $response = sendRequest('POST', config('api_path.admin_list'));
        $adminList = $response->data;
        return view('admin.index', compact([
            'title',
            'adminList'
        ]));
    }

    /**
     * create admin
     */
    public function create()
    {
        $title = 'Create Admin';
        return view('admin.create', compact([
            'title'
        ]));
    }

    /**
     * store admin
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'user_name' => 'required|string',
            'password' => 'required|string',
            'password_confirmation'=>'required|same:password',
            'status'=>'required|string',
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
        ];
        $response = sendRequest('POST', config('api_path.add_admin'),  $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * edit
     */
    public function edit($id)
    {
        $title = 'Edit Admin';
        $data['adminId'] = $id;
        $response = sendRequest('POST', config('api_path.get_admin'),  $data);
        if($response->status){
            $admin = $response->admin[0];
            return view('admin.edit', compact([
                'admin',
                'title',
            ]));
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * dalete admin
     */
    public function deleteAdmin($id)
    {
        $data['adminId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_admin'),  $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
