<?php if (!defined('BASEPATH')) exit('No direct script accsess allowed');

class Model_lahir extends CI_Model {
    public function tambah_lahir($data) {
        $this->db->insert('lahir', $data);
    }
    public function select_lahir(){
        $hasil=$this->db->get('lahir');
        if($hasil->num_rows()>0) {
            return $hasil->result();
        }
        else {
            return false;
        }
    }
    public function delete_lahir($nomor){
        $this->db->where('nomor', $nomor)->delete('lahir');
    }
    public function get_lahir_by_nomor($nomor){
        $hasil=$this->db->where('nomor', $nomor)
                    ->limit(1)
                    ->get('lahir');
     if($hasil->num_rows()>0){
        return $hasil->row();
     }
        else {
             return false;
         }
    }
    public function update_lahir($nomor, $data) {
        $this->db->where('nomor', $nomor)->update('lahir', $data);
    }
    function get_all_lahir($per_page,$page){
        $hasil = $this->db->get('lahir', $per_page,$page);
        if($hasil->num_rows()> 0){
            return $hasil->result();
        }
        else {
            return false;
        }
    }
   
}