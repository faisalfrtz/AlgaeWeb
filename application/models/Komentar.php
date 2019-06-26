<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Komentar extends CI_Model {
	private $idKomentar;
	private $idMateri;
	private $Isi;
	private $TglKomen;
	private $Author;
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
		return $this->db->get('Komentar');
	}

	function getListForum($pilihan = null,$data = null,$orderBy = 'DESC'){
		if($pilihan == null && $data == null){
			$this->db->where('Flag',1);	
		}
		else{
			$this->db->where('Flag',1);
			$this->db->where($pilihan,$data);
			$this->db->order_by($pilihan, $orderBy);
		}
		return $this->db->get('KomentarForum');
	}

	function insertToForum($data){
		$this->db->insert('KomentarForum',$data);
	}

	function getKomenForum($idKomentar){
		$this->db->where('Flag',1);
		$this->db->where('idKomentar',$idKomentar);
		return $this->db->get('KomentarForum')->row();
	}

	function getLikeCommForum($idKomentar,$Email){
		$this->db->where('Flag',1);
		$this->db->where('idKomentar',$idKomentar);
		$this->db->where('Email',$Email);
		return $this->db->get('KomenLikeBy')->row();
	}

	function giveLikeCommForum($data){
		$this->db->where('Flag',1);
		$row = $this->getLikeCommForum($data['idKomentar'],$data['Email']);
		if($row != null){
			if($row->Value != $data['Value']){
				$this->db->where('idKomentar',$data['idKomentar']);
				$this->db->where('Email',$data['Email']);
				$this->db->update('KomenLikeBy',$data);
				$cek = true;
			}
			else{
				$cek = false;
			}
		}
		else{
			$this->db->insert('KomenLikeBy',$data);
			$cek = true;
		}
		return $cek;
	}

	function updateKomenForum($data,$idKomentar){
		$this->db->where('idKomentar',$idKomentar);
		return $this->db->update('KomentarForum',$data);
	}

}