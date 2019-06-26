<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class BagMateri extends CI_Model {
    private $idBagMateri;
    private $idMateri;
    private $Nomor;
    private $Deskripsi;
    private $Gambar;
    private $Flag;

    function getList($pilihan = null,$data = null,$orderBy = 'DESC'){
        if($pilihan == null && $data == null){
            $this->db->where('Flag',1);
        }
        else{
            $this->db->where('Flag',1);
            $this->db->where($pilihan,$data);
            $this->db->order_by($pilihan, $orderBy);
        }
        return $this->db->get('BagMateri');
    }
}

?>