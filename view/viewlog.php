
<?php include 'header.php'; ?>

<div id="content" class="span10">
<form method="post" action="viewlog">
    <input type="text" name="cd" placeholder="/home/dir" />
    <input type="submit" class="btn-primary" value="View" />
</form>

    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>File Name</th>
            <th>Last Modified</th>
        </tr>
        <tr>
            <?php
            $k = 1;
            foreach($files as $key => $file)
            {
                echo "<tr>  <td>".$k."</td>
                        <td><a href='viewlog?dir=$logdir&read=".$file."&size=".$sizes[$file]."'>".$file."</a></td>
                        <td>".$fileDates[$file]."</td></tr>";
                $k++;
            }
            ?>



    </table>
    <!-- start: Content -->
</div>
</div><!--/span-->

</div>


<!-- end: Content -->



<?php include 'footer.php'; ?>