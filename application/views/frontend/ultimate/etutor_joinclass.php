<p>Please enter the class code sent through email</p>
<?php echo form_open(site_url('home/join_class'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
<div class="modal-body">
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
        <label class="col-sm-2 control-label">Class Code</label>
        <div class="col-sm-6">
            <input class="form-control" name="code" placeholder="Enter Class Code" required />
        </div>
    </div>
</div>

<!-- Modal Footer -->
<div class="modal-footer">
    <button type="submit" class="btn btn-primary" name="save">
        Join Class
    </button>
</div>