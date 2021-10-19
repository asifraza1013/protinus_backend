@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Add User</h1>
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
    <div class="container">
        <div class="row clearfix">
            @include('msg.flash_message')
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <form action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="user_name" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" placeholder="email address" aria-label="Username" name="email" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" placeholder="Password" aria-label="Username" name="password" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Username" name="password_confirmation" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                           <select name="status" id="" class="form-control">
                                               <option value="" selected disabled>Select --</option>
                                               @foreach (config('constants.user_status') as $key=>$item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
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
                                               <option value="" selected disabled>Select --</option>
                                               @foreach (config('constants.subscription_type') as $key=>$item)
                                                   <option value="{{ $key }}">{{ $item }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Account Type</label>
                                           <select name="account_type" id="" class="form-control">
                                               <option value="" selected disabled>Select --</option>
                                               @foreach (config('constants.account_type') as $key=>$item)
                                                   <option value="{{ $key }}">{{ $item }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Employer</label>
                                           <select name="employer" id="" class="form-control">
                                               <option value="" selected disabled>selected --</option>
                                               @foreach (config('constants.employer') as $key=>$item)
                                                   <option value="{{ $key }}">{{ $item }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-50 mt-lg-5"></div>
                                <div class="col-2 text-left mt-lg-5 mt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary text-white" title="">Add User</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
