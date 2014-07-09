<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title><?php echo ((isset($headTitle)) ? $headTitle : "Game Client"); ?></title>
    <meta name="description" content="Optimus Dashboard Bootstrap Admin Template.">
    <meta name="author" content="Łukasz Holeczek">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="view/css/bootstrap.css" rel="stylesheet">
    <link href="view/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="view/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="view/css/style-responsive.css" rel="stylesheet">
    <!-- end: CSS -->

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->

</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index"> <span><?php echo ((isset($headTitle)) ? $headTitle : "Game Client"); ?></span></a>

            <!-- start: Header Menu -->
            <div class="btn-group pull-right" >
                <!--
                <a class="btn" href="#">
                    <i class="icon-warning-sign"></i><span class="hidden-phone hidden-tablet"> notifications</span> <span class="label label-important hidden-phone">2</span> <span class="label label-success hidden-phone">11</span>
                </a>
                <a class="btn" href="#">
                    <i class="icon-tasks"></i><span class="hidden-phone hidden-tablet"> tasks</span> <span class="label label-warning hidden-phone">17</span>
                </a>
                <a class="btn" href="#">
                    <i class="icon-envelope"></i><span class="hidden-phone hidden-tablet"> messages</span> <span class="label label-success hidden-phone">9</span>
                </a>
                -->
                <a class="btn" href="settings">
                    <i class="icon-wrench"></i><span class="hidden-phone hidden-tablet"> settings</span>
                </a>

            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<div id="under-header"></div>
<!-- start: Header -->

<div class="container-fluid">
    <div class="row-fluid">


<noscript>
    <div class="alert alert-block span10">
        <h4 class="alert-heading">Warning!</h4>
        <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
</noscript>
