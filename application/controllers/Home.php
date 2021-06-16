<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Twilio\Rest\Client;
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
    $this->load->model('Email_model');
    $this->theme = $this->frontend_model->get_frontend_general_settings('theme');
  }

  // default function
  public function index()
  {
    $page_data['page_name']  = 'new_home';
    $page_data['page_title'] = get_phrase('home');
    //$this->load->view('frontend/' . $this->theme . '/index', $page_data);
    $this->load->view('frontend/ultimate/new_home');
  }

  function viewusersign()
  {
    $this->load->view('frontend/ultimate/superuser_logsign');
  }


  //superuser signup
  function superuser_signup()
  {
    //email,firstname,lastname,passwd,icode
    $data['email'] = html_escape($this->input->post('email'));
    $data['firstname'] = html_escape($this->input->post('firstname'));
    $data['lastname'] = html_escape($this->input->post('lastname'));
    $data['password'] = html_escape($this->input->post('password'));
    $data['ref'] = html_escape($this->input->post('icode'));
    //course sign up
    $course['email'] = $data['email'];
    $course['name'] = $data['firstname'];
    $course['refcode'] = $data['ref'];
    $query = $this->db->get_where('ecom_usignup', array('email' => $course['email']))->num_rows();
    if ($query == 0) {
      $c1['email'] = $course['email'];
      $this->Crud_model->insert_ecomuser($c1);
    }
    if ($course['refcode'] != "") {
      $query = $this->db->get_where('ecom_user', array('refcode' => $course['refcode']))->row()->refno;
      $query_new = $query + 1;
      $this->db->set('refno', $query_new);
      $this->db->where('refcode', $course['refcode']);
      $this->db->update('ecom_user');
      $course['refcode'] = rand(11111, 99999);
      $query = $query = $this->db->get_where('ecom_user', array('email' => $course['email']))->num_rows();
      if ($query == 0) {
        $this->db->insert('ecom_user', $course);
      }
    }
    if ($course['refcode'] == "") {
      $course['refcode'] = rand(11111, 99999);
      $query = $query = $this->db->get_where('ecom_user', array('email' => $course['email']))->num_rows();
      if ($query == 0) {
        $this->db->insert('ecom_user', $course);
      }
      //$this->db->insert('ecom_user', $course);
    }
    //$this->session->set_userdata('sname', $data['email']);

    //etutor signup
    $etutor['email'] = $data['email'];
    //echo $data['email'];
    //$this->session->set_userdata('email', $etutor['email']);
    $query = $this->db->get_where('etutor_student', array('email' => $data['email']));
    if ($query->num_rows() > 0) {
      $this->session->set_userdata('email', $etutor['email']);
    }
    //final signup
    $data['ref'] = $course['refcode'];
    $this->db->insert('superuser', $data);
    $this->session->set_flashdata('successmsg', "Signed Up Succesfully");
    $this->session->set_userdata('name', $data['firstname']);
    redirect(site_url('home/viewusersign'), 'refresh');
  }

  //superuser login
  function superuser_login()
  {

    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $require = array('email' => $email, 'password' => $password);
    $query = $this->db->get_where('superuser', $require)->num_rows();
    if ($query == 0) {
      $this->session->set_flashdata('login_error', get_phrase('invalid email id or password'));
      redirect(site_url('home/viewusersign'), 'refresh');
    }
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('sname', $email);

    $page_data['page_name'] = 'sdashboard';
    $this->load->view('frontend/ultimate/sindex', $page_data);
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


  function resume()
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

  function resume2()
  {
    $this->load->view('frontend/ultimate/login_resume');
  }

  //etutor dashboard
  function viewedash()
  {
    if ($this->session->has_userdata('email') == FALSE) {
      $this->ecomlogout();
    }
    $page_data['page_name'] = 'etutor_dashboard';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  /*function createlogetut()
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
  }*/

  function viewjoinclass()
  {
    if ($this->session->has_userdata('email') == FALSE) {
      $this->ecomlogout();
    }

    $page_data['page_title'] = get_phrase('Join Class');

    $page_data['page_name'] = 'etutor_joinclass';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  function join_class()
  {
    if ($this->session->has_userdata('email') == FALSE) {
      $this->ecomlogout();
    }
    $data['class_name'] = html_escape($this->input->post('class'));
    $data['email'] = $this->session->userdata('email');
    $data1 = array('status' => 1);
    $this->db->where('email', $data['email']);
    $this->db->update('etutor_student', $data1);
    //echo "Succesfully Joined";
    //$page_data['page_name']  = 'etutor_joinclass';
    $page_data['page_title'] = get_phrase('Join Class');
    //$this->load->view('frontend/ultimate/' . $page_data['page_name']);
    $page_data['page_name'] = 'etutor_joinclass';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  function class_subject()
  {
    $tquery = $this->db->get_where('etutor_student', array('email' => $this->session->userdata('email')))->row()->class_name;
    //echo $tquery;
    //$class_name = $this->session->userdata('class_code');
    $this->db->select('*');
    $this->db->from('etutor_subject');
    $this->db->where('class_name', $tquery);
    $q = $this->db->get()->result_array();
    //print_r($q);
    //echo "\n";
    //echo $q[0]['name'];
    $page_data['name'] = $q[0]['name'];
    //print_r($q);
    $page_data['desc'] = $q[0]['description'];
    $page_data['file_name'] = $q[0]['file_name'];
    $page_data['page_name']  = 'etutor_subjects';
    $page_data['page_title'] = get_phrase('Subjects');
    //print_r($page_data);
    //$this->load->view('frontend/ultimate/' . $page_data['page_name'], $page_data);
    $page_data['page_name'] = 'etutor_subjects';
    $this->load->view('frontend/ultimate/sindex', $page_data);
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

  /*function view_ecom_login()
  {
    $this->load->view('frontend/ultimate/ecom_login');
  }



  function val_ecom_login()
  {
    $data['name'] = html_escape($this->input->post('name'));
    $data['email'] = html_escape($this->input->post('email'));
    //$data['password']=html_escape($this->input->post('pass'));
    $data['refcode'] = html_escape($this->input->post('rcode'));
    $val = $this->Crud_model->get_ecom_user($data['email']);
    if ($val == -1) {  //user is signed up
      if ($data['refcode'] == "") {
        $data['refcode'] = rand(11111, 99999);
      } else {
        $query = $this->db->get_where('ecom_user', array('refcode' => $data['refcode']))->row()->refno;
        $query_new = $query + 1;
        $this->db->set('refno', $query_new);
        $this->db->where('refcode', $data['refcode']);
        $this->db->update('ecom_user');
        $data['refcode'] = rand(11111, 99999);
        $this->db->insert('ecom_user', $data);
        //$this->session->set_userdata('sname', $data['email']);
        //$this->session->set_userdata('sname',$data['email']);
        $this->session->set_flashdata('logsuc', "Logged in Successfully");
      }
      $this->session->set_userdata('sname', $data['email']);
      $page_data['page_name'] = 'ecom_dashboard';
      $page_data['page_title'] = 'Dashboard';
      $page_data['user_name'] = $data['name'];
      $this->load->view('frontend/ultimate/ecom_index', $page_data);
    } else {
      $this->session->set_flashdata('invalid', "Please Create a Account");
      redirect(site_url('home/ecom_signup'), 'refresh');
    }
  }

  function ecom_signup()
  {
    $this->load->view('frontend/ultimate/ecom_signup');
  }

  function esign()
  {
    $data['email'] = html_escape($this->input->post('email'));
    $this->Crud_model->insert_ecomuser($data);
    $this->session->set_flashdata('sign', "Successfully signed in");
    redirect(site_url('home/view_ecom_login'), 'refresh');
  }*/

  function ecomlogout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('logout_notification', 'logged_out');
    redirect(site_url('home/viewusersign'), 'refresh');
  }

  //get courses content
  function getcoursecontent()
  {
    if ($this->session->has_userdata('sname') == "") {
      $this->ecomlogout();
    }
    $data['course_id'] = html_escape($this->input->post('course_id'));
    //echo $data['course_id'];
    //$query=$this->db1->get_where('content',array('course_id' => $data['course_id']))->result_array();
    $this->db->select('*');
    $this->db->from('newecom_content');
    $this->db->where('course_id', $data['course_id']);
    $query = $this->db->get()->result_array();
    $email = $this->session->userdata('sname');
    //echo $email;
    $stuid = $this->db->get_where('ecom_user', array('email' => $email))->row()->ecom_id;
    //echo $stuid;
    $enroll['user_id'] = $stuid;
    $enroll['course_id'] = html_escape($this->input->post('course_id'));
    $course_name = $this->db->get_where('courses', array('course_id' => $enroll['course_id']))->row()->name;
    $this->session->set_userdata('cname', $course_name);
    $q = $this->db->get_where('enroll_course', array('user_id' => $enroll['user_id'], 'course_id' => $enroll['course_id']))->num_rows();
    if ($q == 0) {
      $this->db->insert('enroll_course', $enroll);
    }
    /*$id = $_GET['file'];
    $download = $this->db1->get_where('content', array('course_id' => $data['course_id']))->row()->file_name;
    $filepath = 'uploads/document' . $download['file_name'];
    if (file_exists($filepath)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename=' . basename($filepath));
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize('uploads/document' . $download['file_name']));
      readfile('uploads/document' . $download['file_name']);
    }*/
    //$page_data['page_name'] = 'ecom_getcourse';
    $page_data['page_title'] = 'Courses';
    $page_data['data'] = $query;
    //$this->load->view('frontend/ultimate/ecom_index', $page_data);
    $page_data['page_name'] = 'ecom_getcourse';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  function generate_cert()
  {
    $data['cname'] = $this->session->userdata('cname');
    $data['snam'] = $this->session->userdata('sname');
    //echo $data['cname'], $data['snam'];
    $data['name'] = $this->db->get_where('ecom_user', array('email' => $data['snam']))->row()->name;
    //echo $n;
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('frontend/ultimate/ecom_certificate', $data, true);
    $mpdf->WriteHtml($html);
    $query = $this->db->get_where('ecom_user', array('email' => $data['snam']))->row()->refno;
    if ($query['refno'] > 1) {
      $mpdf->Output();
    }
  }

  function verifycerti($sname = "")
  {
    echo "ewbfhebjhwsgb";
  }

  function ecomdash()
  {

    //echo "rfibhbghubgh";
    $page_data['page_name'] = 'ecom_dashboard';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  function profile()
  {
    if ($this->session->has_userdata('sname') == "") {
      $this->ecomlogout();
    }
    $email = $this->session->userdata('sname');
    //echo $email;
    $query = $this->db->get('superuser', array('email' => $email));
    $stuid = $this->db->get('ecom_user', array('email' => $email))->row()->ecom_id;
    //echo $stuid;
    $data=$this->db->get('enroll_course',array('user_id' => $stuid))->row()->course_id;
    //print_r($data);
    $page_data['ecourse']=$this->db->get_where('courses',array('course_id' => $data))->row()->name;
    //print_r($page_data['ecourse']);
    $page_data['data'] = $query->result_array();
    $page_data['page_name'] = 'profile';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  function vemailmodal()
  {
    $page_data['page_name'] = 'emailsend';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }

  //send code via email
  function sendecode()
  {
    $to = html_escape($this->input->post('email'));
    $message = html_escape($this->input->post('message'));
    $from = $this->session->userdata('sname');
    $refcode = $this->db->get_where('superuser', array('email' => $from))->row()->ref;
    $subject = 'Referrel Code :' . $refcode;
    $this->Email_model->send_smtp_mail($message, $subject, $to, $from);
    $this->session->set_flashdata('emailsent', "Email Sent Successfully");
    $this->vemailmodal();
  }

  function sendsms()
  {
    $page_data['page_name'] = 'sendsms';
    $this->load->view('frontend/ultimate/sindex', $page_data);
  }


  function send_sms()
  {

    $to = html_escape($this->input->post('to'));
    $mess = html_escape($this->input->post('message'));
    //echo $message;
    //$from = html_escape($this->input->post('from'));
    // LOAD TWILIO LIBRARY
    //require_once(APPPATH . 'libraries/twilio_library/Twilio.php');


    $account_sid    = "AC49612b147e145c137b3a736459efccaa";
    $auth_token     = "38575999f6c4118480829a28b5b78624";
    $client         = new Client($account_sid, $auth_token);

    /*$client->account->messages->create(array(
        'To'        => $to,
        'From'      => $from,
        'Body'      => "hhj",
    ));*/
    $client->messages->create(
      '+919867897028',
      array(
        "from" => "+12248084136",
        "body" => $mess,
      )
    );
    $this->session->set_flashdata('message_sent', "Message Sent successfully");
    redirect(site_url('home/sendsms', 'refresh'));
  }
}
