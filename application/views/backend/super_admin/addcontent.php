<?php $this->session->flashdata('flash_message') ?>
<div class="tab-pane box" id="add" style="padding: 5px">
    <div class="box-content">
        <?php echo form_open(site_url('ecom/content'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
        <?php
        $con = new mysqli('localhost', 'root', '', 'ecattor');
        $squery = "SELECT  * FROM `courses` WHERE 1";
        $r = $con->query($squery);
        $row1 = [];
        //$row1 = mysqli_fetch_array($r);
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Courses</label>
            <select name="course_id" class=" col-sm-5">
                <option value="">SELECT</option>
                <?php while ($row1 = mysqli_fetch_array($r)) { ?>

                    <option  value="<?php echo $row1['course_id']; ?>"><?php echo $row1['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div id="addmore">
            <div class="form-group"> <label class="col-sm-3 control-label">Module Name</label>
                <div class="col-sm-5"> <input type="text" name="mname" class="form-control"> </div>
            </div>
            <div class="form-group"> <label class="col-sm-3 control-label">Video Links</label>
                <div class="col-sm-5"> <input type="text" name="vlink" class="form-control"> </div>
            </div>
            
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" id="submit" class="btn btn-info"><?php echo get_phrase('add_course'); ?></button>
            </div>
        </div>
        </form>
    </div>
</div>

<!--<script>
    $(function() {
        $("#add").click(function(e) {
            e.preventDefault();
            //$("#addmore1").append("<li>&nbsp;</li>");
            $("#addmore").append('<div class="form-group"> <label class="col-sm-3 control-label">Module Name</label>' +
                '<div class="col-sm-5"> <input type="text" name="mname[]" class="form-control"> </div>' +
                '</div>' +
                '<div class="form-group"> <label class="col-sm-3 control-label">Video Links</label>' +
                '<div class="col-sm-5"> <input type="text" name="vlink[]" class="form-control"> </div>' +
                '</div>');
            //$("#addmore1").append('<li><div class="form-group"> <label class="col-sm-3 control-label"> ' + Video,Link + ' </label><div class="col-sm-5"> <input type="text" name="vlink[]" class="form-control"> </div></div></li>');
        });
    });
</script>-->