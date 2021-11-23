@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Room Templates Transactions</h1>
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
                    <h2>Room Templates Transactions List</h2>
                    <ul class="header-dropdown dropdown">

                        {{-- <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li> --}}
                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    </ul>
                </div>
                @include('msg.flash_message')
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>N.o</th>
                                    <th>Username</th>
                                    <th>Room Name</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Transactions</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($room_templates))
                                    @foreach ($room_templates as $key=>$room)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $room->userName->userName }}</td>
                                            <td>{{ $room->roomName }}</td>
                                            <td>{{ currency($room->price) }}</td>
                                            <td>{{ $room->type }}</td>
                                            <td>{{ isset($room->transactions) ? $room->transactions : '--' }}</td>
                                            <td>
                                                @if(isset($room->status))
                                                @if($room->status == 'Active')
                                                <span class="badge badge-success">{{ $room->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $room->status }}</span>
                                                @endif
                                                @else
                                                --
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('roomtemplate.edit', $room->_id) }}">
                                                    <i class="fa fa-edit text-primary"><span>Edit/View</span></i>
                                                </a>
                                                <br>
                                                <a href="{{ route('roomtemplate.dlt', $room->_id) }}">
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
