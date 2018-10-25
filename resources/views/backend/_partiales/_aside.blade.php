<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/images/logo.jpg') }}" height="100" width="44" height="44" class="img-circle" style="height: 44px; max-width: 45px;" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucfirst(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Coonected </a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @if(Auth::user() and Auth::user()->role != 'client')
                <li class="treeview {{ (Request::is('admin/bookings') || Request::is('admin/bookings/create')) ? 'active menu-open' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Bookings</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li @if(Request::is('admin/bookings')) class="active" @endif ><a href="{{ route('bookings.index') }}"><i class="fa fa-circle-o"></i>All bookings</a></li>
                        <li @if(Request::is('admin/bookings/create')) class="active" @endif ><a href="{{ route('bookings.create') }}"><i class="fa fa-circle-o"></i>New booking</a></li>
                    </ul>
                </li>
                <li class="treeview {{ (Request::is('admin/clients') || Request::is('admin/clients/create')) ? 'active menu-open' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Clients</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li @if(Request::is('admin/clients')) class="active" @endif ><a href="{{ route('clients.index') }}"><i class="fa fa-circle-o"></i>All clients</a></li>
                        <li @if(Request::is('admin/clients/create')) class="active" @endif ><a href="{{ route('clients.create') }}"><i class="fa fa-circle-o"></i>New client</a></li>
                    </ul>
                </li>
            @else
                <li class="{{ (Request::is('admin/bookings')) ? 'active' : '' }}">
                    <a class="{{ (Request::is('admin/bookings')) ? 'active menu-open' : '' }}" href="{{ route('bookings.index') }}"><i class="fa fa-dashboard"></i> <span>My Bookings</span></a>
                </li>
            @endif()
    </section>
</aside>