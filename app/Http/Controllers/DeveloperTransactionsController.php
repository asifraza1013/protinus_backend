<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeveloperTransactionsController extends Controller
{
    public function index()
    {
        $title = 'Developer Transactions';
        $authentication = Session::get('authentication');
        $userType = isset($authentication->accountType) ? $authentication->accountType : false;
        if($userType == 'Developer'){
            $data['userId'] = $authentication->_id;
            $response = sendRequest('POST', config('api_path.developer_transactions_list'), $data);
        }else{
            $response = sendRequest('POST', config('api_path.developer_transactions_list'));
        }
        if(!$response->status){
            return redirect()->back()->with('error', $response->message);
        }
        $transactions = $response->data;
        return view('developer.transactions.index', compact([
            'title',
            'transactions',
        ]));
    }
}
