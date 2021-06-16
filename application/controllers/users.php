<?php
class Users extends CI_Controller{
	public function index(){
		$this->load->view("frontend/ultimate/resume_dashboard.php");
	}
    
    function viewform($p=""){
        if($p=="1"){
            $this->load->view('frontend/ultimate/resume_form1.php');
        }
    }

    function rform($p=""){
        //fullname,email,phno,title,websitelink,linkedin,dur,degree,uname,l1,l2,ptitle,pdes
        $page_data['fullname']=$this->input->post('fullname');
        $page_data['email']=html_escape($this->input->post('email'));
        $page_data['phno']=html_escape($this->input->post('phno'));
        $page_data['title']=html_escape($this->input->post('title'));
        $page_data['websitelink']=html_escape($this->input->post('websitelink'));
        $page_data['linkedin']=html_escape($this->input->post('linkedin'));
        $page_data['dur']=html_escape($this->input->post('dur'));
        $page_data['degree']=html_escape($this->input->post('degree'));
        $page_data['ptitle']=html_escape($this->input->post('ptitle'));
        $page_data['pdes']=html_escape($this->input->post('pdes'));
        $page_data['uname']=html_escape($this->input->post('uname'));
        $page_data['l1']=html_escape($this->input->post('l1'));
        $page_data['l2']=html_escape($this->input->post('l2'));
        $page_data['edur']=html_escape($this->input->post('edur'));
        $page_data['etitle']=html_escape($this->input->post('etitle'));
        $page_data['ename']=html_escape($this->input->post('ename'));
        $page_data['edes']=html_escape($this->input->post('edes'));
        $page_data['s1']=html_escape($this->input->post('s1'));
        $page_data['s2']=html_escape($this->input->post('s2'));
        $page_data['s3']=html_escape($this->input->post('s3'));
        $page_data['s4']=html_escape($this->input->post('s4'));
        //print_r($page_data);
        if($p=="1"){
            $this->load->view('frontend/ultimate/resume_temp1.php',$page_data);
        }
    }
}
?>