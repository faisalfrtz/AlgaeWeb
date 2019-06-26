<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Forum extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function getDataListForumBy($tipe){
		$Forum = new Forum();
		$tipe = urldecode($tipe);
		if($tipe == 'All'){
			$listForum = $Forum->getList();
		}else{
			$listForum = $Forum->getList('Tipe',$tipe);	
		}
		$i = 0;
		if($listForum->row()){
			foreach($listForum->result_array() as $c){
				$list[$i] = $c;
				$user = $this->User->getUser($c['Author']);
				$listUser[$i] = $user;
				$i++;
			}
		}
		else{
			$list = null;
			$listUser = null;
		}
		$data['list'] = $list;
		$data['listUser'] = $listUser;
		echo json_encode($data);
	}

	public function rateForum($idForum,$email,$rate){
		$data = array(
			'idForum' => $idForum,
			'RatedBy' => $email,
			'RateValue' => $rate
			);
		$this->Forum->rate($data);
		$data['rate'] = $rate;
		echo json_encode($data);
	}

	public function giveComment($idForum,$email,$isi){
		$data = array(
			'Author' => $email,
			'idForum' => $idForum,
			'Isi'=>urldecode($isi),
			);
		$this->Komentar->insertToForum($data);
		$id = $this->db->insert_id();
		$row = $this->Komentar->getKomenForum($id);
		$data['komen'] = $row;
		echo json_encode($data);
	}

	public function giveLikeComm($value,$email,$idKomentar,$curValue){
		$data = array(
			'Email' => $email,
			'idKomentar' => $idKomentar,
			'Value' => $value
			);
		$cek = $this->Komentar->giveLikeCommForum($data);
		if($cek == true){
			$data2 = array(
				'Value'=> $curValue + $value
				);
			$this->Komentar->updateKomenForum($data2,$idKomentar);
			$data3['cek'] = true;
		}
		else{
			$data3['cek'] = false;
		}
		echo json_encode($data3);
	}

	public function tambahForum(){
		$nama = $this->input->post('Nama');
		$kategori = $this->input->post('Kategori');
		$tipe = $this->input->post('Tipe');
		$isi = $this->input->post('isi');
		$user = unserialize($this->session->userdata('objUser'));

		if($tipe == 'Custom'){
			$tipe = $this->input->post('CustomTipe');
		}

		$data = array(
			'Nama' => $nama,
			'Kategori' => $kategori,
			'Tipe' => $tipe,
			'Isi' => $isi,
			'Author' => $user->getEmail()
			);

		$idForum = $this->Forum->insert($data);
		if($this->session->userdata('user') != 'Admin'){
			redirect('General/viewForum/'.$idForum);
		}else{
			redirect('C_Admin/kelolaForum');
		}
	}

}
