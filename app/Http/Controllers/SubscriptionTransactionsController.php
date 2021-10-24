<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionTransactionsController extends Controller
{
    /**
     * subscription transactions list
     */
    public function index()
    {
        $title = 'Susbcriptions Transactions List';
        $response = sendRequest('POST', config('api_path.subscription_transactions_list'));
        if($response->status){
            $transactions = $response->data;
            return view('subscription.transactions.index', compact([
                'transactions',
                'title',
            ]));
        }
        return redirect()->back()->with('error', $response->message);
    }
}
