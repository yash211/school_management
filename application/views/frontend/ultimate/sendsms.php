
<form id="contact-form" method="post" action="<?php echo site_url('home/send_sms');?>" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Enter Your Number</label>
                    <input id="form_name" type="number" name="from" class="form-control" placeholder="Please enter your mobile number *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Enter SMS receiver Mobile Number</label>
                    <input id="form_lastname" type="number" name="to" class="form-control" placeholder="" required="required" data-error="Lastname is required.">
                    <small>Add Country Code with "+" as  prefix</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
            </div>
        </div>
    </div>

</form>