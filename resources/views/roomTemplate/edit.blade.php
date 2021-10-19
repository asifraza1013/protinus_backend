@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Edit/View Room Template</h1>
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
                        <form action="{{ route('roomtemplate.update', $template->_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <select name="user_name" id="" class="form-control">
                                                <option value="" selected disabled>select --</option>
                                                @foreach ($userList as $user)
                                                    <option value="{{ $user->_id }}"
                                                        {{ ($template->userName->_id == $user->_id) ? 'selected' : '' }}
                                                        >{{ $user->userName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Room Name</label>
                                            <input type="text" class="form-control" placeholder="Room Name" aria-label="Username" name="room_name" aria-describedby="basic-addon1" value="{{ ($template->roomName) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <input type="text" class="form-control" placeholder="Type" aria-label="Username" name="type" aria-describedby="basic-addon1" value="{{ $template->type }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" class="form-control" placeholder="Pirce" aria-label="Username" name="price" aria-describedby="basic-addon1" value="{{ $template->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Sub Category</label>
                                            <select name="sub_category" id="" class="form-control">
                                                <option value="" selected disabled>select --</option>
                                                @foreach ($subCateList as $user)
                                                    <option value="{{ $user->_id }}"
                                                        {{ ($user->_id == $template->subCategory->_id) ? 'selected' : '' }}
                                                        >{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product ID</label>
                                            <select name="product_id" id="" class="form-control">
                                                <option value="" selected disabled>select --</option>
                                                @foreach ($products as $prod)
                                                    <option value="{{ $prod->_id }}"
                                                        {{ ($prod->_id == $template->productId) ? 'selected' : '' }}
                                                        >{{ $prod->productName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product Description</label>
                                           <textarea name="product_description" id="" cols="30" rows="7" class="form-control" placeholder="Product Description">{{ $template->productDescription }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                           <input type="file" name="image" id="" class="form-control">
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
