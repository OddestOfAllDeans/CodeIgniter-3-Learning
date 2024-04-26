<?php  

defined('BASEPATH') or exit('No thank you');
class Home extends CI_Controller {
    public function index() {
        $data = array(
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to the home page!',
            'page' => 'v_dashboard'
        );
        $this->load->view('v_template', $data, false);   
    }

    public function about() {
        $data = array( 
            'title' => 'About page',
            'goback' => 'Go back?'
        );
        $this->load->view('v_about', $data, false);
    }

    public function grades() {
        $this->load->view('v_grades');
    }
}

?>