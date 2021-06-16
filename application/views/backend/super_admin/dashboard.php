<!DOCTYPE html>
<html>
<head>

	<title><?php echo $page_title;?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<hr>
<?php 
   $admins=$this->db->count_all('admin');
   $institutes=$this->db->count_all('')
?>
<div class="row-md-12">
    <div class="col-md-12">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="fa fa-group"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('student'); ?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $this->db->count_all('student'); ?></div>

            <h3><?php echo get_phrase('student'); ?></h3>
            <p>Total students</p>
        </div>

    </div>
    <div class="col-md-12">

        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-user"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('etutor'); ?>" data-postfix="" data-duration="500" data-delay="0"><?php echo $this->db->count_all('etutor'); ?></div>

            <h3><?php echo get_phrase('Etutor'); ?></h3>
            <p>Total Etutor Teachers</p>
        </div>

    </div>
    <div class="col-md-12">

        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-user"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('librarian'); ?>" data-postfix="" data-duration="500" data-delay="0"><?php echo $this->db->count_all('librarian'); ?></div>

            <h3><?php echo get_phrase('librarains'); ?></h3>
            <p>Total Librarians</p>
        </div>

    </div>
    <div class="col-md-12">

        <div class="tile-stats tile-orange">
            <div class="icon"><i class="entypo-user"></i></div>
            <div class="num" data-start="0" data-end="<?php echo $this->db->count_all('librarian'); ?>" data-postfix="" data-duration="500" data-delay="0"><?php echo $this->db->count_all('parent'); ?></div>

            <h3><?php echo get_phrase('parent'); ?></h3>
            <p>Total Parents</p>
        </div>

    </div>

</div>
</html>