<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="user-profile dropdown-toggle">
                        <img src="http://placehold.it/50x50" alt="photo">
                        {{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#"><i class="fa fa-sign-out pull-right"></i> Log out </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle info-number">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list">
                        <li>
                            <a href="#">
                                <span class="image">
                                    <img src="http://placehold.it/50x50" alt="profile image">
                                </span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 minutes ago</span>
                                </span>
                                <span class="message">
                                    orem ipsum dolor sit amet, consectetur adipisicing elit.am placeat possimus, quibusdam! Ratione, repudiandae?
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="image">
                                    <img src="http://placehold.it/50x50" alt="profile image">
                                </span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 minutes ago</span>
                                </span>
                                <span class="message">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.am placeat possimus, quibusdam! Ratione, repudiandae?
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>