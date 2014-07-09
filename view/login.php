<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Login</title>

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
<div class="container-fluid">
    <div class="row-fluid">
        <?php if(isset($error))
        {
            echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            if(sizeof($error) > 0)
            {
                foreach($error as $message)
                {
                    echo $message."<br />";
                }
            }
            echo '</div>';
        } ?>
        <?php if(isset($msg))
        {
            echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            if(sizeof($msg) > 0)
            {
                foreach($msg as $message)
                {
                    echo $message."<br />";
                }
            }
            echo '</div>';
        } ?>

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index"><i class="icon-home"></i></a>
                    <a href="#"><i class="icon-cog"></i></a>
                </div>
                <h2>Login to your account</h2>
                <form class="form-horizontal" action="account" method="post">
                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input class="input-large span10" name="email" id="username" type="text" placeholder="type email"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                        <div class="btn-group button-login">
                            <button type="submit" class="btn btn-primary"><i class="icon-off icon-white"></i></button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->

    </div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- start: JavaScript-->


<script src="view/js/jquery-1.9.1.min.js"></script>
<script src="view/js/jquery-migrate-1.0.0.min.js"></script>
<script src="view/js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="view/js/bootstrap.js"></script>

<script src="view/js/jquery.cookie.js"></script>

<script src='view/js/fullcalendar.min.js'></script>

<script src='view/js/jquery.dataTables.min.js'></script>

<script src="view/js/excanvas.js"></script>
<script src="view/js/jquery.flot.min.js"></script>
<script src="view/js/jquery.flot.pie.min.js"></script>
<script src="view/js/jquery.flot.stack.js"></script>
<script src="view/js/jquery.flot.resize.min.js"></script>

<script src="view/js/jquery.chosen.min.js"></script>

<script src="view/js/jquery.uniform.min.js"></script>

<script src="view/js/jquery.cleditor.min.js"></script>

<script src="view/js/jquery.noty.js"></script>

<script src="view/js/jquery.elfinder.min.js"></script>

<script src="view/js/jquery.raty.min.js"></script>

<script src="view/js/jquery.iphone.toggle.js"></script>

<script src="view/js/jquery.uploadify-3.1.min.js"></script>

<script src="view/js/jquery.gritter.min.js"></script>

<script src="view/js/jquery.imagesloaded.js"></script>

<script src="view/js/jquery.masonry.min.js"></script>

<script src="view/js/custom.js"></script>

<!--
<script type="text/javascript" language="JavaScript">

    function message_welcome1(){
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome on Optimus Dashboard',
            // (string | mandatory) the text inside the notification
            text: 'I hope you like this template',
            // (string | optional) the image to display on the left
            image: 'img/avatar.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
    }

    function message_welcome2(){
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Optimus is Amazing Theme',
            // (string | mandatory) the text inside the notification
            text: 'Optimus works on all devices, computers, tablets and smartphones. Optimus has lots of great features. Try It!',
            // (string | optional) the image to display on the left
            image: 'img/avatar.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
    }

    function message_welcome3(){
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Buy Optimus!',
            // (string | mandatory) the text inside the notification
            text: 'This great template can be yours today.',
            // (string | optional) the image to display on the left
            image: 'img/avatar.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'gritter-light'
        });
    }

    $(document).ready(function(){

        setTimeout("message_welcome1()",5000);
        setTimeout("message_welcome2()",10000);
        setTimeout("message_welcome3()",15000);
        setInterval(f_visits, 100);
        setInterval(f_members, 2000);
        setInterval(f_income, 5000);
        setInterval(f_sales, 5000);
        setInterval(live_notifications_center, 5000);

    });
</script>
-->
<!-- end: JavaScript-->

</body>
</html>