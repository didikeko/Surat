<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*
*/
class Mhs extends My_Controller
{
    private $api_mhs = '/mhs/api/get_mhs.php?nim=';
    private $apinomor_unit  = '/mhs/api/test.php?kd_unit=';
    private $api_kdfak ='&kd_fak=';
    private $api_kdkla  ='&kd_kla=';
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login"){
           redirect(base_url("login"));
       }
		
        $this->load->model('Surat_model');
        $this->load->library('pdf_surat');
        $this->load->database();
        $this->load->helper('url');
       
    }
    function submenu($halaman){
        switch ($halaman) {
            case 'masih_kul' :
                return 'Surat Keterangan Masih Kuliah';
                break;
            case 'tdk_men_bea' :
                return 'Surat Keterangan Tidak Menerima Beasiswa';
                break;
            case 'kel_baik' :
                return 'Surat Keterangan Berkelakuan Baik';
                break;
            case 'bbs_teori' :
                return 'Surat Keterangan Bebas Teori';
                break;
            case 'ket_lulus' :
                return 'Surat Keterangan Lulus';
                break;
            case 'pndh_studi' :
                return 'Surat Keterangan Pindah Studi';
                break;
            case 'ijin_pen' :
                return 'Surat Ijin Penelitian';
                break;
            case 'ijin_studi_pen' :
                return 'Surat Studi Pendahuluan';
                break;
            case 'ijin_obs' :
                return 'Surat Ijin Observasi';
                break;
            case 'perm_KP' :
                return 'Surat Permohonan Kerja Praktik';
                break;
            default :
            return 'cetak_surat';
                break;
            }  
    }
    function status(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);
        return $mahasiswa[0]['NM_STATUS'];
    }
    function sks(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);
        return $mahasiswa[0]['SKS_KUM'];
    }
	function view($halaman = 'home'){
		$data['nama']     = $this->session->userdata('nama');
        $data['nim']     = $this->session->userdata('username');
        $data['title1'] = "Cetak Surat";
        $crumb['title1'] = "Cetak Surat";
        $crumb['submenu'] = $this->submenu($halaman);
		$data['submenu1'] = "Surat Keterangan Masih Kuliah";
		$data['submenu2'] = "Surat Keterangan Tidak Menerima Beasiswa";
		$data['submenu3'] = "Surat Keterangan Berkelakuan Baik";
		$data['submenu4'] = "Surat Keterangan Bebas Teori";
		$data['submenu5'] = "Surat Keterangan Telah Munaqosah";
		$data['submenu6'] = "Surat Keterangan Lulus";
		$data['submenu7'] = "Surat Keterangan Pindah Studi";
		$data['submenu8'] = "Surat Keterangan Reviewer Penelitian";
		$data['submenu9'] = "Surat Ijin Penelitian";
		$data['submenu10'] = "Surat Studi Pendahuluan";
		$data['submenu11'] = "Surat Ijin Validasi Instrumen";
		$data['submenu12'] = "Surat Ijin Observasi";
		$data['submenu13'] = "Surat Ijin Wawancara";
		$data['submenu14'] = "Surat Permohonan Kerja Praktik";
		$data['submenu15'] = "Surat Permohonan Beasiswa Kuliah";
		$data['submenu16'] = "Surat Permohonan Dispensasi Kuliah";
        $data['submenu17'] = "Surat Permohonan Data(Pengambilan Data)";
        
        $data['cuti'] = $this->status();
        $data['sks'] = $this->sks();
        $this->load->view('pages/header');
        
        if ($halaman=='home'){
             $this->load->view('pages/sidebar',$data);
             
        }
        else if ($halaman=='cetak_surat'){
            $this->load->view('pages/sub_sidebar',$data);
           
        }
        else{
            $this->load->view('pages/sub_sidebar',$data);
            $this->load->view('pages/crumbs',$crumb);
         }
        
        if($data['cuti'] != 'Aktif' && $halaman !='home' && $halaman != 'cetak_surat'){
            $this->load->view('pages/cuti',$data);
           
        }
        else if($halaman=='bbs_teori' && $this->sks() < 144 && $halaman !='home' && $halaman != 'cetak_surat'){
            $this->load->view('pages/sks',$data);
        }
        else{
            $this->load->view('pages/'.$halaman,$data);
            
        }

       
        $this->load->view('pages/footer');
	}
   
    public function print_aktifkuliah(){

        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        
        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'KM.00.4';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);
        
        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['tmp_lahir']= $mahasiswa[0]['TMP_LAHIR'];
        $data['tgl_lhr']= $mahasiswa[0]['TGL_LAHIR'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['thn_akademik']= date("Y");
        $data['keperluan'] = $this->input->post('perlu');
        $data['jenis_surat'] = 'SURAT KETERANGAN MASIH KULIAH';

        
        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
        $this->load->view('report/v_masihkuliah',$data);      

        
        
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
        // if(!$query){
        //     echo 'gagal insert history _surat';
            
        // }
        // else{
        //     echo "berhasil";
        // }

    }
    
     
     function print_lulus(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PP.01.2';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);
        

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['thn_akademik']= date("Y");
        $data['ipk']= $mahasiswa[0]['IP_KUM'];
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['jenis_surat'] = 'SURAT KETERANGAN LULUS';

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
        $this->load->view('report/v_lulus',$data);

        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
    }
    function print_studi_pen(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PN.01.1';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['thn_akademik']= date("Y");
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['jabatan'] = $this->input->post('jabatan');
        $data['inst'] = $this->input->post('instansi');
        $data['tmpt'] = $this->input->post('tempat');
        $data['tgl'] = $this->input->post('tgl');
        $data['judul'] = $this->input->post('judul');
        $data['jenis_surat']='SURAT PERMOHONAN STUDI PENDAHULUAN';
        

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];

        $this->load->view('report/v_studi_pen',$data);

        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat']
           // 'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
    }
    function print_tdk_bea(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'KM.02.2';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['thn_akademik']= date("Y");
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['isi'] = $this->input->post('bea');
        $data['jenis_surat']='SURAT KETERANGAN TIDAK SEDANG MENERIMA BEASISWA';
       
        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];

        $this->load->view('report/v_tdk_bea',$data);
        
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat']
           // 'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
    }
    function print_kp(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PP.08.1';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['jabatan'] = $this->input->post('jabatan');
        $data['inst'] = $this->input->post('instansi');
        $data['tmpt'] = $this->input->post('tempat');
        $data['minat'] = $this->input->post('minat'); 
        $data['jenis_surat']='SURAT PERMOHONAN KERJA PRAKTEK';   

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];

        $this->load->view('report/v_kp',$data);
        
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat']
           // 'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);

    }
    function print_obs(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PP.05.3';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['thn_akademik']= date("Y");
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['kepada'] = $this->input->post('jabatan');
        $data['instansi'] = $this->input->post('inst');
        $data['tempat'] = $this->input->post('tempat');
        $data['mtkuliah'] = $this->input->post('mtkuliah');
        $data['tgl'] = $this->input->post('tgl');
        $data['jenis_surat']='SURAT IJIN OBSERVASI';



        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];

        
        $data['nimA']=$this->input->post('mhsa');
        $jsonka = file_get_contents(base_url().$this->api_mhs.$data['nimA']);
        $mahasiswaA = json_decode($jsonka,true);
        $data['namaA']= $mahasiswaA[0]['NAMA'];

        $data['nimB']=$this->input->post('mhsb');
        $jsonkb = file_get_contents(base_url().$this->api_mhs.$data['nimB']);
        $mahasiswaB = json_decode($jsonkb,true);
        $data['namaB']= $mahasiswaB[0]['NAMA'];

        $this->load->view('report/v_obs',$data);
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat']
           // 'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);

    }
    function print_pindah(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'KM.002';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);
        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['thn_akademik']= date("Y");
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['isi'] = $this->input->post('content');
        $data['masuk']= $mahasiswa[0]['TGL_MASUK'];

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
        $data['jenis_surat']='SURAT KETERANGAN PINDAH STUDI';
        $this->load->view('report/v_pindah',$data);
        
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
    }
    function print_hbs_teori(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        
        $mahasiswa = json_decode($jsonku,true);
         
        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PP.01.1';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['alamat']= $mahasiswa[0]['MAHASISWA'];
        $data['telp']= $mahasiswa[0]['HP_MHS'];
        $data['ip']= $mahasiswa[0]['IP_KUM'];

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
        $data['jenis_surat']= 'SURAT KETERANGAN BEBAS TEORI';
        $data['pengecek'] = $this->input->post('pengecek');
        $this->load->view('report/v_hbs_teori',$data);

        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);

    }
    function print_penelitian(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);
        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'PN.01.1';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['thn_akademik']= date("Y");
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['kepada'] = $this->input->post('kepada');
        $data['tempat'] = $this->input->post('tempat');
        $data['instansi'] = $this->input->post('instansi');
        $data['judul'] = $this->input->post('judul');
        $data['metode'] = $this->input->post('metode');
        $data['tmpt_penelitian'] = $this->input->post('tmpt_penelitian');
        $data['tgl_mulai'] = date("d-m-Y", strtotime($this->input->post('tgl_mulai')));
        $data['tgl_berakhir'] = date("d-m-Y", strtotime($this->input->post('tgl_berakhir')));
        $data['jenis_surat'] = 'SURAT IJIN PENELITIAN';

        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
       
        $this->load->view('report/v_penelitian',$data);
        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);
    }
    function print_kelbaik(){
        $jsonku = file_get_contents(base_url().$this->api_mhs.$this->session->userdata('username'));
        $mahasiswa = json_decode($jsonku,true);

        $kd_fak = $mahasiswa[0]['KD_FAK'];
        $kd_kla  = 'KM.02.2';
        $id_ttd = $this->get_idttd($kd_fak, $kd_kla);
        $data['ttd'] = $this->Surat_model->cari_ttd($id_ttd);
        $data['kop_tlp'] = $this->tlp($kd_fak);
        $data['kop_web'] = $this->web($kd_fak);
        $data['kop_fkl'] = $mahasiswa[0]['NM_FAK_J'];
        $data['kd_psd']  = $this->kd_psd($kd_fak,$kd_kla);
        $kd_unit= $this->kd_unit($kd_fak);

        $data['nama']= $mahasiswa[0]['NAMA'];
        $data['nim']= $mahasiswa[0]['NIM'];
        $data['smt']= $mahasiswa[0]['JUM_SMT'];
        $data['prodi']= $mahasiswa[0]['NM_PRODI'];
        $data['fkl']= $mahasiswa[0]['NM_FAK'];
        $data['thn_akademik']= date("Y");
        $data['jenis_surat'] = 'SURAT KETERANGAN KELAKUAN BAIK';


        $jsondata = file_get_contents(base_url().$this->apinomor_unit.$kd_unit.$this->api_kdfak.$data['kd_psd'].$this->api_kdkla.$kd_kla);
        $m = json_decode($jsondata);
        $y = json_decode($m,true);
        
        $no_urut = $y['NO_URUT'];
        $a=explode("/", $y['NO_SURAT']);
        $un_no= $a[1];
        $psd = $a[2];
        $data['dd'] = date("d");
        $mm = $a[4];
        $data['bulan'] = $this->ubah_bulan($a[4]);
        $data['yy'] = $a[5];
        $data['nomor'] = 'B-'.$no_urut.'/'.$un_no.'/'.$psd.'/'.$kd_kla.'/'.$mm.'/'.$data['yy'];
      
        $this->load->view('report/v_kelbaik',$data);

        $sqlmhs= $this->Surat_model->cari_mhs($mahasiswa[0]['NIM']);
        if (!$sqlmhs){
            $datamhs = array(
                        'nim' => $mahasiswa[0]['NIM'],
                        'nama' => $data['nama'],
                        'prodi' => $data['prodi'],
                    );
                    $this->Surat_model->insert_mhs($datamhs);
                   // echo "data baru saja dibuat";
        }
        $surat= array(
            'nomor' => $data['nomor'],
            'nim'   => $mahasiswa[0]['NIM'],
            'id_ttd' => $id_ttd,
            'jenis_surat' => $data['jenis_surat'],
            'ket' => $data['keperluan']
        );
        $query=$this->Surat_model->insert_surat($surat);

    }
