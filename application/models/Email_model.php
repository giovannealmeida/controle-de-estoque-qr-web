<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_host'] = 'br784.hostgator.com.br';
        $config['smtp_user'] = 'no-reply@akijob.com.br';
        $config['smtp_pass'] = 'vers@kijob';
        $config['smtp_port'] = '465';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from('no-reply@akijob.com.br', 'iKing');
    }

    public function send($to, $subject, $message) {
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $result = $this->email->send();
        if (!$result) {
            return false;
        }
        return true;
    }

    public function send_forgotten_password($email, $hash) {
        $data["hash"] = $hash;
        $emailTemplate = $this->load->view("email_forgot_password", $data, TRUE);
        return $this->send($email, '[iKing] Recuperar senha', $emailTemplate);
    }

    public function send_publication($email, $publication) {
        $this->email->to($email);
        $this->email->subject('Publicação');
        $this->email->message($publication->description . "<br/><br/><br/>Em anexo se encontra a imagem para publicação e o QrCode para gerar o desconto");
        $this->email->attach($publication->image);
        $this->email->attach($publication->qr_code);

        $result = $this->email->send();
        if (!$result) {
            return false;
        }
        return true;
    }

}
