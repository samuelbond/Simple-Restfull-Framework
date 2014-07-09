<?php include 'header.php'; ?>


<div id="content" class="span10">
    <!-- start: Content -->

    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="#">Settings</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <?php if(isset($error))
        {
            echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                    echo $error."<br /></div>";
        } ?>
        <?php if(isset($msg))
        {
            echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                    echo $msg."<br /></div>";
        } ?>
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-edit"></i><span class="break"></span>Settings</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="settings">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="selectError">Company Name</label>
                            <div class="controls">
                                <input name="cName" type="text" class="span6 typeahead" placeholder="example company limited" value="<?php echo $userData['companyName']; ?>" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Company Address</label>
                            <div class="controls">
                                <input name="cAddress" type="text" class="span6 typeahead" placeholder="15 Baker Street, EC3 7YT, London" value="<?php echo $userData['companyAddress']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="span6 typeahead">Full Name</label>
                            <div class="controls">
                                <input name="name" type="text" class="span6 typeahead" value="<?php echo $_SESSION['userName']; ?>" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Accounts Email</label>
                            <div class="controls">
                                <input name="accounts" type="email" class="span6 typeahead" placeholder="accounts@myaccountant.com" value="<?php echo $userData['account']; ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Email</label>
                            <div class="controls">
                                <input name="myemail" type="email" class="span6 typeahead" value="<?php echo $_SESSION['userEmail']; ?>" >
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
            <div class="box-header" data-original-title>
                <h2><i class="icon-edit"></i><span class="break"></span>Update Password</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" name="passwordForm" method="post" action="settings">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="selectError">New Password</label>
                            <div class="controls">
                                <input name="password" type="password" class="span6 typeahead"  >
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

<?php include 'footer.php'; ?>