<?php 

defined('BASEPATH') or exit('go kill yourself');
class Mentors extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mentors');
    }
    public function index() {
        $data = array (
            'title' => 'Welcome to the mentors page',
            'page' => 'students/v_mentors',
            'mntrs' => $this->m_mentors->all_data()
        );
        $this->load->view('v_template', $data, false);
    }
    public function input_mentors()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Must be filled first to be able to input new mentor data!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '%s Must be filled first to be able to input new mentor data!'
        ]);
        $this->form_validation->set_rules('subject', 'Subjects', 'required', [
            'required' => '%s Must be filled first to be able to input new mentor data!'
        ]);
        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', [
            'required' => '%s Must be filled first to be able to input new mentor data!'
        ]);
        $this->form_validation->set_rules('birth_place', 'Birthplace', 'required', [
            'required' => '%s Must be filled first to be able to input new mentor data!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Input Mentor',
                'subtitle' => 'Welcome to the mentor page!',
                'page' => 'students/v_input_mentor'
            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'name' => $this->input->post('name'),
                'subject' => $this->input->post('subject'),
                'birth_date' => $this->input->post('birth_date'),
                'birth_place' => $this->input->post('birth_place'),
            );
            $this->m_mentors->insert_data($data);
            $this->session->set_flashdata('message', 'New mentor data has been inserted to the database!');
            redirect('mentors/index');
        }
    }
        public function edit_mentor($id) {
            $this->form_validation->set_rules('nim', 'NIM', 'required', [
                'required' => '%s must be filled to be able to edit new mentor data!'
            ]);
            $this->form_validation->set_rules('name', 'Name', 'required', [
                'required' => '%s must be filled to be able to edit new mentor data!'
            ]);
            $this->form_validation->set_rules('subject', 'Subject', 'required', [
                'required' => '%s must be filled to be able to edit new mentor data!'
            ]);
            $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', [
                'required' => '%s must be filled to be able to edit new mentor data!'
            ]);
            $this->form_validation->set_rules('birth_place', 'Birthplace', 'required', [
                'required' => '%s must be filled to be able to edit new mentor data!'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'title' => 'Edit mentor',
                    'mntrs' => $this->m_mentors->detail_data($id),
                    'page' => 'students/v_edit_mentor'
                );
                $this->load->view('v_template', $data, false);
            } else {
                $data = array(
                    'id' => $id,
                    'nim' => $this->input->post('nim'),
                    'name' => $this->input->post('name'),
                    'subject' => $this->input->post('subject'),
                    'birth_date' => $this->input->post('birth_date'),
                    'birth_place' => $this->input->post('birth_place'),
                );
                $this->m_mentors->update_data($data);
                $this->session->set_flashdata('message', "Mentor's data has been updated");
                redirect('mentors/index');
            }
        }
        public function delete_mentors($id){
            $data = array('id' => $id);
            $this->m_mentors->delete_data($data);
            $this->session->set_flashdata('message', "Mentor's data has sucessfully been deleted");
            redirect('mentors/index');
        }
        }

    


?>