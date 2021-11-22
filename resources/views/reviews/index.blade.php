@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Review And Ratings </h1>
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
                    <h2>Review And Ratings List</h2>
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
                                    <th>Product Name</th>
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Ratings</th>
                                    <th>N.o Of Reviews</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($ratings))
                                    @foreach ($ratings as $key=>$prod)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $prod->productName }}</td>
                                            <td>{{ $prod->productId }}</td>
                                            <td>{{ $prod->SKU }}</td>
                                            <td>{{ $prod->ratings }}</td>
                                            <td>{{ $prod->noOfReviews }}</td>
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
                                                <a href="{{ route('product.edit', $prod->_id) }}"><i
                                                        class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
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
