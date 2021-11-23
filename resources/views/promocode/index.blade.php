@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Promocodes</h1>
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
                    <h2>Promocode List</h2>
                    <ul class="header-dropdown dropdown">

                        {{-- <li><a href="javascript:void(0);" class="btn btn-sm btn-primary text-white" title="">Export</a>
                        </li> --}}
                        <li><a href="{{ route('promocodes.create') }}" class="btn btn-sm btn-primary text-white" title="">Add Promocode</a>
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
                                    <th>PromoCodes</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Expire Date</th>
                                    <th>N.o Of Usage Per Person</th>
                                    <th>Total Usage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($promos))
                                    @foreach ($promos as $key=>$promo)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $promo->name }}</td>
                                            <td>{{ $promo->type }}</td>
                                            <td>{{ $promo->value }}</td>
                                            <td>{{ $promo->expiryDate }}</td>
                                            <td>{{ $promo->noOfUsagePerPerson }}</td>
                                            <td>{{ $promo->totalUsage }}</td>
                                            <td>
                                                <a href="{{ route('promocodes.edit', $promo->_id) }}"><i
                                                        class="fa fa-edit text-primary"><span>Edit/View</span></i></a> <br>
                                                <a href="{{ route('promo.code.dlt', $promo->_id) }}">
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
