<?php 
defined('BASEPATH') or exit('go die bitch ass nigga');
class Subjects extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
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
            'required' => '%s must be filled first to be able to input new class subject'
        ]);

        $this->form_validation->set_rules('time', 'Time', 'required', [
            'required' => 'The %s must be filled first to be able to input new class subject'
        ]);

        $this->form_validation->set_rules('day', 'Day', 'required', [
            'required' => 'The %s must be filled first to be able to input new class subject'
        ]);

        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Subjects',
                'subtitle' => 'Welcome to the students page!',
                'page' => 'students/v_input_subject',
                'sbjcts' => $this->m_subjects->all_data(),
                'days' => $this->m_subjects->get_enum_values('subjects', 'day')
            );
            $this->load->view('v_template', $data, false);
        } else {
            $subjects = $this->input->post('subjects');
            if ($this->m_subjects->subject_exists($subjects)) {
                $this->session->set_flashdata('error', 'This subject already exists');
                redirect('Subjects/input_subject');   
        } else {
            $data = array(
                'subjects' => $subjects,
                'time' => $this->input->post('time'),
                'day' => $this->input->post('day')
            );
            $this->m_subjects->insert_data($data);
            $this->session->set_flashdata('message', 'New class subject has been added');
            redirect('Subjects/index');
        }
      }  
    }
public function edit_subject($subject_id) {
    $this->form_validation->set_rules('subjects', 'Subject', 'required', [
        'required' => '%s must be filled to complete the editing process'
    ]);

    $this->form_validation->set_rules('time', 'Time', 'required', [
        'required' => '%s must be filled to complete the editing process'
    ]);

    $this->form_validation->set_rules('day', 'Day', 'required', [
        'required' => '%s must be filled to complete the editing process'
    ]);

    if ($this->form_validation->run() == FALSE) {
        $subject = $this->m_subjects->detail_data($subject_id);
        $data = array(
            'title' => 'Edit subject',
            'sbjs' => $subject,
            'page' => 'students/v_edit_subject',
            'days' => $this->m_subjects->get_enum_values('subjects', 'day'),
            'selected_day' => $subject->day // Passing the selected day to the view
        );
        $this->load->view('v_template', $data, false);
    } else {
        $subjects = $this->input->post('subjects');
        if ($this->m_subjects->subject_exists($subjects, $subject_id)) {
            $this->session->set_flashdata('error', 'This subject already exists');
            redirect('Subjects/edit_subject/' . $subject_id);        
        } else {
            $data = array(
                'subject_id' => $subject_id,
                'subjects' => $subjects,
                'time' => $this->input->post('time'),
                'day' => $this->input->post('day')
            );
            $this->m_subjects->update_data($data);
            $this->session->set_flashdata('message', 'The school subject has been updated');
            redirect('subjects/index');
        } 
    }
}

    public function delete_subjects($subject_id){
        $data = array('subject_id' => $subject_id);
        $this->m_subjects->delete_data($data);
        $this->session->set_flashdata('message', "Class subject has sucessfully been deleted");
        redirect('subjects/index');
    }
    public function attendance($subject_id) {
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Must be filled first to check the student data!'
        ]);
    
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Attendance',
                'subtitle' => 'Attending a class subject',
                'page' => 'students/v_attendance',
                'attendance' => $this->m_attendance->all_data(),
                'sbjcts' => $this->m_subjects->all_data(),
                'subject_id' => $subject_id
            );
            $this->load->view('v_template', $data, false);
        } else {
            $nim = $this->input->post('nim');
            $student = $this->m_students->get_student_by_nim($nim);
            
            if ($student) {
                $data = array(
                    'title' => 'Attendance',
                    'subtitle' => 'Attending a class subject',
                    'page' => 'students/v_attendance',
                    'attendance' => $this->m_attendance->all_data(),
                    'sbjcts' => $this->m_subjects->all_data(),
                    'subject_id' => $subject_id,
                    'student' => $student
                );
                $this->load->view('v_template', $data, false);
            } else {
                $this->session->set_flashdata('error', 'Invalid NIM. Please try again.');
                redirect('Subjects/attendance/' . $subject_id);
            }
        }
    }
    
    public function confirm_attendance($subject_id) {
        $nim = $this->input->post('nim');
        $student = $this->m_students->get_student_by_nim($nim);
        
        if ($student) {
            $data = array(
                'subject_id' => $subject_id,
                'name' => $student->name,
                'attendance' => 'attend',
                'time' => date('Y-m-d H:i:s'),
            );
            $this->m_attendance->insert_data($data);
            $this->session->set_flashdata('message', 'You have attended the class, enjoy your day!');
            redirect('Subjects/index');
        } else {
            $this->session->set_flashdata('error', 'Invalid NIM. Please try again.');
            redirect('Subjects/attendance/' . $subject_id);
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
                'subject_id' => $subject_id,
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