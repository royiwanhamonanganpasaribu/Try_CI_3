<?php if (!defined('BASEPATH')) exit('No direct script accsess allowed');

class Model_imb extends CI_Model {
    public function tambah_imb($data) {
        $this->db->insert('imb', $data);
    }
    public function select_imb(){
        $hasil=$this->db->get('imb');
        if($hasil->num_rows()>0) {
            return $hasil->result();
        }
        else {
            return false;
        }
    }
    public function delete_imb($nomor){
        $this->db->where('nomor', $nomor)->delete('imb');
    }
    public function get_imb_by_nomor($nomor){
        $hasil=$this->db->where('nomor', $nomor)
                    ->limit(1)
                    ->get('imb');
     if($hasil->num_rows()>0){
        return $hasil->row();
     }
        else {
             return false;
         }
    }
    public function update_imb($nomor, $data) {
        $this->db->where('nomor', $nomor)->update('imb', $data);
    }
    function get_all_imb($per_page,$page){
        $hasil = $this->db->get('imb', $per_page,$page);
        if($hasil->num_rows()> 0){
            return $hasil->result();
        }
        else {
            return false;
        }
    }
   
}