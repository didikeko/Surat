<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends My_Controller {

    public function index(){
        $this->send_email();
    }
    public function send_email()
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'didikeko1997@gmail.com',
            'smtp_pass' => 'asdfpoiu98',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE

        );
        $message ='Helloword';
        $ci = get_instance();
        $ci->load->library('email', $config);
        //$this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('didikeko1997@gmail.com','asdfpoiu98');
        $this->email->to('aryaanggara123456@gmail.com');
        $this->email->subject('Subject : Send Email');
        $this->email->message($message);
        if ($this->email->send()) {
            echo "Email Sent";
        }
        else{
            show_error($this->email->print_debugger());
        }
    }

}
?>
