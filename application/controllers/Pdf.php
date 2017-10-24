<?php

class Pdf extends CI_Controller {

    private $user_info;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $this->load->library('mpdf60/mpdf.php');
        ob_start(); // inicia o buffer

        $mpdf = new mPDF ();
        //$mpdf->SetDefaultFontSize(100);
        //$mpdf->SetMargins(5, 5, 5);
        $mpdf->allow_charset_conversion = true;
        $mpdf->charset_in = 'UTF-8';
        $mpdf->margin_bottom_collapse = true;

        $description = $this->load->view('description', null, true);
        $mpdf->WriteHTML($description);
        $mpdf->Output();
    }

}
