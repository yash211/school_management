<?php
class Ecom extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db1 = $this->load->database('ecom', true);
        $this->load->library('session');
        //$this->load->model('Ecommerce');
    }
    public function index()
    {
        $this->load->view('backend/super_admin/dashboard.php');
    }

    public function createcourse()
    {
        $page_data['page_name'] = 'courses';
        $page_data['page_title'] = 'Add courses';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function createcontent()
    {
        $page_data['page_name'] = 'addcontent';
        $page_data['page_title'] = 'Add course content';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function createtest()
    {
        $page_data['page_name'] = 'addtest';
        $page_data['page_title'] = 'Add Test';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function createquestion()
    {
        $page_data['page_name'] = 'addquestion';
        $page_data['page_title'] = 'Add Question';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function addcourses()
    {
        if ($this->session->userdata('is_login') != 1)
            redirect(site_url('login'), 'refresh');
        //name,desc,status
        $data['name'] = $this->input->post('name');
        //echo $data['name'];
        $data['description'] = $this->input->post('desc');
        //$data['status']=$this->input->post('status');
        $this->db1->insert('courses', $data);
        $this->session->set_flashdata('flash_message', "Data Added Successfully");
        //redirect(base_url('Ecom'),'refresh');
        $page_data['page_name'] = 'courses';
        $page_data['page_title'] = 'Add Courses';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function add_test()
    {
        $data['cname'] = $this->input->post('coursename');
        //$this->Ecommerce->insert_data($data,'test');
        $this->db1->insert('test', $data);
        $this->session->set_flashdata('adding_test', "Test added successfully");
        $page_data['page_name'] = 'addtest';
        $page_data['page_title'] = 'Add test';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function addquestion()
    {
        $data['cqt_name'] = $this->input->post('testname');
        $data['ques'] = $this->input->post('ques');
        $data['ans1'] = $this->input->post('ans1');
        $data['ans2'] = $this->input->post('ans2');
        $data['ans3'] = $this->input->post('ans3');
        $data['ans4'] = $this->input->post('ans4');
        $data['cans'] = $this->input->post('cans');
        //echo $data['ques'];
        $this->db1->insert_data('question', $data);
        $this->session->set_flashdata('adding_ques', "Question added successfully");
        $page_data['page_name'] = 'addquestion';
        $page_data['page_title'] = 'Add Question';
        $this->load->view('backend/super_admin/s_admin', $page_data);
    }

    public function content()
    {
        $data['course_id']    = $this->input->post('course_id');
        if ($this->input->post('description') != null) {
            $data['description'] = html_escape($this->input->post('description'));
        }
        if (!empty($_FILES["file_name"]["name"])) {
            $data['file_name'] = $_FILES["file_name"]["name"];
        }

        $this->db1->insert('content', $data);

        if (!empty($_FILES["file_name"]["name"])) {
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
        }

        $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        $this->createcontent();
    }

}
