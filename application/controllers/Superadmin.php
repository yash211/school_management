<?php
class Superadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model('Email_model');
    }

    function index()
    {
        $this->load->view('backend/super_admin/login');
    }

    function dashboard()
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('DashBoard');
        $this->load->view('backend/super_admin/index', $page_data);
    }

    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        //redirect(site_url('superadmin'),'refresh');
        $this->load->view('backend/super_admin/login');
    }

    function sendotp()
    {  
        $data['name'] = html_escape($this->input->post('name'));
        $data['email'] = html_escape($this->input->post('email'));
        //echo $data['email'];
        $query = $this->db->get_where('superadmin_login', array('email' => $data['email']))->num_rows();
        
        if ($query > 0) {
            $otp = rand(11111,99999);
            $this->db->set('otp', $otp);
            $this->db->where('email', $data['email']);
            $this->db->update('superadmin_login');
            $html = "Your otp verification code is " . $otp;
            $this->session->set_userdata('email',$data['email']);
            //smtp_mailer($email,'OTP Verification',$html);
            //$headers = "From : $email";
            $this->Email_model->send_smtp_mail($html, 'Login:OTP',$data['email'],'gupta.yash211@gmail.com');
            $this->load->view('backend/super_admin/checkotp');
        }
    }

    function check_otp()
    {  
        $data['otp'] = html_escape($this->input->post('otp'));
        //echo $data['otp'];
        $email=$this->session->userdata('email');
        $query = $this->db->get_where('superadmin_login', array('email' => $email,'otp' => $data['otp']))->num_rows();
        if ($query > 0) {
            $this->db->set('otp', $data['otp']);
            $this->db->where('email', $email);
            $this->db->update('superadmin_login');
            $this->session->set_userdata('is_login',$email);
            $page_data['page_name']='dashboard';
            $page_data['page_title']='SuperAdmin';
            $this->load->view('backend/super_admin/s_admin',$page_data);
        }else{
            echo "not_exist";
        }
    }
}
