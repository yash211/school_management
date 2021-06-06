<?php
$semail = $this->session->userdata('email');
//echo $semail;

$your_class_id=$this->db->get_where('etutor_student',array('email'=>$semail,'status' => 1))->row()->class_name;
$this->session->set_userdata('class_code',$your_class_id);
//$class_code = $this->db->get_where('etutor_student', array('email' => $semail, 'status' => 1))->row()->class_name;
//echo $class_code;
$your_classes=$this->db->get_where('etutor_class',array('class_id' => $your_class_id))->row()->class_name;
?>

<p><?php echo $your_classes; ?></p>
<li>
    <a class="nav-link u-header__nav-link" href="<?php echo site_url('home/viewjoinclass'); ?>">Join Class</a>
</li>
<li>
    <a class="nav-link u-header__nav-link" href="<?php echo site_url('home/class_subject'); ?>">Subjects</a>
</li>