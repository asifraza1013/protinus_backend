<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperTransactionsController extends Controller
{
    public function index()
    {
        $title = 'Developer Transactions';
        $response = sendRequest('POST', config('api_path.developer_transactions_list'));
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
