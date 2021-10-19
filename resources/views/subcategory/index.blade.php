@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Users</h1>
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
                <div class="header">
                    <h2>Subcategory List</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li>
                        <li><a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary text-white" title="">Add</a>
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
                                    <th>Product Type</th>
                                    <th>Main Category</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($list))
                                    @foreach ($list as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ isset($user->productType) ? $user->productType : '--' }}</td>
                                            <td>{{ (count($user->mainCategory)) ? $user->mainCategory[0]->name : '--' }}</td>
                                            <td>
                                                @if(isset($user->status))
                                                @if($user->status == 'Active')
                                                <span class="badge badge-success">{{ $user->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $user->status }}</span>
                                                @endif
                                                @else
                                                --
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $user->_id) }}"><i
                                                        class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
                                                <a href="{{ route('sub.category.dlt', $user->_id) }}">
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
