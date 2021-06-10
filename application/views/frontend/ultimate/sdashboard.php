<?php
$etutor_mail = $this->session->userdata('email');
$ecom_name = $this->session->userdata('sname');
//ecommerce courses
$query = $this->db->get_where('ecom_user', array('email' => $ecom_name))->row()->ecom_id;
$e_query = $this->db->get_where('enroll_course', array('user_id' => $query))->num_rows();
//$e_query->result();
//$query=$query->num_rows();

//print_r($e_query);
//ETUTOR 
$tquery = $this->db->get_where('etutor_student', array('email' => $etutor_mail))->row()->class_name;
if ($tquery !='') {
    $tclass = $this->db->get_where('etutor_class', array('class_id' => $tquery))->row()->class_name;
}
?>
<style>
    .ygh {
        padding: 100px;
        margin-right: 100px;
    }
</style>

<div class="container">
    <h2>Welcome,</h2><br>
    <?php
    $query = $this->db->get_where('superuser', array('email' => $ecom_name))->row_array();
    //print_r($query);
    ?>
    <h1 style="colour:red"><?php echo get_phrase($query['firstname']) ?></h1>
    <br><br><br><br>
    <div class="col-md-4">
        <h><?php get_phrase('your course'); ?></h>
        <div class="row">
            <div class="col-md-12">
                <h3>YOUR COURSES</h3>
                <div class="tile-stats tile-green">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="" data-postfix="" data-duration="800" data-delay="0"><?php echo $e_query ?></div>
                    <h2 style="color:red">Enrolled Courses</h2>
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <h3>YOUR E-TUTOR CLASS NAME</h3>
                <div class="tile-stats tile-red">
                    <div class="icon"><i class="entypo-users"></i></div>
                    <div class="num" data-start="0" data-end="" data-postfix="" data-duration="800" data-delay="0"><?php echo $tclass; ?></div>
                    <h2 style="color:green">Enrolled Class</h2>
                </div>

            </div>
        </div>
    </div>
</div>