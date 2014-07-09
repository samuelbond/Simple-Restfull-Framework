<?php include 'header.php'; ?>

    <div id="content" class="span10">
        <!-- start: Content -->

        <div>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">Expense</a>
                </li>
            </ul>
        </div>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="icon-edit"></i><span class="break"></span>Expense Category</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="expense" method="post">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="selectError">Expense Category Type</label>
                                <div class="controls">
                                    <select name="cType" id="selectError" data-rel="chosen">


                                        <?php
                                            foreach($types as $num => $typearray)
                                            {
                                                echo '<option value="'.$typearray['id'].'">'.$typearray['title'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeahead">Category Title</label>
                                <div class="controls">
                                    <input type="text" name="cTitle" class="span6 typeahead" placeholder="category title" '>
                                    <p class="help-block">e.g <i>My April 3rd Week Expense</i></p>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <button type="reset" class="btn">Cancel</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div><!--/span-->

        </div><!--/row-->

<?php include 'footer.php'; ?>