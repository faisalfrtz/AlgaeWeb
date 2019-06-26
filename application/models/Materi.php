<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Materi extends CI_Model {
	private $IdMateri;
	private $Nama;
	private $Kategori;
	private $Poin;
	private $Author;
	private $Pict;
	private $JumView;
	private $TglPost;
	private $IsAccept;
	private $SubmitBy;
	private $flag;

	function setIdMateri($IdMateri){
		$this->IdMateri = $IdMateri;
	}

	function getIdMateri(){
		return $this->IdMateri;
	}

	function setNama($Nama){
		$this->Nama = $Nama;
	}

	function getNama(){
		return $this->Nama;
	}

	function setKategori($Kategori){
		$this->Kategori = $Kategori;
	}

	function getKategori(){
		return $this->Kategori;
	}

	function setAuthor($Author){
		$this->Author = $Author;
	}

	function getAuthor(){
		return $this->Author;
	}

	function setPict($Pict){
		$this->Pict = $Pict;
	}

	function getPict(){
		return $this->Pict;
	}

	function setJumView($JumView){
		$this->JumView = $JumView;
	}

	function getJumView(){
		return $this->JumView;
	}

	function setTglPost($TglPost){
		$this->TglPost = $TglPost;
	}

	function getTglPost(){
		return $this->TglPost;
	}

	function setIsAccept($IsAccept){
		$this->IsAccept = $IsAccept;
	}

	function getIsAccept(){
		return $this->IsAccept;
	}

	function setSubmitBy($SubmitBy){
		$this->SubmitBy = $SubmitBy;
	}

	function getSubmitBy(){
		return $this->SubmitBy;
	}

	function setFlag($flag){
		$this->flag = $flag;
	}

	function getFlag(){
		return $this->flag;
	}

	function setPoin($Poin){
		$this->Poin = $Poin;
	}

	function getPoin(){
		return $this->Poin;
	}

	function getListMateri($pilihan = null,$data = null,$orderBy = 'DESC'){
		if($pilihan == null && $data == null){
			$this->db->where('Flag',1);	
		}
		else{
			$this->db->where('Flag',1);
			$this->db->where($pilihan,$data);
			$this->db->order_by($pilihan, $orderBy);
		}
		return $this->db->get('Materi');
	}

	function getMateri($idMateri){
		$this->db->where('idMateri',$idMateri);
		$row = $this->db->get('Materi')->row();
		if($row != null){
			$this->setter($row);
		}
		return $row;
	}


	function insert($data){
		$this->db->insert('Materi',$data);
		return $this->db->insert_id();
	}

	function update($data,$idMateri){
		$this->db->where('idMateri',$idMateri);
		return $this->db->update('Materi', $data);
	}

	function insertSlide($data){
		$this->db->insert('BagMateri',$data);
		return $this->db->insert_id();
	}

	function getMateriLimit($pilOrder,$limit,$offset,$orderBy = 'DESC'){
		$this->db->where('Flag',1);
		$this->db->order_by($pilOrder,$orderBy);	
		return $this->db->get('Materi',$limit,$offset);
	}

	function getMateriBy($pilihan,$data){
		$this->db->where($pilihan,$data);
		$row = $this->db->get('Materi')->row();
		if($row != null){
			$this->setter($row);
		}
		return $row;
	}

	function setter($row){
		$this->setIdMateri($row->idMateri);
		$this->setNama($row->Nama);
		$this->setKategori($row->Kategori);
		$this->setAuthor($row->Author);
		$this->setPict($row->Pict);
		$this->setJumView($row->JumView);
		$this->setTglPost($row->TglPost);
		$this->setIsAccept($row->IsAccept);
		$this->setSubmitBy($row->SubmitBy);
		$this->setFlag($row->Flag);
		$this->setPoin($row->Poin);
	}

	function isLearnedBy($email,$idMateri){
		$this->db->where('Flag',1);
		$this->db->where('isLearnedBy',$email);
		$this->db->where('idMateri',$idMateri);
		$row = $this->db->get('learnedBy')->row();
		if($row != null){
			$cek = true;
		}
		else{
			$cek = false;
			$data = array(
				'isLearnedBy' => $email,
				'idMateri' => $idMateri
				);
			$this->db->insert('learnedBy',$data);
		}
		return $cek;
	}

}