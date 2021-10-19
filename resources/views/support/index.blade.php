@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Support</h1>
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
                    <h2>Support List</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
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
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Username</th>
                                    <th>Issue N.o</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($supportList))
                                    @foreach ($supportList as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date("Y-m-d",strtotime($item->createdAt)) }}</td>
                                            <td>{{ date("H:i:s",strtotime($item->createdAt)) }}</td>
                                            <td>{{ $item->userName }}</td>
                                            <td>{{ $item->issueNo }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if($item->status == 'Resolved')
                                                <span class="badge badge-success">{{ $item->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('support.edit', $item->_id) }}">
                                                    <i class="fa fa-edit text-primary"><span>Edit/View</span></i>
                                                </a>
                                                <br>
                                                <a href="{{ route('support.dlt', $item->_id) }}">
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
