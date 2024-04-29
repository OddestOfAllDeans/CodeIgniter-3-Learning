<?php 
defined('BASEPATH') or exit('go die bitch ass nigga');
class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_prodi');
    }

    public function index() {
        $data = array(
            'title' => 'Study Program',
            'page' => 'students/v_prodi',
            'prodi' => $this->m_prodi->all_data()
        );
        $this->load->view('v_template', $data, false);
    }
    public function input_prodi()
    {
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', [
            'required' => 'The %s Must be filled first to be able to input new class subject'
        ]);

        if ($this->form_validation->run() == FALSE) {
            
            $data = array(
                'title' => 'Input Study Program',
                'subtitle' => 'Welcome to the students page!',
                'page' => 'students/v_input_prodi',
            );
            $this->load->view('v_template', $data, false);   
        } else {
            $data = array(
                'prodi_id' => $this->input->post('prodi_id'),
                'prodi' => $this->input->post('prodi'),
            );
            $this->m_prodi->insert_data($data);
            $this->session->set_flashdata('message', 'New study program has been added');
            redirect('Prodi/index');
        }
        
    }
    public function edit_prodi($prodi_id) {
        $this->form_validation->set_rules('prodi', 'Prodi', 'required', [
            'required' => '%s must be filled to complete the editing process'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Edit subject',
                'prodi' => $this->m_prodi->detail_data($prodi_id),
                'page' => 'students/v_edit_prodi'
            );
            $this->load->view('v_template', $data, false);
        } else {
            $data = array(
                'prodi_id' => $prodi_id,
                'prodi' => $this->input->post('prodi'),
            );
            $this->m_prodi->update_data($data);
            $this->session->set_flashdata('message', 'The study program has been updated');
            redirect('prodi/index');
        }
    }
    public function delete_prodi($id){
        $data = array('prodi_id' => $id);
        $this->m_prodi->delete_data($data);
        $this->session->set_flashdata('message', "Study program has sucessfully been deleted");
        redirect('prodi/index');
    }
    }


?>