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
            <h2><i class="icon-edit"></i><span class="break"></span>New Expense</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="icon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" method="post" action="expense" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="selectError">Expense Category</label>
                        <div class="controls">
                            <select name="exCat" id="selectError" data-rel="chosen">

                                <?php
                                foreach($category as $num => $categoryArray)
                                {
                                    echo '<option value="'.$categoryArray['id'].'">'.$categoryArray['title'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Expense Title</label>
                        <div class="controls">
                            <input name="exTitle" type="text" class="span6 typeahead" placeholder="expense title" required="required">
                            <p class="help-block">e.g <i>HTC phone expense</i></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="appendedPrependedInput">Expense Amount</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <span class="add-on">&pound</span><input id="appendedPrependedInput" name="amount" size="16" type="number" required="required"><span class="add-on">.00</span>
                            </div>
                            <p class="help-block"><i>All amounts are in GBP</i></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Expense Date</label>
                        <div class="controls">
                            <input name="exDate" type="text" class="input-xlarge datepicker" id="date01" value="02/16/12">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>
                        <div class="controls">
                            <input name="exUpload[]" class="input-file uniform_on" id="fileInput" type="file" multiple>
                            <div id="selectedFiles"></div>
                        </div>
                    </div>

                    <script>
                        var selDiv = "";

                        document.addEventListener("DOMContentLoaded", init, false);

                        function init() {
                            document.querySelector('#fileInput').addEventListener('change', handleFileSelect, false);
                            selDiv = document.querySelector("#selectedFiles");
                        }

                        function handleFileSelect(e) {

                            if(!e.target.files || !window.FileReader) return;

                            selDiv.innerHTML = "";
                            var i = 0;
                            var files = e.target.files;
                            var filesArr = Array.prototype.slice.call(files);
                            filesArr.forEach(function(f) {
                                var f = files[i];
                                if(!f.type.match("image.*")) {
                                    return;
                                }

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<img src=\"" + e.target.result + "\">" + f.name + "<br clear=\"left\"/>";
                                    selDiv.innerHTML += html;
                                }
                                reader.readAsDataURL(f);
                                i++;
                            });

                        }
                    </script>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Expense Comment</label>
                        <div class="controls">
                            <textarea name="exComment" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->

<?php include 'footer.php'; ?>