<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_students');
        $this->load->model('m_faculties');
        $this->load->model('m_prodi');
        $this->load->library('Pdf');
    }
    public function generate_student_pdf($students_id) {

        ob_start();
        $students = $this->m_students->detail_data2($students_id);

        if (!$students) {
            show_404();
            return;
        }

        $this->load->library('fpdf');
        $this->fpdf->AddPage();                
        
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Cell(0, 10, 'Student Details', 0, 1, 'C');
        $this->fpdf->Ln(10);
        
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(50, 10, 'Name:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['name'], 0, 1);
        
        $this->fpdf->Cell(50, 10, 'Student ID:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['nim'], 0, 1);
        
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(50, 10, 'Birthplace:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['birth_place'], 0, 1);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(50, 10, 'Birthdate:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['birth_date'], 0, 1);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(50, 10, 'Study Program:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['prodi'], 0, 1);

        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(50, 10, 'Faculty:', 0, 0);
        $this->fpdf->Cell(0, 10, $students['faculty_name'], 0, 1);

        $this->fpdf->Output('D', 'student_details.pdf');

        ob_end_flush();
    }
}    