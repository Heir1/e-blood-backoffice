<!-- start Side Bar to Manage Shop Activities -->
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu">
        <li class="treeview {{ request()->is("hospital/hospitaldashboard") ? 'active' : '' }}">
            <a href="{{url("hospital/hospitaldashboard")}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("hospital/stocks") || request()->is("hospital/addstock") ? 'active' : '' }}">
            <a href="{{url('hospital/stocks')}}">
            <i class="fa fa-inbox"></i> <span>Stocks</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("hospital/stocktrace") ? 'active' : '' }}">
            <a href="{{url('hospital/stocktrace')}}">
            <i class="fa fa-inbox"></i> <span>Trace de Stocks</span>
            </a>
        </li>
    </ul>
    </section>
</aside>
<!-- end  Side Bar to Manage Shop Activities -->