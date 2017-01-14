 		
<div id="sidebar-left" class="span2">
    <nav class="nav-collapse sidebar-nav" role="navigation">
        <div class="navbar-dropdown" id="my-left-nav-bar">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="dashboard.php">
                    <i class="halflings-icon white dashboard"></i>
                    <span class="hidden-tablet">Dashboard</span>
                </a></li>
            <?php if ($_SESSION['role'] != 'practice') { ?>
                <li><a href="practices.php">
                        <i class="halflings-icon white briefcase"></i>
                        <span class="hidden-tablet">Learning Centers</span>
                    </a></li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
            <li>
                <a href="quizes.php">
                    <i class="halflings-icon white certificate"></i>
                    <span class="hidden-tablet">Certifications</span>
                </a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['role'] != 'admin') { ?>
            <li>
                <a href="_qualquiz.php">
                    <i class="halflings-icon white certificate"></i>
                    <span class="hidden-tablet">Certification Quiz</span>
                </a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['role'] == 'admin') { ?>
                <li><a href="users.php">
                        <i class="halflings-icon white user"></i>
                        <span class="hidden-tablet">User Manager</span>
                    </a></li>
            <?php } ?>
            <li><a href="index.php">
                    <i class="halflings-icon white home"></i>
                    <span class="hidden-tablet">Home</span>
                </a></li>
            </ul>
        </div>
    </nav>
</div>