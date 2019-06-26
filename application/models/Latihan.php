<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Latihan extends CI_Model {

	function getLatihanBy($pilihan = null,$data = null, $orderBy = 'DESC'){
		if($pilihan == null && $data == null){
			$this->db->where('Flag',1);	
		}
		else{
			$this->db->where('Flag',1);
			$this->db->where($pilihan,$data);
			$this->db->order_by($pilihan, $orderBy);
		}
		return $this->db->get('Soal');
	}

	function getDaftarSoal($idSoal){
		$this->db->where('Flag',1);
		$this->db->where('idSoal',$idSoal);
		return $this->db->get('daftarSoal');
	}

	function insert($data){
		$this->db->insert('Soal',$data);
		return $this->db->insert_id();
	}

	function update($data,$idSoal){
		$this->db->where('idSoal',$idSoal);
		return $this->db->update('Soal', $data);
	}

	function insertToDaftarSoal($data){
		$this->db->insert('daftarSoal',$data);
		return $this->db->insert_id();
	}

	function insertToNilai($data){
		$this->db->insert('daftarNilaiQuiz',$data);
	}

	function updateToNilai($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('daftarNilaiQuiz', $data);
	}

	function selectDaftarNilai($data){
		$this->db->where('Flag',1);
		$this->db->where($data);
		return $this->db->get('daftarNilaiQuiz');
	}

}