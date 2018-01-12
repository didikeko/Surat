<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends My_Controller
{

	function __construct()
	{
        header('Content-type: application/json');
        parent::__construct();    
        $this->load->library('Curl');
        $this->load->database();
        $this->load->helper('url');
           $this->load->model('Login_model');
           $this->load->model('Surat_model');

          // $this->load->library('s00_lib_api');
    }
    public function login(){
        $this->load->library('Curl'); 
        $hasil_     = 'false';
        $postorget  = 'GET';
        $nama ='';
        $nim ='';
    //8f304662ebfee3932f2e810aa8fb628736
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        $auth = $this->input->get('auth');
        $api_url = 'http://service.uin-suka.ac.id/servad/adlogauthgr.php?aud='.$auth.'&uss='.$username.'&pss='.$password;

        $hasil = $this->curl->simple_get($api_url, false, array(CURLOPT_USERAGENT => true)); 
        $hasil = json_decode($hasil, true);
        echo json_encode($hasil);
    }

    // public function insert(){
    //     //=========================Menmapilkan================================
    //    // $query = $this->db->query('SELECT id, name, age FROM company');

    //    //  foreach ($query->result_array() as $row)
    //    //  {
    //    //          echo $row['id'];
    //    //          echo $row['name'];
    //    //          echo $row['age'];
    //    //  }
    //      //=========================Menmapilkan================================
    //      echo $this->Surat_model->cari_ttd(2);
    //     }
     
    
    public function get_mhs(){
        header('Content-Type: application/json');
        // echo $_GET['nama'];
        // echo "<br />";
        // echo $_GET['email'];
        $nim    = $_GET['nim'];
        //$sekarang   = DATE('d-m-y');
        $par1   = array($nim);
        $datar = $this->siaapi_getmhs('sia_public/sia_mahasiswa/data_search',26000,10,'api_search',$par1);
        $datrr = json_decode($datar,true);
        echo json_encode($datrr);
    }
    public function siaapi_getmhs($apiurl=null,$apikod=0,$apisub=0,$apitxt=null,$apisrc=array()){
        $aipisp = 'http://service.uin-suka.ac.id/';
        $ch = curl_init();
        $URL_API = $aipisp.'servsiasuper/'.$apiurl;
        $data = array('api_kode' => $apikod, 'api_subkode' => $apisub, $apitxt => $apisrc);
        curl_setopt($ch, CURLOPT_URL, $URL_API);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HeaderName: '.hash('sha256','tester01')));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        return $result;
    }
    //==================================================================================================================
    public function test(){
        error_reporting(0);
        //http://localhost/hmvc_example/mhs/api/test.php?kd_unit=UN02006&kd_fak=99&kd_kla=KM.02.02
        $unit_id = $_GET['kd_unit']; //SAINTEK
        $kd_penandatangan_surat = $_GET['kd_fak']; #Kepala Bagian Tata Usaha
        $kode_klasifikasi = $_GET['kd_kla']; #'LAPORAN STATUS MAHASISWA', untuk status aktif studi
        #$kode_klasifikasi = 'KS.02'; #'KETATAUSAHAAN', #penggantian ktm

        $kode_jenis_surat = '11'; #'SURAT KETERANGAN'
        
        $data_sk['UNIT_ID']                 = $unit_id;
        $data_sk['KD_STATUS_SIMPAN']        = 2;
        $data_sk['ID_PSD']                  = $kd_penandatangan_surat;
        $data_sk['ID_KLASIFIKASI_SURAT']    = $kode_klasifikasi;
        $data_sk['KD_JENIS_SURAT']          = $kode_jenis_surat;
        $data_sk['KD_KEAMANAN_SURAT']       = 'B';
        $data_sk['TGL_SURAT']               = date('d/m/Y');
        
        
        $api_url = 'http://service2.uin-suka.ac.id/servtnde/tnde_public/tnde_surat_keluar/penomoran/json';
        
        $parameter  = array('api_kode'      => 90002, 
                        'api_subkode'   => 3, 
                        'api_search'    => array($data_sk));

        $cekdoang   = $this->api_curl($api_url, $parameter, "POST");
        echo json_encode($cekdoang);
    }
     function api_curl($url,$post,$method){
        $username="12792860";
        $password="4908773573895678";
        //////////////
        if(strtoupper($method)=='POST'){
            $postdata = http_build_query($post);
            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded' . "\r\n"
                        .'Content-Length: ' . strlen($postdata) . "\r\n",
                    'content' => $postdata
                )
            );
            if($username && $password)
            {
                $opts['http']['header'] = ("Authorization: Basic " . base64_encode("$username:$password"));
            }
 
            $context = stream_context_create($opts);
            $hasil=file_get_contents($url, false, $context);
            return $hasil;
        }else{
            foreach($post as $key=>$value){
                $isi=$isi."/".$key."/$value/";
            }
            $url=$url.$isi;
            $context = stream_context_create(array(
                'http' => array(
                    'header'  => "Authorization: Basic " . base64_encode("$username:$password")
                )
            ));
            #echo "<p>$url</p>";
            $hasil=file_get_contents($url, false, $context);
            return $hasil;
        }
    }
    // function testing_api_cek()
    //     {
    //         $CI =& get_instance();
    //         $data = $CI->s00_lib_api->get_api_json(
    //              'http://service2.uin-suka.ac.id/servsimpeg/simpeg_public/simpeg_mix/data_search',
    //              'POST',
    //              array(
    //                  'api_kode'      => 1001,
    //                  'api_subkode'   => 4,
    //                  'api_search'    => array('06')
    //              )
    //         );
    // //         // $nip = '197701032005011003';
    // //         // //$url = tf_encode('FOTOTTD#'.$nip.'#QL:100#WM:1#SZ:300');
    // //         // //$tanggal = date('d-m-Y');
    // //         // $logo      = tg_encode('UK000002#'.$tanggal.'#QL:50#WM:0#SZ:150');
    // //         // //$data = '<img src="'.LOGO_UNIT_980.$url.'.jpg">';

    // //         // //return $data;
    //    }
	 
}
	
