<?php 

class Blog extends CI_Controller {
    public function index() {
        $this->load->view('for_blog/v_index');
    }

    public function comment() {
        echo "Stinks";
    }
}

?>