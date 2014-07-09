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
        <h2><i class="icon-list"></i><span class="break"></span>Expense Category</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="icon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
    <tr>
        <th>Expense Category</th>
        <th>Expense Type</th>
        <th>Date Created</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

        <?php
            foreach($category as $num => $categoryArray)
            {
                echo '<tr>
                <td>'.$categoryArray['title'].'</td>
            <td class="center">'.$categoryArray['type'].'</td>
            <td class="center">'.$categoryArray['date'].'</td>
            <td class="center">
            <a class="btn btn-success" href="expensemanager?view_category='.$categoryArray['id'].'">
                <i class="icon-zoom-in icon-white"></i>
            </a>
            <a class="btn btn-info" href="#">
                <i class="icon-edit icon-white"></i>
            </a>
            <a class="btn btn-danger" href="#">
                <i class="icon-trash icon-white"></i>
            </a>
        </td>
    </tr>
    <tr>';
            }
        ?>


    </tbody>
    </table>
    </div>
    </div><!--/span-->

    </div><!--/row-->


<?php include 'footer.php'; ?>