<?php include 'header.php'; ?>

<div id="content" class="span10">
    <!-- start: Content -->

    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="#">Attached Files</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="icon-picture"></i> Attached Files</h2>
                <div class="box-icon">
                    <a href="#" id="toggle-fullscreen" class="hidden-phone hidden-tablet"><i class="icon-fullscreen"></i></a>
                    <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="masonry-gallery">

                        <?php

                        foreach($files as $num => $filesArray)
                        {
                            echo '<div id="image-1" class="masonry-thumb">

                            <img class="grayscale" src="'.$filesArray['document'].'" alt="Attached File" />
                            </div>';
                        }

                        ?>



                </div>
            </div>
        </div><!--/span-->

    </div><!--/row-->


<?php include 'footer.php'; ?>