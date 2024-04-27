<?php
defined('BASEPATH') or exit('Fuck you');
class Books extends CI_Controller {
    public function index() {
        $data = array(
            'title' => 'Books',
            'subtitle' => 'Welcome to the book page!',
            'page' => 'v_books'
        );
        $this->load->view('v_template', $data, false);   
    }
}

?>