<header class="navbar" style="margin-bottom: 0px;z-index: 999">
    <div class="navbar-inner" style="background: #f26236;">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="dashboard.php"><span>Learning Centers Management Application</span></a>
            <!-- start: [TOP NAV] -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <!-- start: Notifications Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> <?php echo $_SESSION['name']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                            </li>
                            <li>&nbsp;</li>
                            <li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li><h5><span style="color: white"><?php echo $_SESSION['role']; ?></span></h5></li>
                </ul>
            </div>
        </div>
    </div>
</header>