<?php echo form_open(site_url('etutor/manageclasses'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class'); ?></label>

    <div class="col-sm-5">
        <select name="class" class="form-control" data-validate="required" id="class_id" data-message-required="<?php echo get_phrase('value_required'); ?>">
            <option value=""><?php echo get_phrase('select'); ?></option>
            <?php
            $classes = $this->db->get('etutor_class')->result_array();
            foreach ($classes as $row) :
            ?>
                <option value="<?php echo $row['class_name']; ?>">
                    <?php echo $row['class_name']; ?>
                </option>
            <?php
            endforeach;
            ?>
        </select>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="save">
            Send Code
        </button>
    </div>
</div>