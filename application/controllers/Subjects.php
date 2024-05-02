<?php 
defined('BASEPATH') or exit('go die bitch ass nigga');
class Subjects extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_subjects');
        $this->load->model('m_attendance');
        $this->load->model('m_students');
    }

    public function index() {
        $data = array(
            'title' => 'Subjects',
            'page' => 'students/v_subjects',
            'sbjcts' => $this->m_subjects->all_data()
        );
        $this->load->view('v_template', $data, false);
    }
    public function input_subject()
    {
        $this->form_validation->set_rules('subjects', 'Subject', 'required', [
            'required' => '%s Must be filled first to be able to input new class subject'
        ]);

        $this->form_validation->set_rules('time', 'Time', 'required', [
            'required' => 'The %s Must be filled first to be able to input new class subject'
        ]);

        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Subjects',
                'subtitle' => 'Welcome to the students page!',
                'page' => 'students/v_input_subject',
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $data = array(
                'subjects' => $this->input->post('subjects'),
                'time' => $this->input->post('time'),
            );
            $this->m_subjects->insert_data($data);
            $this->session->set_flashdata('message', 'New class subject has been added');
            redirect('Subjects/index');
        }
        
    }
    public function edit_subject($id) {

        $this->form_validation->set_rules('subjects', 'Subject', 'required', [
            'required' => '%s must be filled to complete the editing process'
        ]);

        $this->form_validation->set_rules('time', 'Time', 'required', [
            'required' => '%s must be filled to complete the editing process'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit subject',
                'sbjcts' => $this->m_subjects->detail_data($id),
                'page' => 'students/v_edit_subject'
            );
            $this->load->view('v_template', $data, false);
        } if ($old_data['subjects'] == $new_subjects && $old_data['time'] == $new_time) {
            $this->session->set_flashdata('message', 'No edits were done to the subject');
            redirect('subjects/index');} else {
            $data = array(
                'id' => $id,
                'subjects' => $this->input->post('subjects'),
                'time' => $this->input->post('time')
            );
            $this->m_subjects->update_data($data);
            $this->session->set_flashdata('message', 'The school subject has been updated');
            redirect('subjects/index');
        } 
    }
    public function delete_subjects($id){
        $data = array('id' => $id);
        $this->m_subjects->delete_data($data);
        $this->session->set_flashdata('message', "Class subject has sucessfully been deleted");
        redirect('subjects/index');
    }
    public function attendance() {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        $this->form_validation->set_rules('time', 'Time', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);


        
        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Attendance',
                'subtitle' => 'Attending a class subject',
                'page' => 'students/v_attendance',
                'attendance' => $this->m_attendance->all_data(),
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'attendance' => 'attend',
                'time' => $this->input->post('time'),
            );
            $this->m_attendance->insert_data($data);
            $this->session->set_flashdata('message', 'You have attended the class, enjoy your day!');
            redirect('subjects/index');
        }
        
    }
    public function absent() {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        $this->form_validation->set_rules('reason', 'Reason', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        $this->form_validation->set_rules('time', 'Time', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        
        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Student',
                'subtitle' => 'Welcome to the students page!',
                'page' => 'students/v_absent',
                'attendance' => $this->m_attendance->all_data(),
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'reason' => $this->input->post('reason'),
                'attendance' => 'absent',
                'time' => $this->input->post('time'),
            );
            $this->m_attendance->insert_data($data);
            $this->session->set_flashdata('message', 'You have taken an absent of the class subject, we hope you could attend soon, take care!');
            redirect('subjects/index');
        }
        
    
    }
    }


?>