<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Ozcrud Auth Simple Crud</title>
	<meta name="description" content="Sample App using Simple MySQLi Crud and PHPAuth classes without framework">
        <meta name="keywords" content="SAmple App using Simple Mysql Crud and PHPAuth package" />
        <meta name="author" content="Oswald Plazola">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="layout-style" href="css/bb_layout.css" rel="stylesheet">
	<link id="base-style" href="css/bb1.css" rel="stylesheet">
        <link id="base-style" href="css/halflings.css" rel="stylesheet">
    
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
        
	<link href="_modules/bootstrap/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="_modules/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico">
    <?php
    
     if (isset($_SESSION['config']['pane']) && $_SESSION['config']['pane'] == '5'){
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
      echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>';
     } else {
      echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>';
      echo '<script src="_modules/bootstrap/bootstrap.min.js"></script>';
      }
    ?>
</head>