@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>View/Edit Users</h1>
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
            @include('msg.flash_message')
            <div class="card">
                <div class="body">
                    <form action="{{ route('admin.user.update') }}" method="POST">
                        @csrf
                        <div class="row clearfix p-3">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            aria-label="Username" name="user_name" aria-describedby="basic-addon1"
                                            value="{{ $user->userName }}">
                                            <input type="hidden" name="id" id="" value="{{ $user->_id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" class="form-control" placeholder="email address"
                                            aria-label="Username" name="email" aria-describedby="basic-addon1"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" placeholder="Password"
                                            aria-label="Username" name="password" aria-describedby="basic-addon1"
                                            value="" placeholder="Password">
                                            <p class="red">Option, Input If You Want to Change</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control"
                                            placeholder="Confirm Password" aria-label="Username"
                                            aria-describedby="basic-addon1" name="password_confirmation" value="" placeholder="Confirm New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            @foreach (config('constants.user_status') as $key=>$item)
                                                <option value="{{ $key }}" {{ ($key == $user->status) ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Subscription Type</label>
                                        <select name="subscription_type" id="" class="form-control">
                                            <option value="{{ $user->subscriptionType }}" selected>{{ $user->subscriptionType }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Account Type</label>
                                        <select name="account_type" id="" class="form-control">
                                            <option value="{{ $user->accountType }}" selected>{{ $user->accountType }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="">Employer</label>
                                        <select name="employer" id="" class="form-control">
                                            <option value="{{ $user->employer }}">{{ $user->employer }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 text-left">
                            <button type="submit" class="btn btn-block btn-lg btn-primary text-white"
                                title="">update</button>
                        </div>
                    </form>

                    <div class="h-50 mt-lg-5 mt-3"></div>
                    <ul class="nav nav-tabs3">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#transactions">Transactions</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#staff-accounts">Staff Accounts</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="transactions">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>N.o</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Transaction ID</th>
                                            <th>Buyer</th>
                                            <th>Seller</th>
                                            <th>Products</th>
                                            <th>Product Id</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>24/10/01</td>
                                            <td>6:00</td>
                                            <td>T23n23</td>
                                            <td>Employee</td>
                                            <td>Test</td>
                                            <td>Red Color</td>
                                            <td>001</td>
                                            <td>$150</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="staff-accounts">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>N.o</th>
                                            <th>Username</th>
                                            <th>Email Address</th>
                                            <th>Subscription</th>
                                            <th>Account Type</th>
                                            <th>Status</th>
                                            <th>Transactions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Howard Hatfield</td>
                                            <td>test@gmail.com</td>
                                            <td>None</td>
                                            <td>Employee</td>
                                            <td>Active</td>
                                            <td>3</td>
                                            <td>
                                                <a href="edit-user.html"><i class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
                                                <i class="fa fa-trash text-danger"><span class="text-danger">Delete</span></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
