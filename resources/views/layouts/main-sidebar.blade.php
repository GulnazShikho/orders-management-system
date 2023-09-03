<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main_trans.Dashboard') }}</span>
                            </div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>
                    <!-- menu item Elements-->
                    @can('view all user orders')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Orders') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('orders.index') }}">{{ trans('main_trans.OrdersList') }}</a></li>
                        </ul>
                    </li>
                    @endcan
                    <!-- menu item Elements-->
                    @can('view users orders')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#ele">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('main_trans.MyOrders') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="ele" class="collapse" data-parent="#sidebarnav">
                           <li><a href="{{ route('userorders.show',Auth::user()->id) }}">{{ trans('main_trans.OrdersList') }}</a></li>
                        </ul>
                    </li>
                    @endcan
                    <!-- menu item Authentication-->
                    @can('view users List')
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Users') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('users.index')}}">{{ trans('main_trans.UsersList') }}</a> </li>
                        </ul>
                    </li>
                    @endcan
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ trans('main_trans.calendar') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">{{ trans('main_trans.EventsCalendar') }} </a> </li>
                            <li> <a href="calendar-list.html">{{ trans('main_trans.ListCalendar') }}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">
                        {{ trans('main_trans.Todolist')}}</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">{{ trans('main_trans.Chat') }}
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">{{ trans('main_trans.Mailbox') }}
                                </span> <span class="badge badge-pill badge-warning float-right mt-1"></span> </a>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Charts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- menu item table -->
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
