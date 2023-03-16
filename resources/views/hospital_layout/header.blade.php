<!-- start header  -->
<header class="main-header">
    <a href="index.php" class="logo">
    <span class="logo-lg">E-Blood Bank Makila</span>
    </a>
    <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Panneau d'administrateur</span>
    <!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('frontend/assets/uploads/user-1.png')}}" class="user-image" alt="User Image" style="border : 2px solid white ">
                <span class="hidden-xs">{{Session::get("hospital")->hospital_name}}</span>
                </a>
                <ul class="dropdown-menu">
                <li class="user-footer">
                    <div>
                        <a href="{{ url('hospital/editprofile', [Session::get("hospital")->id]) }}" class="btn btn-default btn-flat">Edit Profile</a>
                    </div>
                    <div>
                        <a href="{{ url('hospital/hospitallogout', []) }}" class="btn btn-default btn-flat">Log out</a>
                    </div>
                </li>
                </ul>
            </li>
        </ul>
    </div>
    </nav>
</header>
<!-- end header  -->