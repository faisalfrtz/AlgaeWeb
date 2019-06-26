<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Forum extends CI_Model {

	function getList($pilihan = null,$data = null,$orderBy = 'DESC'){
		if($pilihan == null && $data == null){
			$this->db->where('Flag',1);	
		}
		else{
			$this->db->where('Flag',1);
			$this->db->where($pilihan,$data);
			$this->db->order_by($pilihan, $orderBy);
		}
		return $this->db->get('Forum');
	}

	function getListLimit($limit,$offset,$pilihan = null,$data = null,$orderBy = 'DESC'){
		if($pilihan == null && $data == null){
			$this->db->where('Flag',1);	
		}
		else{
			$this->db->where('Flag',1);
			$this->db->where($pilihan,$data);
			$this->db->order_by($pilihan, $orderBy);
		}
		return $this->db->get('Forum',$limit,$offset);
	}

	function getListOrderBy($pilOrder,$limit,$offset,$orderBy = 'DESC'){
		$this->db->where('Flag',1);	
		$this->db->order_by($pilOrder,$orderBy);	
		return $this->db->get('Forum',$limit,$offset);
	}

	public function getForum($idForum){
		$this->db->where('Flag',1);
		$this->db->where('idForum',$idForum);
		return $this->db->get('Forum')->row();
	}

	public function isRatedBy($Email,$idForum){
		$this->db->where('Flag',1);
		$this->db->where('RatedBy',$Email);
		$this->db->where('idForum',$idForum);
		$row = $this->db->get('ForumRate')->row();
		if($row != null){
			$cek = 1;
		}
		else{
			$cek = 0;
		}
		return $cek;
	}

	function update($data,$idForum){
		$this->db->where('idForum',$idForum);
		return $this->db->update('Forum',$data);
	}

	function insert($data){
		$this->db->insert('Forum',$data);
		return $this->db->insert_id();
	}

	public function rate($data){
		if(!$this->isRatedBy($data['RatedBy'],$data['idForum'])) {
			//insert ForumRate
			$this->db->insert('ForumRate',$data);
		}
		else{
			//update ForumRate
			$this->db->where('idForum',$data['idForum']);
			$this->db->where('RatedBy',$data['RatedBy']);
			$this->db->update('ForumRate',$data);
		}
		//update rate in Forum
		$rate = $this->countRate($data['idForum']);
		$dataUp = array('Rate' => round($rate));
		$this->update($dataUp,$data['idForum']);
	}

	public function getUserRate($email,$idForum){
		$this->db->where('Flag',1);
		$this->db->where('RatedBy',$email);
		$this->db->where('idForum',$idForum);
		return $this->db->get('ForumRate')->row();
	}

	public function countRate($idForum){
		$this->db->where('Flag',1);
		$this->db->where('idForum',$idForum);
		$this->db->select_avg('RateValue');
		$row = $this->db->get('ForumRate')->row();
		if($row == null){
			$rate = null;
		}
		else{
			$rate = $row->RateValue;
		}
		return $rate;
	}

}