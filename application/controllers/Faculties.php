<?php
defined('BASEPATH') or exit('Fuck you');
class Faculties extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_faculties');
    }

    public function index() {
        $data = array(
            'title' => 'Faculties',
            'subtitle' => 'Welcome to the faculty page!',
            'page' => 'students/v_faculties',
            'fclts' => $this->m_faculties->all_data(),
        );
        $this->load->view('v_template', $data, false);   
    }
    
    public function input_faculty()
    {
        $this->form_validation->set_rules('faculty_name', 'Faculties', 'required', [
            'required' => '%s Must be filled first to be able to input new student data!'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Faculty',
                'subtitle' => 'Welcome to the insert faculty page!',
                'page' => 'students/v_input_faculties',
                'faculties' => $this->m_faculties->all_data(),
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $faculty_name = $this->input->post('faculty_name');
            if ($this->m_faculties->faculty_exists($faculty_name)) {
                $this->session->set_flashdata('error', 'This faculty already exists in the database!');
                redirect('Faculties/input_faculty');
        } else {
            $data = array(
                'faculty_id' => $this->input->post('faculty_id'),
                'faculty_name' => $faculty_name
            );
            $this->m_faculties->insert_data($data);
            $this->session->set_flashdata('message', 'New faculty has been inserted into the database!');
            redirect('Faculties/index');
        }
        }
        
    }
    public function edit_faculty($faculty_id) {
        
        $this->form_validation->set_rules('faculty_name', 'Faculty Name', 'required', [
            'required' => '%s must be filled to be able to edit student data'
        ]);

        if ($this->form_validation->run() == FALSE) {
        $data = array(
            'title' => 'Edit Faculty',
            'fclts' => $this->m_faculties->detail_data($faculty_id),
            'page' => 'students/v_edit_faculties',
            'faculties' => $this->m_faculties->all_data(),
        );
        $this->load->view('v_template', $data, false);
    } else {
        $faculty_name = $this->input->post('faculty_name');
        if ($this->m_faculties->faculty_exists($faculty_name, $faculty_id)) {
            $this->session->set_flashdata('error', 'This faculty already exists');
            redirect('Faculties/edit_faculty/' . $faculty_id);
        } else {
            $data = array(
                'faculty_id' => $faculty_id,
                'faculty_name' => $faculty_name,
            );
            $this->m_faculties->update_data($data);
            $this->session->set_flashdata('message', 'The faculty has been updated');
            redirect('Faculties/index');
        }
    }
}
    public function delete_faculty($id){
        $data = array('faculty_id' => $id);
        $this->m_faculties->delete_data($data);
        $this->session->set_flashdata('message', "Faculty data has sucessfully been deleted");
        redirect('faculties/index');
    }
}