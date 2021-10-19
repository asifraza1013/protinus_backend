@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Notifications</h1>
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
                    <h2>Notifications List</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li>
                        <li><a href="{{ route('notifications.create') }}" class="btn btn-sm btn-primary text-white" title="">Add Notifications</a>
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
                                    <th>Title</th>
                                    <th>Notificationss</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($notifications))
                                    @foreach ($notifications as $key=>$noti)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date("Y-m-d",strtotime($noti->createdAt)) }}</td>
                                            <td>{{ date("H:i:s",strtotime($noti->createdAt)) }}</td>
                                            <td>{{ isset($noti->title) ? $noti->title : '' }}</td>
                                            <td>{{ isset($noti->message) ? $noti->message : '' }}</td>
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
