<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title">
            <a href="#" class="site_title"><span>Dashboard</span></a>
        </div>
        <div class="clearfix"></div>
        <div class="profile">
            <div class="profile_pic">
                <img src="http://placehold.it/50x50" alt="photo" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li class="{{ \Request::route()->getName() == 'admin.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.index')  }}">
                            <i class="fa fa-home"></i> Home
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="{{ str_contains(\Request::route()->getName(), 'users') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index')  }}">
                            <i class="fa fa-users"></i> Users
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-video-camera"></i> Videos
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-envelope-o"></i> Messages
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-clone"></i> Pages
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-ticket"></i> Banners
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-home"></i> Settings
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>