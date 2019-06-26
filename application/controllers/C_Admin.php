<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                if($this->session->userdata('user') == null && $this->session->userdata('userContent') == null){
                	$this->session->set_userdata('user','Umum');
                	$this->session->set_userdata('userContent','Umum');
                	redirect('General');
                }
                $this->session->set_userdata('userContent','Admin');
        }

	public function index(){
		redirect('C_Admin/kelolaUser');
	}

	public function kelolaUser(){
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$pil = array('Tipe'=>1);
		$listUser = $this->User->getListUserBy($pil);
		$data['listUser'] = $listUser;
		$this->session->set_userdata('page','content_kelolaUser');
		$this->load->view('index',$data);
	}

	public function kelolaMateri(){
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$listMateri = $this->Materi->getListMateri();
		$data['listMateri'] = $listMateri;
		$this->session->set_userdata('page','content_kelolaMateri');
		$this->load->view('index',$data);
	}

	public function tambahMateri($idMateri){
		$materi = $this->Materi->getMateri($idMateri);
		$data['detailMateri'] = $materi;
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$this->session->set_userdata('page','content_tambahMateri');
		$this->load->view('index',$data);
	}

	public function kelolaForum(){
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$listForum = $this->Forum->getList();
		$data['listForum'] = $listForum;
		$this->session->set_userdata('page','content_kelolaForum');
		$this->load->view('index',$data);
	}

	public function tambahForum(){
		$this->session->set_userdata('userContent','Umum');
		redirect('General/tambahForum');
	}

	public function kelolaQuiz(){
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$listLatihan = $this->Latihan->getLatihanBy();
		$data['listLatihan'] = $listLatihan;
		$this->session->set_userdata('page','content_kelolaQuiz');
		$this->load->view('index',$data);
	}

	public function tambahQuiz($idSoal){
		$quiz = $this->Latihan->getLatihanBy('idSoal',$idSoal);
		$data['detailQuiz'] = $quiz->row();
		$data['user'] = unserialize($this->session->userdata('objUser'));
		$this->session->set_userdata('page','content_tambahQuiz');
		$this->load->view('index',$data);
	}

	public function viewQuiz($idQuiz){
		$this->session->set_userdata('userContent','Umum');
		redirect('General/doQuiz/'.$idQuiz);
	}

	public function delQuiz($idSoal){
		$data = array(
			'Flag'=>0
			);
		$this->Latihan->update($data,$idSoal);
		redirect('C_Admin/kelolaQuiz');
	}

	public function viewMateri($idMateri){
		$this->session->set_userdata('userContent','Umum');
		redirect('General/learnAlgo/'.$idMateri);
	}

	public function delMateri($idSoal){
		$data = array(
			'Flag'=>0
			);
		$this->Materi->update($data,$idSoal);
		redirect('C_Admin/kelolaMateri');
	}

	public function viewForum($idForum){
		$this->session->set_userdata('userContent','Umum');
		redirect('General/viewForum/'.$idForum);
	}

	public function delForum($idForum){
		$data = array(
			'Flag'=>0
			);
		$this->Forum->update($data,$idForum);
		redirect('C_Admin/kelolaForum');
	}
}