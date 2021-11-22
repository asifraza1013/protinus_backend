<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Login page
     */
    public function login()
    {

        // URL::forceRootUrl('http://127.0.0.1:8700');
        // URL::forceRootUrl(config('app.url'));
        if (Session::get('authentication')) {
            return redirect(route('home'));
        }

        $title = 'Login';
        return view('login', compact(['title']));
    }

    /**
     * proceed login
     */
    public function proceedLogin(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        Session::forget('authentication');
        $response = sendRequest('POST', config('api_path.login'), $data);
        if($response->status){
            $user = (object)[
                '_id' => $response->data->user->_id,
                'userName' => $response->data->user->userName,
                'email' => $response->data->user->email,
                'status' => $response->data->user->status,
                'accountType' => $response->data->user->accountType,
                'token' => $response->data->token,
            ];

            Session::put('authentication', $user);
            if($response->data->user->accountType == 'Developer'){
                return redirect(route('earnings.index'));
            }
            return redirect(route('home'));
        }else{
            return redirect()->back()->with('error', $response->message);
        }
    }

    /**
     * logout
     */
    public function logout(Request $request)
    {
        Session::flush();
        return \redirect(route('login'));
    }

    /**
     * get user list
     */
    public function userList()
    {
        $title = 'User List';

        $response = sendRequest('POST', config('api_path.user_list'));
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }

        $users = $response->user;
        return view('users.index', compact([
            'title',
            'users',
        ]));
    }

    /**
     * create user
     */
    public function createUser()
    {
        $title = 'Create User';
        return view('users.create', compact([
            'title',
        ]));
    }
    /**
     * add user
     */
    public function addUser(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'user_name' => 'required|string',
            'password' => 'required|string',
            'password_confirmation'=>'required|same:password',
            'status'=>'required|string',
            'subscription_type'=>'required|string',
            'account_type'=>'required|string',
            'employer'=>'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}
        $data = [
            'userName' => $request->user_name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,
            'subscriptionType' => $request->subscriptionType,
            'accountType' => $request->accountType,
            'employer' => $request->employer,
        ];
        $response = sendRequest('POST', config('api_path.add_user'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }



    /**
     * get user list
     */
    public function editUser($id)
    {
        $title = 'Edit User';

        $data['userId'] = $id;
        $response = sendRequest('POST', config('api_path.user_detail'), $data);
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }

        $user = $response->user[0];
        return view('users.edit', compact([
            'title',
            'user',
        ]));
    }

    /**
     * update user
     */
    public function update(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'user_name' => 'required|string',
            'status'=>'required|string',
            'subscription_type'=>'required|string',
            'account_type'=>'required|string',
            'employer'=>'required|string',
        ];
        if($request->has('password') && $request->password){
            $rules['password'] = 'required|string';
            $rules['password_confirmation'] ='required|same:password';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors()->getMessages())->withInput();
		}
        $data = [
            '_id' => $request->id,
            'userName' => $request->user_name,
            'email' => $request->email,
            'status' => $request->status,
            'subscriptionType' => $request->subscriptionType,
            'accountType' => $request->accountType,
            'employer' => $request->employer,
        ];
        if($request->has('password') && $request->password){
            $data['password'] = $request->passwor;
        }

        $response = sendRequest('POST', config('api_path.update_user'), $data);
        if($request->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }

    /**
     * delete user
     */
    public function delete($id)
    {
        $data['userId'] = $id;
        $response = sendRequest('POST', config('api_path.delete_user'), $data);
        if($response->status){
            return redirect()->back()->with('success', $response->message);
        }
        return redirect()->back()->with('error', $response->message);
    }
}
