<?php
class Surat_model extends CI_Model {
 
   // var $tabel = 'tb_barang';
  

    function __construct() {
        parent::__construct();
        $this->load->database();

    }

    function insert_company($data){
        return $this->db->insert('company', $data);
    }
    function insert_mhs($data){
        return $this->db->insert('mahasiswa', $data);
    }
    function insert_ttd($data){
        return $this->db->insert('ttd', $data);
    }
    function insert_surat($data){
        return $this->db->insert('history_surat', $data);
    }
    function cari_mhs($nim){
        $this->db->select('nim');
        $this->db->from('mahasiswa');
        $this->db->where('nim',$nim);
        return $this->db->get()->result();
       //return $query->row()->nim;
    }
    function cari_ttd($id_ttd){
        $this->db->select('penandatangan');
        $this->db->from('ttd');
        $this->db->where('id_ttd',$id_ttd);
        $query = $this->db->get();
        return $query->row()->penandatangan;
    }
    
   
    // function getAllItem() {
    //     $this->db->from($this->tabel);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function loaddata(){
    //     $sql = $this->db->query("select *from tb_barang")->result();
    //     echo json_encode($sql);
        
    // }
    // function loaddata_user(){
    //     $sql = $this->db->query("select *from admin")->result();
    //     echo json_encode($sql);
    // }
   
   
 
}
?>