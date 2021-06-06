<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 *  @author   : Creativeitem
 *  date      : April, 2019
 *  Ekattor School Management System
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */
class Home extends CI_Controller
{

  protected $theme;

  // constructor
  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('Crud_model');
    $this->theme = $this->frontend_model->get_frontend_general_settings('theme');
  }

  // default function
  public function index()
  {
    $page_data['page_name']  = 'home';
    $page_data['page_title'] = get_phrase('home');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  // noticeboard
  function noticeboard()
  {
    $count_notice = $this->db->get_where('noticeboard', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_notice, 9);
    $config['base_url']  = site_url('home/noticeboard/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'noticeboard';
    $page_data['page_title'] = get_phrase('noticeboard');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }


  public function resume()
  {

    // Meta tags
    $data['title'] = 'Resume - Maker'; // This is the title of the page e.g 'Resume - Start Bootstrap Theme'.
    $data['description'] = 'Resume is a Bootstrap resume or CV landing page theme to help you beautifully create easy to use, stylish resume websites!'; // This is the <head> meta description field.
    $data['author'] = 'Yash'; // This is the <head> meta author field.

    // About Section
    $data['first_name'] = 'Yash';
    $data['last_name'] = 'Gupta';
    $data['address'] = 'New Bhoomi Park 2 COOP HSC,Malad(W),Mumbai';
    $data['your_email'] = 'gupta.yash211@gmail.com';
    $data['about_info'] = 'I am experienced in leveraging agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition.';



    $this->load->view('frontend/ultimate/resume_header', $data); // <head> block of the HTML.
    $this->load->view('frontend/ultimate/resume_navigation', $data); // <nav> block of the HTML.
    $this->load->view('frontend/ultimate/resume_home', $data); // The actual content of the page.
    $this->load->view('frontend/ultimate/resume_footer', $data); // The footer of the document including closing </body> and any links at the bottom of the document.
  }
  
  function resume2(){
    $this->load->view('frontend/ultimate/login_resume');
  }

  function createlogetut()
  {
    $page_data['page_name'] = 'login_etutor';
    $page_data['page_title'] = get_phrase('EtutorLogin');
    $this->load->view('frontend/ultimate/' . $page_data['page_name']);
  }

  function logetut()
  {
    $data['email'] = html_escape($this->input->post('email'));
    //echo $data['email'];
    $this->session->set_userdata('email', $data['email']);
    $query = $this->db->get_where('etutor_student', array('email' => $data['email']));
    if ($query->num_rows() > 0) {
      //redirect('view/frontend/ultimate/etutor_dashboard','refresh');
      $page_data['page_name'] = 'etutor_dashboard';
      $page_data['page_title'] = get_phrase('Etutor');
      $this->load->view('frontend/ultimate/' . $page_data['page_name']);
    } else {
      echo "Email id Not available";
    }
    //$data['password']=html_escape($this->input->post('password'));
  }

  function viewjoinclass()
  {
    if ($this->session->has_userdata('email') == FALSE) {
      $this->createlogetut();
    }
    $page_data['page_name']  = 'etutor_joinclass';
    $page_data['page_title'] = get_phrase('Join Class');
    $this->load->view('frontend/ultimate/' . $page_data['page_name']);
  }

  function join_class()
  {
    if ($this->session->has_userdata('email') == FALSE) {
      $this->createlogetut();
    }
    $data['class_name'] = html_escape($this->input->post('class'));
    $data['email'] = $this->session->userdata('email');
    $data1 = array('status' => 1);
    $this->db->where('email', $data['email']);
    $this->db->update('etutor_student', $data1);
    //echo "Succesfully Joined";
    $page_data['page_name']  = 'etutor_joinclass';
    $page_data['page_title'] = get_phrase('Join Class');
    $this->load->view('frontend/ultimate/' . $page_data['page_name']);
  }

  function class_subject()
  {
    $class_name=$this->session->userdata('class_code');
     $this->db->select('*');
     $this->db->from('etutor_subject');
     $this->db->where('class_name',$class_name);
     $q=$this->db->get()->result_array();
     //print_r($q);
     //echo "\n";
     //echo $q[0]['name'];
     $page_data['name']=$q[0]['name'];
     $page_data['desc']=$q[0]['description'];
     $page_data['file_name']=$q[0]['file_name'];
     $page_data['page_name']  = 'etutor_subjects';
    $page_data['page_title'] = get_phrase('Subjects');
    //print_r($page_data);
    $this->load->view('frontend/ultimate/' . $page_data['page_name'],$page_data);
  }

  function notice_details($notice_id = '')
  {
    $page_data['notice_id'] = $notice_id;
    $page_data['page_name']  = 'notice_details';
    $page_data['page_title'] = get_phrase('notice_details');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function events()
  {
    $count_events = $this->db->get_where('frontend_events', array('status' => 1))->num_rows();
    $config = array();
    $config = manager($count_events, 8);
    $config['base_url']  = site_url('home/events/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'event';
    $page_data['page_title'] = get_phrase('event_list');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function teachers()
  {
    $count_teachers = $this->db->get_where('teacher', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_teachers, 9);
    $config['base_url']  = site_url('home/teachers/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'teacher';
    $page_data['page_title'] = get_phrase('teachers');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function gallery()
  {
    $count_gallery = $this->db->get_where('frontend_gallery', array('show_on_website' => 1))->num_rows();
    $config = array();
    $config = manager($count_gallery, 6);
    $config['base_url']  = site_url('home/gallery/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['page_name']  = 'gallery';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function gallery_view($gallery_id = '')
  {
    $count_images = $this->db->get_where('frontend_gallery_image', array(
      'frontend_gallery_id' => $gallery_id
    ))->num_rows();
    $config = array();
    $config = manager($count_images, 9);
    $config['base_url']  = site_url('home/gallery_view/' . $gallery_id . '/');
    $this->pagination->initialize($config);

    $page_data['per_page']    = $config['per_page'];
    $page_data['gallery_id']  = $gallery_id;
    $page_data['page_name']  = 'gallery_view';
    $page_data['page_title'] = get_phrase('gallery');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function admission()
  {
    $page_data['page_name']  = 'admission';
    $page_data['page_title'] = get_phrase('admission_form');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function about()
  {
    $page_data['page_name']  = 'about';
    $page_data['page_title'] = get_phrase('about_us');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function contact($param1 = '')
  {
    if ($param1 == 'send') {
      $this->frontend_model->send_contact_message();
      redirect(site_url('home/contact'), 'refresh');
    }
    $page_data['page_name']  = 'contact';
    $page_data['page_title'] = get_phrase('contact_us');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function privacy_policy()
  {
    $page_data['page_name']  = 'privacy_policy';
    $page_data['page_title'] = get_phrase('privacy_policy');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function terms_conditions()
  {
    $page_data['page_name']  = 'terms_conditions';
    $page_data['page_title'] = get_phrase('terms_&_conditions');
    $this->load->view('frontend/' . $this->theme . '/index', $page_data);
  }

  function view_ecom_login(){
    $this->load->view('frontend/ultimate/ecom_login');
  }
  
  function val_ecom_login(){
    $data['name']=html_escape($this->input->post('name'));
    $data['email']=html_escape($this->input->post('email'));
    //$data['password']=html_escape($this->input->post('pass'));
    $data['refcode']=html_escape($this->input->post('rcode'));
    $val=$this->Crud_model->get_ecom_user($data['email']);
    if($val==-1){  //user is signed up
      if($data['refcode']==""){
        $data['refcode']=rand(11111, 99999);
      }else{
        $query=$this->db->get_where('ecom_user',array('refcode' => $data['refcode']))->row()->refno;
        $query_new=$query + 1;
        $this->db->set('refno',$query_new);
        $this->db->where('refcode',$data['refcode']);
        $this->db->update('ecom_user');
        $data['refcode']=rand(11111, 99999);
        $this->db->insert('ecom_user',$data);
      $this->session->userdata('sname',$data['name']);
      $this->session->set_flashdata('logsuc',"Logged in Successfully");
      }

      $page_data['page_name']='ecom_dashboard';
      $page_data['page_title']='Dashboard';
      $page_data['user_name']=$data['name'];
      $this->load->view('frontend/ultimate/ecom_index',$page_data);
    }
    else{
      $this->session->set_flashdata('invalid',"Please Create a Account");
      redirect(site_url('home/ecom_signup'),'refresh');
    }
  }
  
  function ecom_signup(){
    $this->load->view('frontend/ultimate/ecom_signup');
  }

  function esign(){
    $data['email']=html_escape($this->input->post('email'));
    $this->Crud_model->insert_ecomuser($data);
    $this->session->set_flashdata('sign',"Successfully signed in");
    redirect(site_url('home/view_ecom_login'),'refresh');
  }

  function ecomlogout(){
    $this->session->sess_destroy();
    $this->session->set_flashdata('logout_notification', 'logged_out');
    redirect(site_url('home/view_ecom_login'),'refresh');
  }
}
