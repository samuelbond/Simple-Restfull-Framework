
<?php include 'header.php'; ?>

<div id="content" class="span10">

    <form action="clientInterface" method="post">
        <label>Player Login</label>
        <input type="text" name="pl" />
        <br />
        <label>Player Pass</label>
        <input type="text" name="pp" />
        <br />
        <label>Secret Key</label>
        <input type="text" name="sk" />
        <br />
        <label>Operator</label>
        <input type="text" name="op" />
        <input name="getsession" type="hidden" />
        <br />
        <input type="submit" value="Get Session" />
    </form>
<!-- start: Content -->
</div>
    </div><!--/span-->

</div>


<!-- end: Content -->



    <?php include 'footer.php'; ?>