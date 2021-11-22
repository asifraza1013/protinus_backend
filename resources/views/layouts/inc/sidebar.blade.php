<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-left">
            <div class="navbar-brand">
                <a class="small_menu_btn" href="javascript:void(0);"><i class="fa fa-list-alt"></i></a>
                <a href="{{ route('home') }}"><span class="bold">Protinus</span></a>
            </div>
        </div>

        <div class="navbar-right">
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('logout') }}" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<?php
    $auth = Session::get('authentication');
    $userType = $auth->accountType;
?>
<div id="left-sidebar" class="sidebar">
    <div class="sidebar_list">
        <div class="tab-content" id="main-menu">
            <div class="tab-pane active" id="Home-icon">
                <nav class="sidebar-nav sidebar-scroll">
                    @if ($userType == 'Admin')
                    <ul class="metismenu">
                        <li class="">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.user.list') }}"><i class="fa fa-users"></i><span>Users</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.admin.list') }}"><i class="fa fa-lock"></i><span>Admin</span></a>
                        </li>
                        <li class="">
                            <a href="#"><i class="fa fa-database"></i><span>Developers</span></a>
                            <ul class="drop">
                                <li class="">
                                    <a href="{{ route('developer.index') }}"><i class="fa fa-database"></i><span>Developers</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('developer.payout.index') }}"><i class="fa fa-bars"></i><span>Payout</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('earnings.index') }}"><i class="fa fa-bars"></i><span>Earnings</span></a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="">
                            <a href="{{ route('developer.index') }}"><i class="fa fa-database"></i><span>Developers</span></a>
                        </li> --}}
                        <li class="">
                            <a href="#" class="has-arrow"><i class="fa fa-search"></i><span>Category</span></a>
                            <ul class="drop">
                                <li class="">
                                <a href="{{ route('category.index') }}"><i class="fa fa-bars"></i><span>Category</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('subcategory.index') }}"><i class="fa fa-bars"></i><span>Sub Category</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="{{ route('notifications.index') }}"><i class="fa fa-bell"></i><span>Notifications</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('promocodes.index') }}"><i class="fa fa-bell"></i><span>Promocode</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('support.index') }}"><i class="fa fa-question-circle"></i><span>Support</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('product.index') }}"><i class="fa fa-product-hunt"></i><span>Products</span></a>
                        </li>
                        {{-- <li class="">
                            <a href="{{ route('roomtemplate.index') }}"><i class="fa fa-address-card"></i><span>Room Templates</span></a>
                        </li> --}}
                        <li class="">
                            <a href="#"><i class="fa fa-address-card"></i><span>Room Templates</span></a>
                            <ul class="drop">
                                <li class="">
                                    <a href="{{ route('roomtemplate.index') }}"><i class="fa fa-address-card"></i><span>Room Templates</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-bars"></i><span>Transactions</span></a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="">
                            <a href="{{ route('subscription.index') }}"><i class="fa fa-search"></i><span>Subscriptions</span></a>
                        </li> --}}
                        <li class="">
                            <a href="#"><i class="fa fa-search"></i><span>Subscriptions</span></a>
                            <ul class="drop">
                                <li class="">
                                    <a href="{{ route('subscription.index') }}"><i class="fa fa-search"></i><span>Subscriptions</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('subscription.transactions') }}"><i class="fa fa-search"></i><span>Transactions</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="{{ route('reviewrating.index') }}"><i class="fa fa-search"></i><span>Rating & Reviews</span></a>
                        </li>
                    </ul>
                    @else
                    <ul class="metismenu">
                        <li>
                            <a href="{{ route('roomtemplate.index') }}"><i class="fa fa-bars"></i><span>Room Template</span></a>
                        </li>
                        <li>
                            <a href="{{ route('developer.payout.index') }}"><i class="fa fa-bars"></i><span>Payout</span></a>
                        </li>
                        <li>
                            <a href="{{ route('earnings.index') }}"><i class="fa fa-bars"></i><span>Earnings</span></a>
                        </li>
                        <li>
                            <a href="{{ route('developer.edit', $auth->_id) }}"><i class="fa fa-bars"></i><span>Profile</span></a>
                        </li>
                    </ul>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
