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

        $mpdf = new mPDF ('utf-8', 'Letter', 0, '', -1, 0, 9, 0, 0, 0);

        $description = $this->load->view('description', null, true);
        $mpdf->WriteHTML($description);
        $mpdf->Output();
    }

}
