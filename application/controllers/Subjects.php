<?php 
defined('BASEPATH') or exit('go die bitch ass nigga');
class Subjects extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_subjects');
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
        $this->form_validation->set_rules('subject', 'Subject', 'required', [
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
        } else {
            $data = array(
                'id' => $id,
                'subject' => $this->input->post('subject'),
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
    }


?>