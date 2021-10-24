@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Subscription</h1>
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
                    <h2>Subscription List</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li>
                        <li><a href="{{ route('subscription.create') }}" class="btn btn-sm btn-primary text-white" title="">Add Subscription</a>
                        </li>
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
                                    <th>Monthly Prices</th>
                                    <th>N.o Of Users</th>
                                    <th>Staff</th>
                                    <th>Unlimited Product</th>
                                    <th>Products</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($subscriptions))
                                    @foreach ($subscriptions as $key=>$prod)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $prod->name }}</td>
                                            <td>{{ currency($prod->monthlyPrice) }}</td>
                                            <td>{{ (isset($prod->noOfUsers)) ? $prod->noOfUsers : '--' }}</td>
                                            <td>{{ $prod->staffAccountAvailable }}</td>
                                            <td>{{ $prod->unlimitedProductsUpload }}</td>
                                            <td>{{ $prod->noOfProductUpload }}</td>
                                            <td>
                                                @if(isset($prod->status))
                                                @if($prod->status == 'Active')
                                                <span class="badge badge-success">{{ $prod->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $prod->status }}</span>
                                                @endif
                                                @else
                                                <span class="badge badge-success">--</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('subscription.edit', $prod->_id) }}"><i
                                                        class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
                                                <a href="{{ route('subscription.dlt', $prod->_id) }}">
                                                    <i class="fa fa-trash text-danger"><span class="text-danger">Delete</span></i>
                                                </a>
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
