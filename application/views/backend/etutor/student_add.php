<div class="row">
<?php if ($this->session->flashdata('flash_message')) { ?>
    toastr.success("<?php echo $this->session->flashdata('flash_message'); ?>");
<?php } ?>
    <div class="col-md-8">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Students_form'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('etutor/student/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>

                    <div class="col-sm-5">
                        <select name="class" class="form-control" data-validate="required" id="class_id" data-message-required="<?php echo get_phrase('value_required'); ?>">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $classes = $this->db->get('etutor_class')->result_array();
                            foreach ($classes as $row) :
                            ?>
                                <option value="<?php echo $row['class_id']; ?>">
                                    <?php echo $row['class_name']; ?>
                                </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email') . '/' . get_phrase('username'); ?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?></label>

                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('add_student'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <blockquote class="blockquote-blue">
            <p>
                <strong>Student Admission Notes</strong>
            </p>
            <p>
                Admitting new students will automatically create an enrollment to the selected class in the running session.
                Please check and recheck the informations you have inserted because once you admit new student, you won't be able
                to edit his/her class,roll,section without promoting to the next session.
            </p>
        </blockquote>
    </div>

</div>