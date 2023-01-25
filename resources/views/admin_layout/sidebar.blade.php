<!-- start Side Bar to Manage Shop Activities -->
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu">
        <li class="treeview {{ request()->is("admin") ? 'active' : '' }}">
            <a href="{{url("admin")}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("admin/settings") ? 'active' : '' }}">
            <a href="{{url("admin/settings")}}">
            <i class="fa fa-sliders"></i> <span>Website Settings</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("admin/hopitaux") || request()->is("admin/ajouterhopital") ? 'active' : '' }}">
            <a href="{{url('admin/hopitaux')}}">
            <i class="fa fa-hospital-o"></i><i class="fas fa-hospital"></i> <span>Hopitaux</span>
            </a>
        </li>
    </ul>
    </section>
</aside>
<!-- end  Side Bar to Manage Shop Activities -->