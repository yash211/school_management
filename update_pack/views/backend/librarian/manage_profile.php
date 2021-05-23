<hr />
<div class="row">
    <div class="col-md-12">
    
        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
                    <?php echo get_phrase('manage_profile');?>
                </a>
            </li>
        </ul>
        <!------CONTROL TABS END------>
        
    
        <div class="tab-content">
        <br>
            <!----EDITING FORM STARTS---->
            <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
                    <?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(site_url('librarian/manage_profile/update_profile_info'), array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email').'/'.get_phrase('username');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" required/>
                                </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile');?></button>
                              </div>
                                </div>
                        </form>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!----EDITING FORM ENDS-->
            
        </div>
    </div>
</div>

<br>

<!--password-->
<div class="row">
    <div class="col-md-12">
    
        <ul class="nav nav-tabs bordered">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                    <?php echo get_phrase('change_password');?>
                        </a></li>
        </ul>
        
    
        <div class="tab-content">
        <br>
            <div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
                    <?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(site_url('librarian/manage_profile/change_password') , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('current_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('new_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="new_password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('confirm_new_password');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_new_password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile');?></button>
                              </div>
                                </div>
                        </form>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>