<style type="text/css" media="screen">
	.red {
        color: #f44336;
    }
</style>

<div class="form-group">
    <label class="col-sm-3 control-label"><?php echo get_phrase('question_title');?></label>
    <div class="col-sm-8">
        <textarea onkeyup="changeTheBlankColor()" name="question_title" class="form-control" id="question_title" rows="8" cols="80" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"></textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('add_question');?></button>
    </div>
</div>
<?php echo form_close();?>

<script type="text/javascript">
	function changeTheBlankColor() {
        var alpha = ["^"];
        var res = "", cls = "";
        var t = jQuery("#question_title").val();

        for (i=0; i<t.length; i++) {
            for (j=0; j<alpha.length; j++) {
                if (t[i] == alpha[j])
                {
                    cls = "red";
                }
            }
            if (t[i] === "^") {
                res += "<span class='"+cls+"'>"+'__'+"</span>";
            }
            else{
                res += "<span class='"+cls+"'>"+t[i]+"</span>";
            }
            cls="";
        }
        jQuery("#preview").html(res);
    }
</script>