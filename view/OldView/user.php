
<?php include 'header.php'; ?>

<?php if(isset($response))
{
    echo $response;
}

?>

<div id="content" class="span10">

    <form action="user" method="post">
        <label>First Name</label>
        <input type="text" name="fname" />
        <br />
        <label>Last Name</label>
        <input type="text" name="lname" />
        <br />
        <label>Username</label>
        <input type="text" name="user" />
        <br />
        <label>Password</label>
        <input type="password" name="password" />
        <br />
        <label>Street</label>
        <input type="text" name="street" />
        <br />
        <label>Post Code</label>
        <input type="text" name="postcode" />
        <br />
        <label>City</label>
        <input type="text" name="city" />
        <br />
        <label>Country</label>
        <input type="text" name="country" />
        <br />
        <label>Phone 1</label>
        <input type="text" name="phone1" />
        <br />
        <label>Phone 2</label>
        <input type="text" name="phone2" />
        <br />
        <input type="submit" value="New User" />
    </form>
    <!-- start: Content -->
</div>
</div><!--/span-->

</div>


<!-- end: Content -->



<?php include 'footer.php'; ?>