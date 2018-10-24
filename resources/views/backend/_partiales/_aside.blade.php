<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/logo.jpg') }}" height="100" width="44" height="44" class="img-circle" style="height: 44px; max-width: 45px;" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucfirst(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Connecter </a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li class="treeview {{ (Request::is('eleves') || Request::is('eleves/create')) ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Etudiants</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('eleves')) class="active" @endif ><a href="{{ route('eleves.index') }}"><i class="fa fa-circle-o"></i>Liste des etudiants</a></li>
                    <li @if(Request::is('eleves/create')) class="active" @endif ><a href="{{ route('eleves.create') }}"><i class="fa fa-circle-o"></i>Nouvel etudiants</a></li>
                </ul>
            </li>

            <li class="treeview {{ (Request::is('enseignants') || Request::is('enseignants/create')) ? 'active menu-open' : '' }}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Enseignanats</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li @if(Request::is('enseignants')) class="active" @endif ><a href="{{ route('enseignants.index') }}"><i class="fa fa-circle-o"></i>Liste des enseignants</a></li>
                    <li @if(Request::is('enseignants/create')) class="active" @endif ><a href="{{ route('enseignants.create') }}"><i class="fa fa-circle-o"></i>Nouvel enseignant</a></li>
                </ul>
            </li>

            <li  class="{{ (Request::is('devoires')) ? 'active' : '' }}">
                <a class="{{ (Request::is('devoires')) ? 'active menu-open' : '' }}" href="{{ route('devoires.index') }}"><i class="fa fa-dashboard"></i> <span>Devoires</span></a>
            </li>

            <li class="{{ (Request::is('examens')) ? 'active' : '' }}">
                <a class="{{ (Request::is('examens')) ? 'active menu-open' : '' }}" href="{{ route('examens.index') }}"><i class="fa fa-dashboard"></i> <span>Examens</span></a>
            </li>

            <li class="{{ (Request::is('absences')) ? 'active' : '' }}">
                <a class="{{ (Request::is('absences')) ? 'active menu-open' : '' }}" href="{{ route('absences.index') }}"><i class="fa fa-dashboard"></i> <span>Absence</span></a>
            </li>
    </section>
</aside>