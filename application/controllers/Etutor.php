<?php

class Etutor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(array('Ajaxdataload_model' => 'ajaxload'));
        //$this->load->model('email_model');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    /***default functin, redirects to login page if no teacher logged in yet***/
    public function index()
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('etutor_login') == 1)
            redirect(site_url('etutor/dashboard'), 'refresh');
    }

    /***TEACHER DASHBOARD***/
    public function dashboard()
    {
        //echo $this->session->userdata('etut_login');
        if ($this->session->userdata('is_login') =="")
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('etutor_dashboard');
        //$this->load->view('backend/index', $page_data);
        $this->load->view('backend/super_admin/etutor/dashboard.php');
    }

    public function viewclasses()
    {
        if ($this->session->userdata('is_login') =="")
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'add_class';
        $page_data['page_title'] = get_phrase('add class');
        $this->load->view('backend/super_admin/etutor/add_class', $page_data);
    }

    public function addclass($param = "")
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');
        if ($param == "create") {
            $data['class_name'] = $this->input->post('name');
            $data['class_code'] = $this->input->post('code');
            $this->db->insert('etutor_class', $data);
            $this->session->set_flashdata('flash_message', get_phrase("Data Added Succesfully"));
            //$this->load->view('backend/etutor/add_class');
        }
        $page_data['page_name']  = 'add_class';
        $page_data['page_title'] = get_phrase('add class');
        $this->load->view('backend/super_admin/etutor/add_class');
    }

    function viewstudents()
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'student_add';
        $page_data['page_title'] = get_phrase('Add Students');
        $this->load->view('backend/super_admin/etutor/student_add');
    }

    function student($param1 = '')
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');


        if ($param1 == 'create') {
            $data['name']         = html_escape($this->input->post('name'));
            $data['email']        = html_escape($this->input->post('email'));
            $data['password']     = sha1($this->input->post('password'));
            $data['class_name']   = html_escape($this->input->post('class'));

            $this->db->insert('etutor_student', $data);

            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            $this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
        } else {
            $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
        }
        //$this->load->view('backend/etutor/student_add');
        $page_data['page_name']  = 'student_add';
        $page_data['page_title'] = get_phrase('Add Students');
        $this->load->view('backend/super_admin/etutor/student_add');

        if ($param1 == 'do_update') {
            $data['name']           = html_escape($this->input->post('name'));
            $data['email']          = html_escape($this->input->post('email'));
            //$data['parent_id']      = $this->input->post('parent_id');
        }
    }

    function viewmanageclass()
    {
        //$this->load->view('backend/etutor/manage_class');
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'manage_class';
        $page_data['page_title'] = get_phrase('manage class');
        $this->load->view('backend/super_admin/etutor/manage_class');
    }

    function manageclasses()
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');
        $data['class_name'] = $this->input->post('class');
        //$class_code=$this->db->get_where('etutor_class',array("class_name",$data['class_name']))->row('class_code');
        $this->email_model->send_code($data['class_name']);
        //$this->load->view('backend/etutor/dashboard');
        $page_data['page_name']  = 'manage_class';
        $page_data['page_title'] = get_phrase('manage class');
        $this->load->view('backend/super_admin/etutor/manage_class.php');
    }

    function viewsubject()
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');
        $page_data['page_name']  = 'subject_add';
        $page_data['page_title'] = get_phrase('manage subject');
        $this->load->view('backend/super_admin/etutor/subject_add');
    }

    function addsubjects()
    {
        if ($this->session->userdata('is_login') == "")
            redirect(site_url('login'), 'refresh');

        $data['name']        = html_escape($this->input->post('name'));
        $data['class_name']    = $this->input->post('class');
        if ($this->input->post('desc') != null) {
            $data['description'] = html_escape($this->input->post('desc'));
        }
        if (!empty($_FILES["file_name"]["name"])) {
            $data['file_name'] = $_FILES["file_name"]["name"];
        }

        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);

        $this->db->insert('etutor_subject', $data);
        $this->session->set_flashdata('add_subject',get_phrase('Subject_Added_Successfully'));
        $page_data['page_name']  = 'subject_add';
        $page_data['page_title'] = get_phrase('manage subject');
        $this->load->view('backend/super_admin/etutor/subject_add', $page_data);
    }

    function profile(){
        $this->load->view('backend/super_admin/etutor/profile');
    }

    function deletestudent($id){
        $this->db->where('student_id',$id);
        $this->db->delete('etutor_student');
        $this->session->set_flashdata('delete_student',"Student Deleted");
        $this->profile();
    }
}
