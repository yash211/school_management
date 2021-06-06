<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author   : Creativeitem
 *  date    : 14 september, 2017
 *  Ekattor School Management System Pro
 *  http://codecanyon.net/user/Creativeitem
 *  http://support.creativeitem.com
 */

class Teacher extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model(array('Ajaxdataload_model' => 'ajaxload'));
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    /***default functin, redirects to login page if no teacher logged in yet***/
    public function index()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($this->session->userdata('teacher_login') == 1)
            redirect(site_url('teacher/dashboard'), 'refresh');
    }

    /***TEACHER DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('teacher_login') != 1 )
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('teacher_dashboard');
        $this->load->view('backend/index', $page_data);
    }

    function etutordashboard()
    {
        //echo $this->session->userdata('etut_login');
        if ($this->session->userdata('etut_login') != 1 )
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('etutor_dashboard');
        $this->load->view('backend/index', $page_data);
    }


    /*ENTRY OF A NEW STUDENT*/


    /****MANAGE STUDENTS CLASSWISE*****/

    function student_information($class_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');

        $page_data['page_name']      = 'student_information';
        $page_data['page_title']     = get_phrase('student_information') . " - " . get_phrase('class') . " : " .
            $this->crud_model->get_class_name($class_id);
        $page_data['class_id']     = $class_id;
        $this->load->view('backend/index', $page_data);
    }

    function student_profile($student_id)
    {
        if ($this->session->userdata('teacher_login') != 1) {
            redirect(base_url(), 'refresh');
        }
        $page_data['page_name']  = 'student_profile';
        $page_data['page_title'] = get_phrase('student_profile');
        $page_data['student_id']  = $student_id;
        $this->load->view('backend/index', $page_data);
    }

    function student_marksheet($student_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        $class_id     = $this->db->get_where('enroll', array(
            'student_id' => $student_id, 'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
        ))->row()->class_id;
        $student_name = $this->db->get_where('student', array('student_id' => $student_id))->row()->name;
        $class_name   = $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
        $page_data['page_name']  =   'student_marksheet';
        $page_data['page_title'] =   get_phrase('marksheet_for') . ' ' . $student_name . ' (' . get_phrase('class') . ' ' . $class_name . ')';
        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $this->load->view('backend/index', $page_data);
    }

    function student_marksheet_print_view($student_id, $exam_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        $class_id     = $this->db->get_where('enroll', array(
            'student_id' => $student_id, 'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
        ))->row()->class_id;
        $class_name   = $this->db->get_where('class', array('class_id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $page_data['exam_id']    =   $exam_id;
        $this->load->view('backend/teacher/student_marksheet_print_view', $page_data);
    }



    function get_class_section($class_id)
    {
        $sections = $this->db->get_where('section', array(
            'class_id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
        }
    }

    function get_class_subject($class_id)
    {
        $subject = $this->db->get_where('subject', array(
            'class_id' => $class_id, 'teacher_id' => $this->session->userdata('teacher_id')
        ))->result_array();
        foreach ($subject as $row) {
            echo '<option value="' . $row['subject_id'] . '">' . $row['name'] . '</option>';
        }
    }
    /****MANAGE TEACHERS*****/
    function teacher_list($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('teacher_list');
        $this->load->view('backend/index', $page_data);
    }



    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create'){
            $data['name']       = html_escape($this->input->post('name'));
            $data['class_id']   = $this->input->post('class_id');

            if ($this->input->post('teacher_id') != null) {
                $data['teacher_id'] = $this->input->post('teacher_id');
            }
            $data['year']       = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
            if ($data['class_id'] != '') {
                $this->db->insert('subject', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('select_class'));
            }

            redirect(site_url('teacher/subject/' . $data['class_id']), 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = html_escape($this->input->post('name'));
            $data['class_id']   = $this->input->post('class_id');

            if ($this->input->post('teacher_id') != null) {
                $data['teacher_id'] = $this->input->post('teacher_id');
            } else {
                $data['teacher_id'] = null;
            }
            $data['year']       = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
            if ($data['class_id'] != '') {
                $this->db->where('subject_id', $param2);
                $this->db->update('subject', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('select_class'));
            }

            redirect(site_url('teacher/subject/' . $data['class_id']), 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('subject', array(
                'subject_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('subject_id', $param2);
            $this->db->delete('subject');
            redirect(site_url('teacher/subject/' . $param3), 'refresh');
        }
        $page_data['class_id']   = $param1;
        $page_data['subjects']   = $this->db->get_where('subject', array(
            'class_id' => $param1, 'teacher_id' => $this->session->userdata('teacher_id'),
            'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
        ))->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('backend/index', $page_data);
    }



    /****MANAGE EXAM MARKS*****/
    function marks_manage()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  =   'marks_manage';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }

    function marks_manage_view($exam_id = '', $class_id = '', $section_id = '', $subject_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['exam_id']    =   $exam_id;
        $page_data['class_id']   =   $class_id;
        $page_data['subject_id'] =   $subject_id;
        $page_data['section_id'] =   $section_id;
        $page_data['page_name']  =   'marks_manage_view';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }

    function marks_selector()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        $data['exam_id']    = $this->input->post('exam_id');
        $data['class_id']   = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['year']       = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        if ($data['class_id'] != '' && $data['exam_id'] != '') {
            $query = $this->db->get_where('mark', array(
                'exam_id' => $data['exam_id'],
                'class_id' => $data['class_id'],
                'section_id' => $data['section_id'],
                'subject_id' => $data['subject_id'],
                'year' => $data['year']
            ));
            if ($query->num_rows() < 1) {
                $students = $this->db->get_where('enroll', array(
                    'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'year' => $data['year']
                ))->result_array();
                foreach ($students as $row) {
                    $data['student_id'] = $row['student_id'];
                    $this->db->insert('mark', $data);
                }
            }
            redirect(site_url('teacher/marks_manage_view/' . $data['exam_id'] . '/' . $data['class_id'] . '/' . $data['section_id'] . '/' . $data['subject_id']), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('select_all_the_fields'));
            $page_data['page_name']  =   'marks_manage';
            $page_data['page_title'] = get_phrase('manage_exam_marks');
            $this->load->view('backend/index', $page_data);
        }
    }
    function marks_update($exam_id = '', $class_id = '', $section_id = '', $subject_id = '')
    {
        $running_year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        if ($class_id != '' && $exam_id != '') {
            $marks_of_students = $this->db->get_where('mark', array(
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'year' => $running_year,
                'subject_id' => $subject_id
            ))->result_array();
            foreach ($marks_of_students as $row) {
                $obtained_marks = html_escape($this->input->post('marks_obtained_' . $row['mark_id']));
                $comment = html_escape($this->input->post('comment_' . $row['mark_id']));
                $this->db->where('mark_id', $row['mark_id']);
                $this->db->update('mark', array('mark_obtained' => $obtained_marks, 'comment' => $comment));
            }
            $this->session->set_flashdata('flash_message', get_phrase('marks_updated'));
            redirect(site_url('teacher/marks_manage_view/' . $exam_id . '/' . $class_id . '/' . $section_id . '/' . $subject_id), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('select_all_the_fields'));
            $page_data['page_name']  =   'marks_manage';
            $page_data['page_title'] = get_phrase('manage_exam_marks');
            $this->load->view('backend/index', $page_data);
        }
    }

    function marks_get_subject($class_id)
    {
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/teacher/marks_get_subject', $page_data);
    }


    // ACADEMIC SYLLABUS
    function academic_syllabus($class_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        // detect the first class
        if ($class_id == '')
            $class_id           =   $this->db->get('class')->first_row()->class_id;

        $page_data['page_name']  = 'academic_syllabus';
        $page_data['page_title'] = get_phrase('academic_syllabus');
        $page_data['class_id']   = $class_id;
        $this->load->view('backend/index', $page_data);
    }

    function upload_academic_syllabus()
    {
        $data['academic_syllabus_code'] =   substr(md5(rand(0, 1000000)), 0, 7);
        $data['title']                  =   html_escape($this->input->post('title'));
        $data['description']            =   html_escape($this->input->post('description'));
        $data['class_id']               =   html_escape($this->input->post('class_id'));
        if ($this->input->post('subject_id') != null) {
            $data['subject_id']          =   $this->input->post('subject_id');
        }
        $data['uploader_type']          =   $this->session->userdata('login_type');
        $data['uploader_id']            =   $this->session->userdata('login_user_id');
        $data['year']                   =   $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        $data['timestamp']              =   strtotime(date("Y-m-d H:i:s"));
        //uploading file using codeigniter upload library
        $files = $_FILES['file_name'];
        $this->load->library('upload');
        $config['upload_path']   =  'uploads/syllabus/';
        $config['allowed_types'] =  '*';
        $_FILES['file_name']['name']     = $files['name'];
        $_FILES['file_name']['type']     = $files['type'];
        $_FILES['file_name']['tmp_name'] = $files['tmp_name'];
        $_FILES['file_name']['size']     = $files['size'];
        $this->upload->initialize($config);
        $this->upload->do_upload('file_name');

        $data['file_name'] = $_FILES['file_name']['name'];

        $this->db->insert('academic_syllabus', $data);
        $this->session->set_flashdata('flash_message', get_phrase('syllabus_uploaded'));
        redirect(site_url('teacher/academic_syllabus/' . $data['class_id']), 'refresh');
    }

    function download_academic_syllabus($academic_syllabus_code)
    {
        $file_name = $this->db->get_where('academic_syllabus', array(
            'academic_syllabus_code' => $academic_syllabus_code
        ))->row()->file_name;
        $this->load->helper('download');
        $data = file_get_contents("uploads/syllabus/" . $file_name);
        $name = $file_name;

        force_download($name, $data);
    }

    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(site_url('teacher/backup_restore'), 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(site_url('teacher/backup_restore'), 'refresh');
        }

        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']        = html_escape($this->input->post('name'));
            $data['email']       = html_escape($this->input->post('email'));
            $validation = email_validation_for_edit($data['email'], $this->session->userdata('teacher_id'), 'teacher');
            if ($validation == 1) {
                $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
                $this->db->update('teacher', $data);
                move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $this->session->userdata('teacher_id') . '.jpg');
                $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }
            redirect(site_url('teacher/manage_profile/'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

            $current_password = $this->db->get_where('teacher', array(
                'teacher_id' => $this->session->userdata('teacher_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
                $this->db->update('teacher', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }
            redirect(site_url('teacher/manage_profile/'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('teacher', array(
            'teacher_id' => $this->session->userdata('teacher_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            if ($this->input->post('class_id') != null) {
                $data['class_id']       = $this->input->post('class_id');
            }

            $data['section_id']     = $this->input->post('section_id');
            $data['subject_id']     = $this->input->post('subject_id');

            // 12 AM for starting time
            if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 1) {
                $data['time_start'] = 24;
            }
            // 12 PM for starting time
            else if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 2) {
                $data['time_start'] = 12;
            }
            // otherwise for starting time
            else {
                $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            }
            // 12 AM for ending time
            if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 1) {
                $data['time_end'] = 24;
            }
            // 12 PM for ending time
            else if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 2) {
                $data['time_end'] = 12;
            }
            // otherwise for ending time
            else {
                $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            }

            $data['time_start_min'] = $this->input->post('time_start_min');
            $data['time_end_min']   = $this->input->post('time_end_min');
            $data['day']            = $this->input->post('day');
            $data['year']           = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
            // checking duplication
            $array = array(
                'section_id'    => $data['section_id'],
                'class_id'      => $data['class_id'],
                'time_start'    => $data['time_start'],
                'time_end'      => $data['time_end'],
                'time_start_min' => $data['time_start_min'],
                'time_end_min'  => $data['time_end_min'],
                'day'           => $data['day'],
                'year'          => $data['year']
            );
            $validation = duplication_of_class_routine_on_create($array);
            if ($validation == 1) {
                $this->db->insert('class_routine', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('time_conflicts'));
            }

            redirect(site_url('teacher/class_routine_add'), 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['class_id']       = $this->input->post('class_id');
            if ($this->input->post('section_id') != '') {
                $data['section_id'] = $this->input->post('section_id');
            }
            $data['subject_id']     = $this->input->post('subject_id');

            // 12 AM for starting time
            if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 1) {
                $data['time_start'] = 24;
            }
            // 12 PM for starting time
            else if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 2) {
                $data['time_start'] = 12;
            }
            // otherwise for starting time
            else {
                $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            }
            // 12 AM for ending time
            if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 1) {
                $data['time_end'] = 24;
            }
            // 12 PM for ending time
            else if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 2) {
                $data['time_end'] = 12;
            }
            // otherwise for ending time
            else {
                $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            }

            $data['time_start_min'] = $this->input->post('time_start_min');
            $data['time_end_min']   = $this->input->post('time_end_min');
            $data['day']            = $this->input->post('day');
            $data['year']           = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
            if ($data['subject_id'] != '') {
                // checking duplication
                $array = array(
                    'section_id'    => $data['section_id'],
                    'class_id'      => $data['class_id'],
                    'time_start'    => $data['time_start'],
                    'time_end'      => $data['time_end'],
                    'time_start_min' => $data['time_start_min'],
                    'time_end_min'  => $data['time_end_min'],
                    'day'           => $data['day'],
                    'year'          => $data['year']
                );
                $validation = duplication_of_class_routine_on_edit($array, $param2);

                if ($validation == 1) {
                    $this->db->where('class_routine_id', $param2);
                    $this->db->update('class_routine', $data);
                    $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('time_conflicts'));
                }
            } else {
                $this->session->set_flashdata('error_message', get_phrase('subject_is_not_found'));
            }

            redirect(site_url('admin/class_routine_view/' . $data['class_id']), 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class_routine', array(
                'class_routine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $class_id = $this->db->get_where('class_routine', array('class_routine_id' => $param2))->row()->class_id;
            $this->db->where('class_routine_id', $param2);
            $this->db->delete('class_routine');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('teacher/class_routine_view/' . $class_id), 'refresh');
        }
    }

    function class_routine_add()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'class_routine_add';
        $page_data['page_title'] = get_phrase('add_class_routine');
        $this->load->view('backend/index', $page_data);
    }
    function get_class_section_subject($class_id)
    {
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/teacher/class_routine_section_subject_selector', $page_data);
    }

    function section_subject_edit($class_id, $class_routine_id)
    {
        $page_data['class_id']          =   $class_id;
        $page_data['class_routine_id']  =   $class_routine_id;
        $this->load->view('backend/teacher/class_routine_section_subject_edit', $page_data);
    }

    function class_routine_print_view($class_id, $section_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['class_id']   =   $class_id;
        $page_data['section_id'] =   $section_id;
        $this->load->view('backend/teacher/class_routine_print_view', $page_data);
    }

    function class_routine_view($class_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'class_routine_view';
        $page_data['class_id']  =   $class_id;
        $page_data['page_title'] = get_phrase('class_routine');
        $this->load->view('backend/index', $page_data);
    }

    /****** DAILY ATTENDANCE *****************/
    function manage_attendance($class_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        $class_name = $this->db->get_where('class', array(
            'class_id' => $class_id
        ))->row()->name;
        $page_data['page_name']  =  'manage_attendance';
        $page_data['class_id']   =  $class_id;
        $page_data['page_title'] =  get_phrase('manage_attendance_of_class') . ' ' . $class_name;
        $this->load->view('backend/index', $page_data);
    }

    function manage_attendance_view($class_id = '', $section_id = '', $timestamp = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $class_name = $this->db->get_where('class', array(
            'class_id' => $class_id
        ))->row()->name;
        $page_data['class_id'] = $class_id;
        $page_data['timestamp'] = $timestamp;
        $page_data['page_name'] = 'manage_attendance_view';
        $section_name = $this->db->get_where('section', array(
            'section_id' => $section_id
        ))->row()->name;
        $page_data['section_id'] = $section_id;
        $page_data['page_title'] = get_phrase('manage_attendance_of_class') . ' ' . $class_name . ' : ' . get_phrase('section') . ' ' . $section_name;
        $this->load->view('backend/index', $page_data);
    }

    function attendance_selector()
    {
        $data['class_id']   = $this->input->post('class_id');
        $data['year']       = $this->input->post('year');
        $data['timestamp']  = strtotime($this->input->post('timestamp'));
        $data['section_id'] = $this->input->post('section_id');
        $query = $this->db->get_where('attendance', array(
            'class_id' => $data['class_id'],
            'section_id' => $data['section_id'],
            'year' => $data['year'],
            'timestamp' => $data['timestamp']
        ));
        if ($query->num_rows() < 1) {
            $students = $this->db->get_where('enroll', array(
                'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'year' => $data['year']
            ))->result_array();
            foreach ($students as $row) {
                $attn_data['class_id']   = $data['class_id'];
                $attn_data['year']       = $data['year'];
                $attn_data['timestamp']  = $data['timestamp'];
                $attn_data['section_id'] = $data['section_id'];
                $attn_data['student_id'] = $row['student_id'];
                $this->db->insert('attendance', $attn_data);
            }
        }
        redirect(site_url('teacher/manage_attendance_view/' . $data['class_id'] . '/' . $data['section_id'] . '/' . $data['timestamp']), 'refresh');
    }

    function attendance_update($class_id = '', $section_id = '', $timestamp = '')
    {
        $running_year = $this->db->get_where('settings', array('type' => 'running_year'))->row()->description;
        $active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;
        $attendance_of_students = $this->db->get_where('attendance', array(
            'class_id' => $class_id, 'section_id' => $section_id, 'year' => $running_year, 'timestamp' => $timestamp
        ))->result_array();
        foreach ($attendance_of_students as $row) {
            $attendance_status = html_escape($this->input->post('status_' . $row['attendance_id']));
            $this->db->where('attendance_id', $row['attendance_id']);
            $this->db->update('attendance', array('status' => $attendance_status));

            if ($attendance_status == 2) {

                if ($active_sms_service != '' || $active_sms_service != 'disabled') {
                    $student_name   = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name;
                    $parent_id      = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->parent_id;
                    $message        = 'Your child' . ' ' . $student_name . 'is absent today.';
                    if ($parent_id != null && $parent_id != 0) {
                        $receiver_phone = $this->db->get_where('parent', array('parent_id' => $parent_id))->row()->phone;
                        if ($receiver_phone != '' || $receiver_phone != null) {
                            //$this->sms_model->send_sms($message,$receiver_phone);
                        } else {
                            $this->session->set_flashdata('error_message', get_phrase('parent_phone_number_is_not_found'));
                        }
                    } else {
                        $this->session->set_flashdata('error_message', get_phrase('parent_phone_number_is_not_found'));
                    }
                }
            }
        }
        $this->session->set_flashdata('flash_message', get_phrase('attendance_updated'));
        redirect(site_url('teacher/manage_attendance_view/' . $class_id . '/' . $section_id . '/' . $timestamp), 'refresh');
    }


    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        /*        //if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');

        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);*/
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($param1 == 'create') {
            $data['name']        = html_escape($this->input->post('name'));
            $data['class_id']    = $this->input->post('class_id');
            if ($this->input->post('description') != null) {
                $data['description'] = html_escape($this->input->post('description'));
            }
            if ($this->input->post('price') != null) {
                $data['price'] = html_escape($this->input->post('price'));
            }
            if ($this->input->post('author') != null) {
                $data['author'] = html_escape($this->input->post('author'));
            }
            if (!empty($_FILES["file_name"]["name"])) {
                $data['file_name'] = $_FILES["file_name"]["name"];
            }

            $this->db->insert('book', $data);

            if (!empty($_FILES["file_name"]["name"])) {
                move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
            }

            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('teacher/book'), 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = html_escape($this->input->post('name'));
            $data['class_id']    = $this->input->post('class_id');
            if ($this->input->post('description') != null) {
                $data['description'] = html_escape($this->input->post('description'));
            } else {
                $data['description'] = null;
            }
            if ($this->input->post('price') != null) {
                $data['price'] = html_escape($this->input->post('price'));
            } else {
                $data['price'] = null;
            }
            if ($this->input->post('author') != null) {
                $data['author'] = html_escape($this->input->post('author'));
            } else {
                $data['author'] = null;
            }

            if (!empty($_FILES["file_name"]["name"])) {
                $data['file_name'] = $_FILES["file_name"]["name"];
            }

            $this->db->where('book_id', $param2);
            $this->db->update('book', $data);

            if (!empty($_FILES["file_name"]["name"])) {
                move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
            }

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(site_url('teacher/book'), 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('book', array(
                'book_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('book_id', $param2);
            $this->db->delete('book');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('teacher/book'), 'refresh');
        }
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
    }
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');

        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
    }

    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
            $data['notice_title']     = html_escape($this->input->post('notice_title'));
            $data['notice']           = html_escape($this->input->post('notice'));
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);
            redirect(site_url('teacher/noticeboard/'), 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = html_escape($this->input->post('notice_title'));
            $data['notice']           = html_escape($this->input->post('notice'));
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));
            redirect(site_url('teacher/noticeboard/'), 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            redirect(site_url('teacher/noticeboard/'), 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get_where('noticeboard', array('status' => 1))->result_array();
        $this->load->view('backend/index', $page_data);
    }


    /**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
    function document($do = '', $document_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($do == 'upload') {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], "uploads/document/" . $_FILES["userfile"]["name"]);
            $data['document_name'] = html_escape($this->input->post('document_name'));
            $data['file_name']     = $_FILES["userfile"]["name"];
            $data['file_size']     = $_FILES["userfile"]["size"];
            $this->db->insert('document', $data);
            redirect(site_url('teacher/manage_document'), 'refresh');
        }
        if ($do == 'delete') {
            $this->db->where('document_id', $document_id);
            $this->db->delete('document');
            redirect(site_url('teacher/manage_document'), 'refresh');
        }
        $page_data['page_name']  = 'manage_document';
        $page_data['page_title'] = get_phrase('manage_documents');
        $page_data['documents']  = $this->db->get('document')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*********MANAGE STUDY MATERIAL************/
    function study_material($task = "", $document_id = "")
    {
        if ($this->session->userdata('teacher_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($task == "create") {
            $this->crud_model->save_study_material_info();
            $this->session->set_flashdata('flash_message', get_phrase('study_material_info_saved_successfuly'));
            redirect(site_url('teacher/study_material/'), 'refresh');
        }

        if ($task == "update") {
            $this->crud_model->update_study_material_info($document_id);
            $this->session->set_flashdata('flash_message', get_phrase('study_material_info_updated_successfuly'));
            redirect(site_url('teacher/study_material/'), 'refresh');
        }

        if ($task == "delete") {
            $this->crud_model->delete_study_material_info($document_id);
            redirect(site_url('teacher/study_material/'), 'refresh');
        }

        $data['study_material_info']    = $this->crud_model->select_study_material_info_for_teacher();
        $data['page_name']              = 'study_material';
        $data['page_title']             = get_phrase('study_material');
        $this->load->view('backend/index', $data);
    }

    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        $max_size = 2097152;
        if ($param1 == 'send_new') {

            // Folder creation
            if (!file_exists('uploads/private_messaging_attached_file/')) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir('uploads/private_messaging_attached_file/', 0777);
            }
            if ($_FILES['attached_file_on_messaging']['name'] != "") {
                if ($_FILES['attached_file_on_messaging']['size'] > $max_size) {
                    $this->session->set_flashdata('error_message', get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
                    redirect(site_url('teacher/message/message_new/'), 'refresh');
                } else {
                    $file_path = 'uploads/private_messaging_attached_file/' . $_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(site_url('teacher/message/message_read/' . $message_thread_code), 'refresh');
        }

        if ($param1 == 'send_reply') {

            if (!file_exists('uploads/private_messaging_attached_file/')) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir('uploads/private_messaging_attached_file/', 0777);
            }
            if ($_FILES['attached_file_on_messaging']['name'] != "") {
                if ($_FILES['attached_file_on_messaging']['size'] > $max_size) {
                    $this->session->set_flashdata('error_message', get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
                    redirect(site_url('teacher/message/message_read/' . $param2), 'refresh');
                } else {
                    $file_path = 'uploads/private_messaging_attached_file/' . $_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(site_url('teacher/message/message_read/' . $param2), 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

    //GROUP MESSAGE
    function group_message($param1 = "group_message_home", $param2 = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $max_size = 2097152;

        if ($param1 == 'group_message_read') {
            $page_data['current_message_thread_code'] = $param2;
        } else if ($param1 == 'send_reply') {
            if (!file_exists('uploads/group_messaging_attached_file/')) {
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir('uploads/group_messaging_attached_file/', 0777);
            }
            if ($_FILES['attached_file_on_messaging']['name'] != "") {
                if ($_FILES['attached_file_on_messaging']['size'] > $max_size) {
                    $this->session->set_flashdata('error_message', get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
                    redirect(site_url('teacher/group_message/group_message_read/' . $param2), 'refresh');
                } else {
                    $file_path = 'uploads/group_messaging_attached_file/' . $_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }

            $this->crud_model->send_reply_group_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(site_url('teacher/group_message/group_message_read/' . $param2), 'refresh');
        }
        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'group_message';
        $page_data['page_title']                = get_phrase('group_messaging');
        $this->load->view('backend/index', $page_data);
    }

    // MANAGE QUESTION PAPERS
    function question_paper($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('teacher_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }

        if ($param1 == "create") {
            $this->crud_model->create_question_paper();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(site_url('teacher/question_paper'), 'refresh');
        }

        if ($param1 == "update") {
            $this->crud_model->update_question_paper($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('teacher/question_paper'), 'refresh');
        }

        if ($param1 == "delete") {
            $this->crud_model->delete_question_paper($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(site_url('teacher/question_paper'), 'refresh');
        }

        $data['page_name']  = 'question_paper';
        $data['page_title'] = get_phrase('question_paper');
        $this->load->view('backend/index', $data);
    }

    // Details of searched student
    function student_details()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

        $student_identifier = html_escape($this->input->post('student_identifier'));
        $query_by_code = $this->db->get_where('student', array('student_code' => $student_identifier));

        if ($query_by_code->num_rows() == 0) {
            $this->db->like('name', $student_identifier);
            $query_by_name = $this->db->get('student');
            if ($query_by_name->num_rows() == 0) {
                $this->session->set_flashdata('error_message', get_phrase('no_student_found'));
                redirect(site_url('teacher/dashboard'), 'refresh');
            } else {
                $page_data['student_information'] = $query_by_name->result_array();
            }
        } else {
            $page_data['student_information'] = $query_by_code->result_array();
        }
        $page_data['page_name']      = 'search_result';
        $page_data['page_title']     = get_phrase('search_result');
        $this->load->view('backend/index', $page_data);
    }

    function get_teachers()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $columns = array(
            0 => 'teacher_id',
            1 => 'photo',
            2 => 'name',
            3 => 'email',
            4 => 'phone',
            5 => 'teacher_id'
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->ajaxload->all_teachers_count();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $teachers = $this->ajaxload->all_teachers($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];
            $teachers =  $this->ajaxload->teacher_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->ajaxload->teacher_search_count($search);
        }

        $data = array();
        if (!empty($teachers)) {
            foreach ($teachers as $row) {

                $photo = '<img src="' . $this->crud_model->get_image_url('teacher', $row->teacher_id) . '" class="img-circle" width="30" />';

                $nestedData['teacher_id'] = $row->teacher_id;
                $nestedData['photo'] = $photo;
                $nestedData['name'] = $row->name;
                $nestedData['email'] = $row->email;
                $nestedData['phone'] = $row->phone;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    function get_books()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $columns = array(
            0 => 'book_id',
            1 => 'name',
            2 => 'author',
            3 => 'description',
            4 => 'price',
            5 => 'class',
            6 => 'download',
            7 => 'book_id'
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->ajaxload->all_books_count();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $books = $this->ajaxload->all_books($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];
            $books =  $this->ajaxload->book_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->ajaxload->book_search_count($search);
        }

        $data = array();
        if (!empty($books)) {
            foreach ($books as $row) {
                if ($row->file_name == null)
                    $download = '';
                else
                    $download = '<a href="' . site_url("uploads/document/$row->file_name") . '" class="btn btn-blue btn-icon icon-left"><i class="entypo-download"></i>' . get_phrase('download') . '</a>';
                // $options = '<div class="btn-group"><button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                //    Action <span class="caret"></span></button><ul class="dropdown-menu dropdown-default pull-right" role="menu"><li><a href="#" onclick="book_edit_modal('.$row->book_id.')"><i class="entypo-pencil"></i>&nbsp;'.get_phrase('edit').'</a></li><li class="divider"></li><li><a href="#" onclick="book_delete_confirm('.$row->book_id.')"><i class="entypo-trash"></i>&nbsp;'.get_phrase('delete').'</a></li></ul></div>';

                $nestedData['book_id'] = $row->book_id;
                $nestedData['name'] = $row->name;
                $nestedData['author'] = $row->author;
                $nestedData['description'] = $row->description;
                $nestedData['price'] = $row->price;
                $nestedData['class'] = $this->db->get_where('class', array('class_id' => $row->class_id))->row()->name;
                $nestedData['download'] = $download;
                //$nestedData['options'] = $options;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    //Assignment 
    function create_assignment()
    {
        $page_data['page_name'] = 'add_assignment';
        $page_data['page_title'] = get_phrase('add_an_assignment');
        $this->load->view('backend/index', $page_data);
    }

    function manage_assignment($param1 = '', $param2 = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $running_year = get_settings('running_year');

        if ($param1 == '') {
            $match = array('status !=' => 'expired', 'running_year' => $running_year);
            $page_data['status'] = 'active';
            $this->db->order_by("exam_date", "dsc");
            $page_data['online_exams'] = $this->db->where($match)->get('online_exam')->result_array();
        }

        if ($param1 == 'expired') {
            $match = array('status' => 'expired', 'running_year' => $running_year);
            $page_data['status'] = 'expired';
            $this->db->order_by("exam_date", "dsc");
            $page_data['online_exams'] = $this->db->where($match)->get('online_exam')->result_array();
        }

        if ($param1 == 'create') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->create_online_exam();
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
                redirect(site_url('teacher/manage_assignment'), 'refresh');
            } else {
                $this->session->set_flashdata('error_message', get_phrase('make_sure_to_select_valid_class_') . ',' . get_phrase('_section_and_subject'));
                redirect(site_url('teacher/manage_assignment'), 'refresh');
            }
        }
        if ($param1 == 'edit') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->update_online_exam();
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(site_url('teacher/manage_assignment'), 'refresh');
            } else {
                $this->session->set_flashdata('error_message', get_phrase('make_sure_to_select_valid_class_') . ',' . get_phrase('_section_and_subject'));
                redirect(site_url('teacher/manage_assignment'), 'refresh');
            }
        }
        if ($param1 == 'delete') {
            $this->db->where('online_exam_id', $param2);
            $this->db->delete('online_exam');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('teacher/manage_assignment'), 'refresh');
        }
        $page_data['page_name'] = 'manage_online_exam';
        $page_data['page_title'] = get_phrase('manage_online_exam');
        $this->load->view('backend/index', $page_data);
    }

    //online exam
    function manage_online_exam($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $running_year = get_settings('running_year');

        if ($param1 == '') {
            $match = array('status !=' => 'expired', 'running_year' => $running_year);
            $page_data['status'] = 'active';
            $this->db->order_by("exam_date", "dsc");
            $page_data['online_exams'] = $this->db->where($match)->get('online_exam')->result_array();
        }

        if ($param1 == 'expired') {
            $match = array('status' => 'expired', 'running_year' => $running_year);
            $page_data['status'] = 'expired';
            $this->db->order_by("exam_date", "dsc");
            $page_data['online_exams'] = $this->db->where($match)->get('online_exam')->result_array();
        }

        if ($param1 == 'create') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->create_online_exam();
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
                redirect(site_url('teacher/manage_online_exam'), 'refresh');
            } else {
                $this->session->set_flashdata('error_message', get_phrase('make_sure_to_select_valid_class_') . ',' . get_phrase('_section_and_subject'));
                redirect(site_url('teacher/manage_online_exam'), 'refresh');
            }
        }
        if ($param1 == 'edit') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->update_online_exam();
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
                redirect(site_url('teacher/manage_online_exam'), 'refresh');
            } else {
                $this->session->set_flashdata('error_message', get_phrase('make_sure_to_select_valid_class_') . ',' . get_phrase('_section_and_subject'));
                redirect(site_url('teacher/manage_online_exam'), 'refresh');
            }
        }
        if ($param1 == 'delete') {
            $this->db->where('online_exam_id', $param2);
            $this->db->delete('online_exam');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('teacher/manage_online_exam'), 'refresh');
        }
        $page_data['page_name'] = 'manage_online_exam';
        $page_data['page_title'] = get_phrase('manage_online_exam');
        $this->load->view('backend/index', $page_data);
    }

    function get_class_section_selector($class_id)
    {
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/teacher/get_class_section_selector', $page_data);
    }

    function get_class_subject_selector($class_id)
    {
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/teacher/get_class_subject_selector', $page_data);
    }

    //load question type
    function load_question_type($type, $online_exam_id)
    {
        $page_data['question_type'] = $type;
        $page_data['online_exam_id'] = $online_exam_id;
        $this->load->view('backend/teacher/online_exam_add_' . $type, $page_data);
    }

    function load_question_type_ass( $online_exam_id)
    {
        //$page_data['question_type'] = $type;
        $page_data['online_exam_id'] = $online_exam_id;
        $this->load->view('backend/teacher/add_assignment' .  $page_data);
    }

    //delete questions
    function delete_question_from_online_exam($question_id)
    {
        $online_exam_id = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->online_exam_id;
        $this->crud_model->delete_question_from_online_exam($question_id);
        $this->session->set_flashdata('flash_message', get_phrase('question_deleted'));
        redirect(site_url('teacher/manage_online_exam_question/' . $online_exam_id), 'refresh');
    }

    function online_exam_questions_print_view($online_exam_id, $answers)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['online_exam_id'] = $online_exam_id;
        $page_data['answers'] = $answers;
        $page_data['page_title'] = get_phrase('questions_print');
        $this->load->view('backend/teacher/online_exam_questions_print_view', $page_data);
    }

    function create_online_exam()
    {
        $page_data['page_name'] = 'add_online_exam';
        $page_data['page_title'] = get_phrase('add_an_online_exam');
        $this->load->view('backend/index', $page_data);
    }


    function update_online_exam($param1 = "")
    {
        $page_data['online_exam_id'] = $param1;
        $page_data['page_name'] = 'edit_online_exam';
        $page_data['page_title'] = get_phrase('update_online_exam');
        $this->load->view('backend/index', $page_data);
    }

    function manage_online_exam_status($online_exam_id = "", $status = "")
    {
        $this->crud_model->manage_online_exam_status($online_exam_id, $status);
        redirect(site_url('teacher/manage_online_exam'), 'refresh');
    }

    function manage_online_exam_question($online_exam_id = "", $task = "", $type = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($task == 'add') {
            if ($type == 'multiple_choice') {
                $this->crud_model->add_multiple_choice_question_to_online_exam($online_exam_id);
            } elseif ($type == 'true_false') {
                $this->crud_model->add_true_false_question_to_online_exam($online_exam_id);
            } elseif ($type == 'fill_in_the_blanks') {
                $this->crud_model->add_fill_in_the_blanks_question_to_online_exam($online_exam_id);
            }
            redirect(site_url('admin/manage_online_exam_question/' . $online_exam_id), 'refresh');
        }

        $page_data['online_exam_id'] = $online_exam_id;
        $page_data['page_name'] = 'manage_online_exam_question';
        $page_data['page_title'] = $this->db->get_where('online_exam', array('online_exam_id' => $online_exam_id))->row()->title;
        $this->load->view('backend/index', $page_data);
    }

    function manage_assignment_question($online_exam_id = "", $task = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($task == 'add') {
            $this->crud_model->add_question_to_assignment($online_exam_id);
            redirect(site_url('admin/manage_online_exam_question/' . $online_exam_id), 'refresh');
        }

        $page_data['online_exam_id'] = $online_exam_id;
        $page_data['page_name'] = 'manage_online_exam_question';
        $page_data['page_title'] = $this->db->get_where('online_exam', array('online_exam_id' => $online_exam_id))->row()->title;
        $this->load->view('backend/index', $page_data);
    }
    function update_online_exam_question($question_id = "", $task = "", $online_exam_id = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');
        $online_exam_id = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->online_exam_id;
        $type = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->type;
        if ($task == "update") {
            if ($type == 'multiple_choice') {
                $this->crud_model->update_multiple_choice_question($question_id);
            } elseif ($type == 'true_false') {
                $this->crud_model->update_true_false_question($question_id);
            } elseif ($type == 'fill_in_the_blanks') {
                $this->crud_model->update_fill_in_the_blanks_question($question_id);
            }
            redirect(site_url('teacher/manage_online_exam_question/' . $online_exam_id), 'refresh');
        }
        $page_data['question_id'] = $question_id;
        $page_data['page_name'] = 'update_online_exam_question';
        $page_data['page_title'] = get_phrase('update_question');
        $this->load->view('backend/index', $page_data);
    }

    function view_online_exam_result($online_exam_id)
    {
        $page_data['page_name'] = 'view_online_exam_results';
        $page_data['page_title'] = get_phrase('result');
        $page_data['online_exam_id'] = $online_exam_id;
        $this->load->view('backend/index', $page_data);
    }
    function manage_multiple_choices_options()
    {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/admin/manage_multiple_choices_options', $page_data);
    }

    function get_sections_for_ssph($class_id)
    {
        $sections = $this->db->get_where('section', array('class_id' => $class_id))->result_array();
        $options = '';
        foreach ($sections as $row) {
            $options .= '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
        }
        echo '<select class="" name="section_id" id="section_id">' . $options . '</select>';
    }

    function get_students_for_ssph($class_id, $section_id)
    {
        $enrolls = $this->db->get_where('enroll', array('class_id' => $class_id, 'section_id' => $section_id))->result_array();
        $options = '';
        foreach ($enrolls as $row) {
            $name = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name;
            $options .= '<option value="' . $row['student_id'] . '">' . $name . '</option>';
        }
        echo '<select class="" name="student_id" id="student_id">' . $options . '</select>';
    }

    function get_payment_history_for_ssph($student_id)
    {
        $page_data['student_id'] = $student_id;
        $this->load->view('backend/admin/student_specific_payment_history_table', $page_data);
    }

    /****MANAGE PARENTS CLASSWISE*****/
    function parent($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'create') {
            $data['name']                    = html_escape($this->input->post('name'));
            $data['email']                   = html_escape($this->input->post('email'));
            $data['password']                = sha1($this->input->post('password'));
            if (html_escape($this->input->post('phone')) != null) {
                $data['phone'] = html_escape($this->input->post('phone'));
            }
            if (html_escape($this->input->post('address')) != null) {
                $data['address'] = html_escape($this->input->post('address'));
            }
            if (html_escape($this->input->post('profession')) != null) {
                $data['profession'] = html_escape($this->input->post('profession'));
            }
            $validation = email_validation($data['email']);
            if ($validation == 1) {
                $this->db->insert('parent', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
                $this->email_model->account_opening_email('parent', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            } else {
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }

            redirect(site_url('teacher/parent'), 'refresh');
        }
        if ($param1 == 'edit') {
            $data['name']                   = html_escape($this->input->post('name'));
            $data['email']                  = html_escape($this->input->post('email'));
            if (html_escape($this->input->post('phone')) != null) {
                $data['phone'] = html_escape($this->input->post('phone'));
            } else {
                $data['phone'] = null;
            }
            if (html_escape($this->input->post('address')) != null) {
                $data['address'] = html_escape($this->input->post('address'));
            } else {
                $data['address'] = null;
            }
            if (html_escape($this->input->post('profession')) != null) {
                $data['profession'] = html_escape($this->input->post('profession'));
            } else {
                $data['profession'] = null;
            }
            $validation = email_validation_for_edit($data['email'], $param2, 'parent');
            if ($validation == 1) {
                $this->db->where('parent_id', $param2);
                $this->db->update('parent', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('this_email_id_is_not_available'));
            }

            redirect(site_url('teacher/parent'), 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('parent_id', $param2);
            $this->db->delete('parent');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('teacher/parent'), 'refresh');
        }
        $page_data['page_title']     = get_phrase('all_parents');
        $page_data['page_name']  = 'parent';
        $this->load->view('backend/index', $page_data);
    }

    function get_parents()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        $columns = array(
            0 => 'parent_id',
            1 => 'name',
            2 => 'email',
            3 => 'phone',
            4 => 'profession',
            5 => 'options',
            6 => 'parent_id'
        );

        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->ajaxload->all_parents_count();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $parents = $this->ajaxload->all_parents($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];
            $parents =  $this->ajaxload->parent_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->ajaxload->parent_search_count($search);
        }

        $data = array();
        if (!empty($parents)) {
            foreach ($parents as $row) {

                $options = '<div class="btn-group"><button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                     Action <span class="caret"></span></button><ul class="dropdown-menu dropdown-default pull-right" role="menu"><li><a href="#" onclick="parent_edit_modal(' . $row->parent_id . ')"><i class="entypo-pencil"></i>&nbsp;' . get_phrase('edit') . '</a></li><li class="divider"></li><li><a href="#" onclick="parent_delete_confirm(' . $row->parent_id . ')"><i class="entypo-trash"></i>&nbsp;' . get_phrase('delete') . '</a></li></ul></div>';

                $nestedData['parent_id'] = $row->parent_id;
                $nestedData['name'] = $row->name;
                $nestedData['email'] = $row->email;
                $nestedData['phone'] = $row->phone;
                $nestedData['profession'] = $row->profession;
                $nestedData['options'] = $options;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    function tabulation_sheet($class_id = '', $exam_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = html_escape($this->input->post('exam_id'));
            $page_data['class_id']   = html_escape($this->input->post('class_id'));

            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0) {
                redirect(site_url('teacher/tabulation_sheet/' . $page_data['class_id'] . '/' . $page_data['exam_id']), 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose class and exam');
                redirect(site_url('teacher/tabulation_sheet'), 'refresh');
            }
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;

        $page_data['page_info'] = 'Exam marks';

        $page_data['page_name']  = 'tabulation_sheet';
        $page_data['page_title'] = get_phrase('tabulation_sheet');
        $this->load->view('backend/index', $page_data);
    }

    function tabulation_sheet_print_view($class_id, $exam_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(site_url('login'), 'refresh');
        $page_data['class_id'] = $class_id;
        $page_data['exam_id']  = $exam_id;
        $this->load->view('backend/teacher/tabulation_sheet_print_view', $page_data);
    }
}
