
<?php include 'header.php'; ?>

<?php if(isset($response))
{
    echo $response;
}

?>

<div class="main">

<div class="main-inner">

<div class="container">

<div class="row">

<div class="span12">

<div class="widget ">

<div class="widget-header">
    <i class="icon-user"></i>
    <h3>New User Account</h3>
</div> <!-- /widget-header -->

<div class="widget-content">

<div class="tabbable">
<ul class="nav nav-tabs">
    <li class="active" >
        <a href="#formcontrols" data-toggle="tab">Form Controls</a>
    </li>
</ul>

<br>

<div class="tab-content">
    <form action="user" method="post" class="form-horizontal">
        <fieldset>
        <div class="control-group">
            <label class="control-label" for="firstname">First Name</label>
            <div class="controls">
                <input type="text" class="span6" name="fname" id="firstname" placeholder="John">
            </div> <!-- /controls -->
        </div> <!-- /control-group -->
        <div class="control-group">
            <label class="control-label" for="lastname">Last Name</label>
            <div class="controls">
                <input type="text" class="span6" name="lname" id="lastname" placeholder="Doe">
            </div> <!-- /controls -->
        </div> <!-- /control-group -->
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <input type="text" class="span6" name="user" id="username" placeholder="John">
            </div> <!-- /controls -->
        </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" class="span6" name="password" id="password" >
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="street">Street</label>
                <div class="controls">
                    <input type="text" class="span6" name="street" id="street" placeholder="131 Barking">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="pcode">Post Code</label>
                <div class="controls">
                    <input type="text" class="span6" name="postcode" id="pcode" placeholder="EC1 9TG">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="city">City</label>
                <div class="controls">
                    <input type="text" class="span6" name="city" id="city" placeholder="London">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="country">Country</label>
                <div class="controls">
                    <input type="text" class="span6" name="country" id="country" placeholder="United Kingdom">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="phone1">Phone1</label>
                <div class="controls">
                    <input type="tel" class="span6" name="phone1" id="phone1" placeholder="0785489521">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->
            <div class="control-group">
                <label class="control-label" for="phone2">Phone2</label>
                <div class="controls">
                    <input type="tel" class="span6" name="phone2" id="phone" placeholder="0785489521">
                </div> <!-- /controls -->
            </div> <!-- /control-group -->

            <div class="form-actions">
                <input type="submit" value="Add New User" class="btn btn-primary" />
            </div> <!-- /form-actions -->
        </fieldset>
    </form>

</div>




    <!-- start: Content -->
</div>
</div><!--/span-->

</div>


<!-- end: Content -->



<?php include 'footer.php'; ?>