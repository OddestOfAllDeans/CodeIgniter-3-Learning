<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Fpdf.php';

class Pdf extends FPDF {
    public function __construct() {
        parent::__construct();
    }
}
