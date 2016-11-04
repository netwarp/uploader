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
                    <li class="{{ $menu_active == 'home' ? 'active' : '' }}">
                        <a href="{{ route('admin.index')  }}">
                            <i class="fa fa-home"></i> Home
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li class="{{ $menu_active == 'users' ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index')  }}">
                            <i class="fa fa-users"></i> Users
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li class="{{ $menu_active == 'videos' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-video-camera"></i> Videos
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.videos.index') }}">Online</a></li>
                            <li><a href="{{ route('admin.validations.index') }}">Wait for validation</a></li>
                        </ul>
                    </li>
                    <li class="{{ $menu_active == 'tags' ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa fa-tags"></i> Tags
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.tags.index') }}">All Tags</a></li>
                        </ul>
                    </li>
                    <li class="{{ $menu_active == 'messages' ? 'active' : '' }}">
                        <a href="{{ route('admin.messages.index') }}">
                            <i class="fa fa-envelope-o"></i> Messages
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li class="{{ $menu_active == 'pages' ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="fa fa-clone"></i> Pages
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li class="{{ $menu_active == 'menu' ? 'active' : '' }}">
                        <a href="{{ route('admin.menu.index') }}">
                            <i class="fa fa-clone"></i> Menu
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-ticket"></i> Banners
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                    <li class="{{ $menu_active == 'settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.settings.index') }}">
                            <i class="fa fa-gears"></i> Settings
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>