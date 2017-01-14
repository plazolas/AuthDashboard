<?php 
// set PHP session folder
session_save_path(__DIR__.'/sessions');

// changes PHP default session cookie name
if (ini_set('session.name', '_uall') === false) {
    session_name('_uall');
}
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Simple Responsive Dashboard Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Simple Responsive Dashboard Demo">
        <meta name="keywords" content="Simple Responsive Dashboard, non-MVC Responsive Dashboard, mySQLi crud class, jquery ajax demo">
        <meta name="author" content="Oswald Plazola - Independant Consultant">

        <!-- Bootstrap Styles -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" media="screen">
        <!-- Awesome Icons Styles -->
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css" media="screen">
        <!-- Awesome Icons Styles -->
        <link type="text/css" rel="stylesheet" href="css/et-line.css" media="screen">
        <!-- Css Styles -->
        <link type="text/css" rel="stylesheet" href="css/style.css" media="screen">
        <link href="css/login.css" rel='stylesheet' type='text/css' />		

        <!-- Google Font Styles -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat+Subrayada:700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
    </head>
    <body id="custom">
        <div class="animationload">
            <div class="loader">Loading...</div>
        </div>
        <div class="makeborder-top"></div>
        <div class="makeborder-bottom"></div>
        <div class="makeborder-left"></div>
        <div class="makeborder-right"></div>
        <div id="wrapper">
            <div class="container">
                <header id="Home" class="header">
                    <div class="menu-wrapper">
                        <nav id="navigation" class="navbar navbar-default" role="navigation">
                            <div class="navbar-inner">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Simple Dashboard Demo</span>
                                        <i class="fa fa-bars fa-2x"></i>
                                    </button>
                                    <a id="brand" class="navbar-brand" href="https://github.com/plazolas/mySQLi-CRUD-Class"><img src="images/logo2.png" alt="Ozcrud"></a>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right" id="nav">
                                        <li class="current"><a href="#" title="">Home</a></li>
                                        <li><a href="https://github.com/plazolas/mySQLi-CRUD-Class/blob/master/README.md" title="">Documents</a></li>
                                        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { ?>
                                        <li><a href="dashboard.php" title="">Dashboard</a></li>
                                        <?php } else { ?>
                                        <li><a href="login.php" title="">Log In</a></li>
                                        <?php }  ?>
                                    </ul>
                                </div><!-- end navbar-collapse collapse -->
                            </div><!-- nav -->
                        </nav><!-- end navigation -->
                    </div><!-- menu wrapper -->
                </header><!-- end header -->
            </div><!-- end container -->
            <div id="page_header">
                <div id="parallax" class="parallax bgback bg" style="background-image: url('images/5.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
                <div class="container text-center header-part">
                    <div style="color: #fff; font-size: 55px; text-transform: uppercase;">Secured Dashboard <span style="color: #f9ab8b">Made Simple.</span></div>
                    <div class="angle-down">
                        <a href="#Practice_Area">
                            <i class="fa fa-angle-double-down fa-4x wow animated fadeInDown" data-wow-iteration="infinite" ></i>
                        </a>
                    </div>
                </div>
            </div><!-- end page_header -->
            <div class="white-wrapper">
                <div class="container">
                    <div class="tagline makepadding clearfix">
                        <h1>Simple Secured PHP<span> Responsive Dashboard </span> with MySQL.</h1>
                    </div>
                </div>
                <br> 
            </div>
        </div>
  

<div class="copyrights">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="title left">
                    <h5 class="title-footer">Copyrights © <?php echo date('Y'); ?> Free Software Enterprises. No Rights Reserved :)</h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="title right">
                    <h5 class="title-footer">Designed by <a href="https://github.com/plazolas/">Oswald Plazola</a></h5>
                </div>
            </div><!-- end col-lg-4 -->
        </div>
    </div><!-- end container -->
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/rotator.js"></script>

<script type="text/javascript">
                                    $('a').click(function () {
                                        $('html, body').animate({
                                            scrollTop: $($.attr(this, 'href')).offset().top
                                        }, 500);
                                        return false;
                                    });
</script>
<script>
    $(document).ready(function () {
        $("#submit_div").hide();
        $("#agree").prop('checked', false);
        $('#nav').onePageNav();

        $("#agreeButton").click(function () {
                 $("#agree").prop('checked', true);
                 $("#submit_div").show();
        });
        $("#agree").click(function () {
            if (this.checked) {
                   $("#submit_div").show();
               } else {
                   $("#submit_div").hide();
               }
        });
        $("#mysubmit").click(function () {
            if ($('#agree').is(':checked')) {
                   return true;
               } else {
                   alert('You must agree to the Terms and Conditions');
                   return false;
               }
        });
    });
</script>
<script type="text/javascript">$(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });
    $(document).on('click', '.panel div.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });
</script>
<script>
    new WOW().init();
</script>
<script type="text/javascript">
    $(".rotate").textrotator({
        animation: "flip", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
        speed: 3000 // How many milliseconds until the next word show.
    });
</script>
<script type="text/javascript">
    // Close the navbar if collapsed (small screen) when clicking on a menu link
    // From edit 2 on
    // http://stackoverflow.com/questions/14203279/bootstrap-close-responsive-menu-on-click/23171593#23171593
    $(function () {
        $('.navbar-collapse ul li a:not(.dropdown-toggle)').bind('click touchstart', function () {
            $('.navbar-toggle:visible').click();
        });
    });
</script>
</body>
</html>
