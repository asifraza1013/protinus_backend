@extends('layouts.app')
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h4>General Report</h4>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <h1>Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-3">
            <div class="card box-shadow">
                <div class="body text-left">
                    <i class="fa fa-shopping-cart text-primary fa-2x"></i>
                    <h1>52</h1>
                    <h6 class="text-muted">Total Order</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card box-shadow">
                <div class="body text-left">
                    <i class="fa fa-list text-warning fa-2x"></i>
                    <h1>52</h1>
                    <h6 class="text-muted">Total Product</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card box-shadow">
                <div class="body text-left">
                    <i class="fa fa-tv text-warning fa-2x"></i>
                    <h1>52</h1>
                    <h6 class="text-muted">Total Category</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card box-shadow">
                <div class="body text-left">
                    <i class="fa fa-user text-success fa-2x"></i>
                    <h1>52</h1>
                    <h6 class="text-muted">Total Users</h6>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>12-Month User Registration Data</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="bar-chart" class="ct-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>12-Month sales Data</h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="horizontalbar-chart" class="ct-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
