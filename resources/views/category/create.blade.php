@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Add Category</h1>
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
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="name" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Type</label>
                                            <input type="text" class="form-control" placeholder="Product Type" aria-label="Username" name="prodcut_type" aria-describedby="basic-addon1">
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
                                            <label for="">Image Upload</label>
                                            <input type="file" class="form-control" placeholder="email address" aria-label="Username" name="image" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-50 mt-lg-5"></div>
                                <div class="col-2 text-left mt-lg-5 mt-3">
                                    <button type="submit" class="btn btn-block btn-lg btn-primary text-white" title="">Add</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
