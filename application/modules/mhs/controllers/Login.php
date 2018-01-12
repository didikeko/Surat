<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Login extends My_Controller
{

  private $api_mhs = '/mhs/api/get_mhs.php?nim=';
	function __construct()
	{
		parent::__construct();    
        $this->load->database();
        $this->load->helper('url');
           $this->load->model('Login_model');
           $this->load->model('Surat_model');
	}
	function index()
	{
		$this->load->view('v_login');
	}
	public function haha(){
		$cab=$this->Login_model->cie();
    }
   
   public function aksi_login(){
        // $jsondata = file_get_contents(base_url().'/surat/admin/api_user');
        // $json = json_decode($jsondata,true);
        
        //var_dump($mahasiswa);
       
        //echo $mahasiswa[0]['NIM'];

    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
       // $pass = md5($password);
       $jsonku = file_get_contents(base_url().$this->api_mhs.$username);
       $mahasiswa = json_decode($jsonku,true);
        if ($username==$mahasiswa[0]['NIM']) {
            $data_session = array(
                
                'username' => $username,
                'nama'     => $mahasiswa[0]['NAMA'],
                'status'   => "login"
            );
            $this->session->set_userdata($data_session);
           
            redirect(base_url('mhs'));
        }
        else{
           redirect(base_url('login'));
        }
    }

    function logout(){
    	$this->session->sess_destroy();
    	redirect(base_url('login'));
    }


}
	
