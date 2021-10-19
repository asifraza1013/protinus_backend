@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Edit/View Developer</h1>
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
                        <form action="{{ route('developer.update', $developer->_id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="user_name" aria-describedby="basic-addon1" value="{{ $developer->userName }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input type="email" class="form-control" placeholder="email address" aria-label="Username" name="email" aria-describedby="basic-addon1" value="{{ $developer->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" placeholder="Password" aria-label="Username" name="password" aria-describedby="basic-addon1">
                                            <p class="red">Optional! Input if you want to change</p>
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
                                                    <option value="{{ $key }}" {{ ($key == $developer->status) ? 'selected' : ''}}>{{ $item }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Bank Name</label>
                                            <input type="text" class="form-control" placeholder="Banke Name" aria-label="Username" name="bank_name" aria-describedby="basic-addon1" value="{{ $developer->bankName }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Account Number</label>
                                            <input type="text" class="form-control" placeholder="Banke Name" aria-label="Username" name="account_number" aria-describedby="basic-addon1" value="{{ $developer->accountNumber }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-50 mt-lg-5"></div>
                                <div class="col-2 text-left mt-lg-5 mt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary text-white" title="">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