//======================================================================================================

    
    public function mhs(){
        //$x=$this->carimhs("15650051")
        $jsonku = file_get_contents(base_url().'/surat/mahasiswa/get_mhs');
        $mahasiswa = json_decode($jsonku,true);
        //var_dump($mahasiswa);
        //  $data['nama']= $mahasiswa[0]['NAMA'];
        // $data['nim']= $mahasiswa[0]['NIM'];
        //  $this->load->view('report/v_test',$data);

    }
    public function get_nomor(){
         $jsondata = file_get_contents(base_url().'/surat/mahasiswa/test');
     
        $mahasiswa = json_decode($jsondata);
      
        $y = json_decode($mahasiswa,true);
        $data['no_urut'] = $y['NO_URUT'];
        $data['un_no'] = $a[1];
        $data['tst'] = $a[2];
        $data['dd'] = date("d");
        $data['mm'] = $a[4];
        $data['yy'] = $a[5];

      //  var_dump($y);
      //  echo "Berhasillll<br>";
      //  echo $y['NO_URUT'].'<br>';
      //  echo $y['NO_SELA'].'<br>';
      //  $a=explode("/", $y['NO_SURAT']);
      //  echo $a[0].'<br>';
      //  echo $a[1].'<br>';
      //  echo $a[2].'<br>';
      // // echo $a[3].'<br>';
      //  echo $a[4].'<br>';
      //  echo $a[5].'<br>';
    }
    public function ubah_bulan($mm){
        switch ($mm) {
        case 1 :
            return "Januari";
            break;
        case 2 :
            return "Februari";
            break;
        case 3 :
            return "Maret";
            break;
        case 4 :
            return "April";
            break;
        case 5 :
            return "Mei";
            break;
        case 6 :
            return "Juni";
            break;
        case 7 :
            return "Juli";
            break;
        case 8 :
            return "Agustus";
            break;
        case 9 :
            return "September";
            break;
        case 10 :
            return "Oktober";
            break;
        case 11 :
            return "November";
            break;
        case 12 :
            return "Desember";
            break;
        default :
            return 0;
            break;
        }
    }
    function get_idttd($kd_fak, $kd_sk){
        switch ($kd_fak) {
            case 01:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 2;
                     }
                
                else{
                    return 5;
                }
                break;
            case 02:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 7;
                     }
                else{
                    return 10;
                }
                break;
            case 03:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 12;
                     }
                else{
                    return 15;
                }
                break;
            case 04:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 17;
                     }
                else{
                    return 20;
                }
                break;
            case 05:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 22;
                     }
                else{
                    return 25;
                }
                break;
            case 06:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 27;
                     }
                
                else{
                    return 30;
                }
                break;
            case 07:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 32;
                     }
                else{
                            return 35;
                }
                break;

          
            default:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return 37;
                     }
                else{
                            return 40;
                }
           
                break;
        }
          
    }
   public function kd_unit($kd_fak){
        switch ($kd_fak) {
            case 01:
                return 'UN02001';
                break;
            case 02:
                return 'UN02002';
                break;
            case 03:
                return 'UN02003';
                break;
            case 04:
                return 'UN02004';
                break;
            case 05:
                return 'UN02005';
                break;
            case 06:
                return 'UN02006';
                break;
            case 07:
                return 'UN02007';
                break;
            default:
                return 'UN02008';
                break;
        }

    }
    public function tlp($kd_fak){
        switch ($kd_fak) {
            case 01:
                return 'Telepon (0274) 513949 Faksimili (0274) 552883';
                break;
            case 02:
                return 'Telepon (0274) 515856 Faksimili (0274) 552230';
                break;
            case 03:
                return 'Telepon (0274) 512840 Faksimili (0274) 545614';
                break;
            case 04:
                return 'Telepon (0274) 513056 Faksimili (0274) 519734';
                break;
            case 05:
                return 'Telepon (0274) 512156 Faksimili (0274) 512156';
                break;
            case 06:
                return 'Telepon (0274) 519739 Faksimili (0274) 540971';
                break;
            case 07:
                return 'Telepon (0274) 585300 Faksimili (0274) 519571';
                break;
            default:
                return 'Telepon (0274) 545411 Faksimili (0274) 586117';
                break;
        }

    }
     public function kd_psd($kd_fak,$kd_sk){
        switch ($kd_fak) {
            case 01:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '84';
                     }
                
                else{
                    return '71';
                }
                break;
            case 02:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '87';
                     }
                else{
                    return '72';
                }
                break;
            case 03:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '90';
                     }
                else{
                    return '73';
                }
                break;
            case 04:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '93';
                     }
                else{
                    return '74';
                }
                break;
            case 05:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '96';
                     }
                else{
                    return '75';
                }
                break;
            case 06:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '99';
                     }
                else{
                    return '76';
                }
                break;
            case 07:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '102';
                     }
                else{
                            return '77';
                }
                break;

          
            default:
                if ($kd_sk == 'KM.02.02' || $kd_sk == 'PP.08.1' || $kd_sk == 'PN.01.01' || 
                    $kd_sk == 'PP.01.2'  || $kd_sk == 'PP.05.3' || $kd_sk == 'KM.002'){
                            return '105';
                     }
                else{
                            return '78';
                }
           
                break;
        }
    }
    public function web($kd_fak){
        switch ($kd_fak) {
            case 01:
                return 'website: http://adab.uin-suka.ac.id';
                break;
            case 02:
                return 'website: http://dakwah.uin-suka.ac.id';
                break;
            case 03:
                return 'website: http://syariah.uin-suka.ac.id';
                break;
            case 04:
                return 'website: http://tarbiyah.uin-suka.ac.id';
                break;
            case 05:
                return 'website: http://ushuluddin.uin-suka.ac.id';
                break;
            case 06:
                return 'website: http://saintek.uin-suka.ac.id';
                break;
            case 07:
                return 'website: http://fishum.uin-suka.ac.id';
                break;
            default:
                return 'website: http://febi.uin-suka.ac.id';
                break;
        }

    }
	}
	
