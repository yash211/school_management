<div class="tab-pane box" id="add" style="padding: 5px">
    <div class="box-content">
        <?php echo form_open(site_url('ecom/content'), array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="description" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>
            <div class="col-sm-5">
                <select name="course_id" id="class_id" class="form-control selectboxit" style="width:100%;">
                    <option value=""><?php echo get_phrase('select_course'); ?></option>
                    <?php
                    //$courses = $this->db->get('courses')->result_array();
                    $con = new mysqli('localhost', 'root', '', 'ecattor');
                    $squery = "SELECT  * FROM `courses` WHERE 1";
                    $r = $con->query($squery);
                    $row=[];
                    echo $courses;
                    ?>
                    <?php while ($row = mysqli_fetch_array($r)) { ?>

                        <option value="<?php echo $row['course_id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group"> <label class="col-sm-3 control-label">File</label>
            <div class="col-sm-5"> <input type="file" name="file_name" class="form-control"> </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <button type="submit" id="submit" class="btn btn-info"><?php echo get_phrase('add_course'); ?></button>
            </div>
        </div>
        </form>
    </div>
</div>