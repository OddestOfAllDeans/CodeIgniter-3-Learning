<?php
defined('BASEPATH') or exit('Fuck you');
class Students extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_students');
        $this->load->model('m_faculties');
        $this->load->model('m_prodi');
    }

    public function index() {
        $data = array(
            'title' => 'Students',
            'subtitle' => 'Welcome to the students page!',
            'page' => 'students/v_students',
            'stds' => $this->m_students->all_data(),
        );
        $this->load->view('v_template', $data, false);   
    }
    
    public function input_student()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        $this->form_validation->set_rules('birth_place', 'Birthplace', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        $this->form_validation->set_rules('nim', 'Gender', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        $this->form_validation->set_rules('faculty_id', 'Faculties', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);

        $this->form_validation->set_rules('prodi_id', 'Study Program', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Student',
                'subtitle' => 'Welcome to the students page!',
                'page' => 'students/v_input_student',
                'faculties' => $this->m_faculties->all_data(),
                'prodi' => $this->m_prodi->all_data(),
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $data = array(
                'nim' => $this->input->post('nim'),
                'name' => $this->input->post('name'),
                'birth_place' => $this->input->post('birth_place'),
                'birth_date' => $this->input->post('birth_date'),
                'gender' => $this->input->post('gender'),
                'faculty_id' => $this->input->post('faculty_id'),
                'prodi_id' => $this->input->post('prodi_id'),
            );
            $this->m_students->insert_data($data);
            $this->session->set_flashdata('message', 'New student data has been inserted into the database!');
            redirect('students/index');
        }
        
    }
    public function edit_students($id) {
        $this->form_validation->set_rules('nim', 'NIM', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);
        
        $this->form_validation->set_rules('birth_place', 'Birthplace', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);
        
        $this->form_validation->set_rules('birth_date', 'Birthdate', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);
        
        $this->form_validation->set_rules('gender', 'Gender', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);
        
        $this->form_validation->set_rules('faculty_id', 'Faculties', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);
        
        $this->form_validation->set_rules('prodi_id', 'Study Program', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);

        if ($this->form_validation->run() == FALSE) {
        $data = array(
            'title' => 'Edit student',
            'stds' => $this->m_students->detail_data($id),
            'page' => 'students/v_edit_student',
            'faculties' => $this->m_faculties->all_data(),
            'prodi' => $this->m_prodi->all_data(),
        );
        $this->load->view('v_template', $data, false);
    } else {
        $data = array(
            'id' => $id,
            'nim' => $this->input->post('nim'),
            'name' => $this->input->post('name'),
            'birth_place' => $this->input->post('birth_place'),
            'birth_date' => $this->input->post('birth_date'),
            'gender' => $this->input->post('gender'),
            'faculty_id' => $this->input->post('faculty_id'),
            'prodi_id' => $this->input->post('prodi_id'),
        );
        $this->m_students->update_data($data);
        $this->session->set_flashdata('message', "The student's data has been updated");
        redirect ('students/index');
    }
    }
    public function delete_student($id){
        $data = array('id' => $id);
        $this->m_students->delete_data($data);
        $this->session->set_flashdata('message', "Student's data has sucessfully been deleted");
        redirect('students/index');
    }
    public function print() {
        $data['students'] = $this->m_students->show_data('students')->result();
        $this->load->view('students/v_print_student', $data, FALSE);
        $data = array(
        'faculties' => $this->m_faculties->all_data(),
        'prodi' => $this->m_prodi->all_data(),
        );
    
    }
}

?>