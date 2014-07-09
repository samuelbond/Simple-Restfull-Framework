</div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="clearfix"></div>
<hr>

<footer>
    <p class="pull-left">&copy; <a href="" target="_blank"></a> 2014. All Rights Reserved</p>
</footer>

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

<?php
if(isset($expense)){
    $size = sizeof($expense);
    $k = 1;
    echo "<script>$('#main_calendar').fullCalendar({
        header: {
        left: 'title',
            right: 'prev,next today,month,agendaWeek,agendaDay'
        },
        editable: true,";
    foreach($expense as $num => $expenseArray)
    {
        list($month,$day, $year) = explode("/",$expenseArray['date']);
        echo "
        events: [
            {
                title: '".$expenseArray['title']."',
                start: new Date(".$year.", ".$month.", ".$day.")
            }".(($k === $size) ? "" : ",")."

        ";

        $k++;
    }

    echo "]
    });
    </script>";
}
?>

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
