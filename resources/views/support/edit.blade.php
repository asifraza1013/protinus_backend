@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Edit/View Support</h1>
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
                        <form action="{{ route('support.update', $support->_id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="">Product SKU</label>
                                            <select name="status" id="product-sku" class="form-control">
                                                <option value="" selected disabled>Selected --</option>
                                                @foreach(config('constants.support_status') as $key=>$status)
                                                    <option value="{{ $key }}"
                                                    {{ ($status == $support->status) ? 'selected' : '' }}
                                                    >{{ $status }}</option>
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
