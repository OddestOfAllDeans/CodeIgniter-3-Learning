<?php
defined('BASEPATH') or exit('Fuck you');
class User extends CI_Controller {
    public function index() {
        $data = array(
            'title' => 'User',
            'subtitle' => 'Welcome to the user page!',
            'page' => 'v_user'
        );
        $this->load->view('v_template', $data, false);   
    }
}

?>