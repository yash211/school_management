<div class="row">
	<div class="form-group">
		<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>

		<div class="col-sm-5">
			<input type="text" class="form-control" name="name[]" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus>
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation'); ?></label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="designation[]" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birthday'); ?></label>

		<div class="col-sm-5">
			<input type="text" class="form-control datepicker" name="birthday[]" value="" data-start-view="2">
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender'); ?></label>

		<div class="col-sm-5">
			<select name="sex" class="form-control selectboxit">
				<option value=""><?php echo get_phrase('select'); ?></option>
				<option value="male"><?php echo get_phrase('male'); ?></option>
				<option value="female"><?php echo get_phrase('female'); ?></option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>

		<div class="col-sm-5">
			<input type="text" class="form-control" name="address[]" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="phone[]" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email') . '/' . get_phrase('username'); ?></label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="email[]" value="" data-validate="required">
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?></label>

		<div class="col-sm-5">
			<input type="password" class="form-control" name="password[]" value="" data-validate="required">
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('about'); ?></label>
		<div class="col-sm-5">
			<div class="input-group">
				<textarea class="form-control" rows="2" name="about[]"></textarea>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('social_links'); ?></label>
		<div class="col-sm-8">
			<div class="input-group">
				<input type="text" class="form-control" name="facebook[]" placeholder="" value="">
				<div class="input-group-addon">
					<a href="#"><i class="entypo-facebook"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('show_on_website'); ?></label>
		<div class="col-sm-5">
			<select name="show_on_website[]" class="form-control selectboxit">
				<option value="1"><?php echo get_phrase('yes'); ?></option>
				<option value="0"><?php echo get_phrase('no'); ?></option>
			</select>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-5">
			<button type="submit" class="btn btn-info"><?php echo get_phrase('add_teacher'); ?></button>
		</div>
	</div>

</div>