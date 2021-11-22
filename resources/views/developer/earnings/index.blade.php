@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Developer Earnings</h1>
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
                    <h2>Developer Earnings List</h2>
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
                                    <th>Developer</th>
                                    <th>Total Earnings</th>
                                    <th>Total Payout</th>
                                    <th>Remaining</th>
                                    <th>N.o Of Transactions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($earnings)
                                    @foreach ($earnings as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->developerName->userName }}</td>
                                            <td>{{ currency($user->totalEarning) }}</td>
                                            <td>{{ currency($user->totalPayout) }}</td>
                                            <td>{{ currency($user->remaining) }}</td>
                                           <td>{{ $user->noOfTransaction }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="5">No Record Found</td>
                                    </tr>
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
