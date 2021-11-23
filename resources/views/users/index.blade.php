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
@include('msg.flash_message')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Users List</h2>
                    <ul class="header-dropdown dropdown">

                        {{-- <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li> --}}
                        <li><a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary text-white" title="">Add User</a>
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
                                @if (count($users))
                                    @foreach ($users as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->userName }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ (isset($user->subscriptionType)) ? $user->subscriptionType : '--' }}</td>
                                            <td>{{ $user->accountType }}</td>
                                            <td>
                                                @if($user->status == 'Active')
                                                <span class="badge badge-success">{{ $user->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $user->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ isset(($user->transactions)) ? $user->transactions : '--' }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.edit', $user->_id) }}"><i
                                                        class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
                                                <a href="{{ route('admin.user.delte', $user->_id) }}">
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
