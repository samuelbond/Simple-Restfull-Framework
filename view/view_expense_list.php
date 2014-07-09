<?php include 'header.php'; ?>
    <style>
        #selectedFiles img {
            max-width: 125px;
            max-height: 125px;
            float: left;
            margin-bottom:10px;
            margin-left:10px;
            border:1px solid #006dcc;
        }
    </style>


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
<i class="icon-attch"></i>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-list"></i><span class="break"></span>Expense Category</h2>
                <div class="box-icon">
                    <a href="expense?new_expense=true" data-rel="tooltip" title="Add new expense" class="btn-setting"><i class="icon-plus"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Expense</th>
                        <th>Amount</th>
                        <th>Files</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Actions <i  href="#" data-rel="tooltip"
                                            title="send your expense via email to your accounts. Send your expense to your email. Delete expense" class="icon-question-sign">
                                            </i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach($expense as $num => $expenseArray)
                    {
                        echo '<tr>
                <td>'.$expenseArray['title'].'</td>
            <td class="center">&pound'.$expenseArray['amount'].'.00</td>
            <td class="center"><a data-rel="tooltip" title="click to view files" href="attachedfiles?expense='.$expenseArray['id'].'"> '.$expenseArray['docs'].' Attached <i class="icon-tags"><i/></a></td>
            <td class="center">'.$expenseArray['comment'].'</td>
            <td class="center">'.$expenseArray['date'].'</td>
            <td class="center">
            <a class="btn btn-success" href="#"  data-rel="tooltip" title="send expense to accounts">
                <i class="icon-envelope icon-white"></i>
            </a>
            <a class="btn btn-success" href="#"  data-rel="tooltip" title="send expense to my email">
                <i class="icon-inbox icon-white"></i>
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