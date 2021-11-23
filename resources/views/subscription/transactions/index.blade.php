@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Subscription Transactions</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Subscription Transactions List</h2>
                    <ul class="header-dropdown dropdown">

                        {{-- <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li> --}}
                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>N.o</th>
                                    <th>Name</th>
                                    <th>Subscription</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Expiration</th>
                                    <th>Transaction ID</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transactions))
                                    @foreach ($transactions as $key=>$prod)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $prod->name->userName }}</td>
                                            <td>{{ $prod->subscriptionPlan->name }}</td>
                                            <td>{{ $prod->startDate }}</td>
                                            <td>{{ $prod->startTime }}</td>
                                            <td>{{ (isset($prod->expirationDate)) ? $prod->expirationDate : '--'  }}</td>
                                            <td>{{ (isset($prod->transactionId)) ? $prod->transactionId : '--'  }}</td>
                                            <td>
                                                @if(isset($prod->Payment))
                                                @if($prod->Payment == 'Completed')
                                                <span class="badge badge-success">{{ $prod->Payment }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $prod->Payment }}</span>
                                                @endif
                                                @else
                                                <span class="badge badge-success">--</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
