<?php
defined('BASEPATH') or exit('Fuck you');
class Faculties extends CI_Controller {
    public function index() {
        $data = array(
            'title' => 'Faculties',
            'subtitle' => 'Welcome to the faculty page!',
            'page' => 'v_faculties'
        );
        $this->load->view('v_template', $data, false);   
    }
}

?>