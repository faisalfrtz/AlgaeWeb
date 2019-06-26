<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Model {
	private $tipe;
	private $email;
	private $password;
	private $nama;
	private $Gender;
	private $pict;
	private $level;
	private $umur;
	private $alamat;
	private $totPoin;
	private $title;
	private $pekerjaan;
	private $flag;

	function setTipe($tipe){
		$this->tipe = $tipe;
	}

	function getTipe(){
		return $this->tipe;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function getEmail(){
		return $this->email;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getPassword(){
		return $this->password;
	}

	function setNama($nama){
		$this->nama = $nama;
	}

	function getNama(){
		return $this->nama;
	}

	function setGender($Gender){
		$this->Gender = $Gender;
	}

	function getGender(){
		return $this->Gender;
	}

	function setPict($pict){
		$this->pict = $pict;
	}

	function getPict(){
		return $this->pict;
	}

	function setLevel($level){
		$this->level = $level;
	}

	function getLevel(){
		return $this->level;
	}

	function setUmur($umur){
		$this->umur = $umur;
	}

	function getUmur(){
		return $this->umur;
	}

	function setAlamat($alamat){
		$this->alamat = $alamat;
	}

	function getAlamat(){
		return $this->alamat;
	}

	function setTotPoin($totPoin){
		$this->totPoin = $totPoin;
	}

	function getTotPoin(){
		return $this->totPoin;
	}

	function setTitle($title){
		$this->title = $title;
	}

	function getTitle(){
		return $this->title;
	}

	function setPekerjaan($pekerjaan){
		$this->pekerjaan = $pekerjaan;
	}

	function getPekerjaan(){
		return $this->pekerjaan;
	}

	function setFlag($flag){
		$this->flag = $flag;
	}

	function getFlag(){
		return $this->flag;
	}

	function getListUser(){
		$this->db->where('Flag',1);
		return $this->db->get('User');
	}

	function getListUserBy($pilihan){
		$this->db->where('Flag',1);
		$this->db->where($pilihan);
		return $this->db->get('User');
	}

	function getUser($email){
		$this->db->where('Email',$email);
		$row = $this->db->get('User')->row();
		if($row != null){
			$this->setter($row);
		}
		return $row;
	}

	function cekTitle($email){
		$user = new User();
		$row = $user->getUser($email);
		$totPoin = $user->getTotPoin();
		$title = null;
		if($totPoin <= 50){
			$title = 'Newbie';
		}
		elseif($totPoin <= 150) {
			$title = 'Newbie Senior';
		}
		elseif($totPoin <= 200) {
			$title = 'Senior';
		}
		elseif($totPoin <= 300) {
			$title = 'Expert';
		}
		else{
			$title = 'Expert Pisan';
		}
		$data['title'] = $title;
		$data['level'] = round($totPoin/20);
		return $data;
	}

	function update($data,$Email){
		$dataArr = $this->cekTitle($Email);
		$data2 = array('Title'=>$dataArr['title'],'Level'=>$dataArr['level']);
		$new = array_merge($data,$data2);
		$this->db->where('Email',$Email);
		$this->db->update('User',$new);
		$this->getUser($Email);
	}

	function insert($data){
		return $this->db->insert('User',$data);
	}

	function delete($Email){
		$this->db->where('Email',$Email);
		$data = array('Flag'=> 0);
		return $this->db->update('User',$data);
	}

	function setter($row){
		$this->setTipe($row->Tipe);
		$this->setEmail($row->Email);
		$this->setPassword($row->Password);
		$this->setNama($row->Nama);
		$this->setGender($row->Gender);
		$this->setPict($row->Pict);
		$this->setLevel($row->Level);
		$this->setUmur($row->Umur);
		$this->setAlamat($row->Alamat);
		$this->setTotPoin($row->TotPoin);
		$this->setTitle($row->Title);
		$this->setPekerjaan($row->Pekerjaan);
		$this->setFlag($row->Flag);
	}

}