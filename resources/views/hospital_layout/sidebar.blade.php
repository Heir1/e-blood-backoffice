<!-- start Side Bar to Manage Shop Activities -->
<aside class="main-sidebar">
    <section class="sidebar">
    <ul class="sidebar-menu">
        <li class="treeview {{ request()->is("hospital/hospitaldashboard") ? 'active' : '' }}">
            <a href="{{url("hospital/hospitaldashboard")}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("hospital/prices") || request()->is("hospital/addprice") ? 'active' : '' }}">
            <a href="{{url('hospital/prices')}}">
            <i class="fa fa-money"></i> <span>Prix de produits</span>
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
        <li class="treeview {{ request()->is("hospital/bloodbagsearch") ? 'active' : '' }}">
            <a href="{{url('hospital/bloodbagsearch')}}">
            <i class="fa fa-inbox"></i> <span>Recherche de poche de sang</span>
            </a>
        </li>
        <li class="treeview {{ request()->is("hospital/bloodbagcart") ? 'active' : '' }}">
            <a href="{{url('hospital/bloodbagcart')}}">
            <i class="fa fa-shopping-cart"></i> <span>{{Session::has('cart') ? (Session::get("cart")->totalQty > 1 ? Session::get("cart")->totalQty." poches au panier" : Session::get("cart")->totalQty." poche au panier" ) : "0"}} </span>
            </a>
        </li>
    </ul>
    </section>
</aside>
<!-- end  Side Bar to Manage Shop Activities -->