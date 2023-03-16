<!-- start Side Bar to Manage Shop Activities -->
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu">
        <li class="treeview {{ request()->is("admin/dashboard") ? 'active' : '' }}">
            <a href="{{url("admin/dashboard")}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
            <i class="fa fa-sliders"></i> <span>Website Settings</span>
            </a>
        </li>
        {{-- <li class="treeview {{ request()->is("admin/settings") ? 'active' : '' }}">
            <a href="{{url("admin/settings")}}">
            <i class="fa fa-sliders"></i> <span>Website Settings</span>
            </a>
        </li> --}}
        <li class="treeview {{ request()->is("admin/hospitals") || request()->is("admin/addhospital") ? 'active' : '' }}">
            <a href="{{url('admin/hospitals')}}">
            <i class="fa fa-hospital-o"></i> <span>Hopitaux</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("admin/volume") || request()->is("volume") ? 'active' : '' }}">
            <a href="{{url('admin/volume')}}">
            <i class="fa fa-get-pocket"></i> <span>Volumes de sangs</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("admin/bloodbags") || request()->is("admin/addbloodbag") ? 'active' : '' }}">
            <a href="{{url('admin/bloodbags')}}">
            <i class="fa fa-get-pocket"></i> <span>Poches de sang</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("admin/stocks") || request()->is("admin/addstock") ? 'active' : '' }}">
            <a href="{{url('admin/stocks')}}">
            <i class="fa fa-inbox"></i> <span>Stocks</span>
            </a>
        </li>
        {{-- <li class="treeview {{ request()->is("admin/stocktrace") ? 'active' : '' }}">
            <a href="{{url('admin/stocktrace')}}">
            <i class="fa fa-inbox"></i> <span>Trace de Stocks</span>
            </a>
        </li> --}}
        <li class="treeview {{ request()->is("admin/bloodgiftprogram") ? 'active' : '' }}">
            <a href="{{url('admin/bloodgiftprogram')}}">
            <i class="fa fa-gift"></i> <span>Programme de dons de sang</span>
            </a>
        </li>
    </ul>
    </section>
</aside>
<!-- end  Side Bar to Manage Shop Activities -->
<style>
    .main-sidebar{
        background-color: #3a0505 !important;
    }
</style>