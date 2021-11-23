@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Developer Payout</h1>
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
                    <h2>Developer Payout List</h2>
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
                                    <th>Payout Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Payout ID</th>
                                    <th>Transaction ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transactions))
                                    @foreach ($transactions as $key=>$user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ currency($user->payoutAmount) }}</td>
                                            <td>{{ $user->date }}</td>
                                            <td>{{ $user->time }}</td>
                                            <td>
                                                @if($user->status == 'Completed')
                                                <span class="badge badge-success">{{ $user->status }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $user->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->payoutId }}</td>
                                            <td>{{ $user->transactionId }}</td>
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
