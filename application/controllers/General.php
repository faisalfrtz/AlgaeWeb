<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

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

	public function __construct()
        {
                parent::__construct();
                if($this->session->userdata('user') == null){
                	$this->session->set_userdata('user','Umum');
                }
                if($this->session->userdata('userContent') == null){
                	$this->session->set_userdata('userContent','Umum');
                }
                if($this->session->userdata('userType') == null){
                	$this->session->set_userdata('userType','Umum');
                }
        }

	public function index()
	{
		$data = null;
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}
		$listMateri = $this->Materi->getMateriLimit('JumView',3,0);
		$listForum = $this->Forum->getListOrderBy('Rate,JumRate',3,0);
		$data['listMateri'] = $listMateri;
		$data['listForum'] = $listForum;
		$this->session->set_userdata('page','content_home');
		$this->load->view('index',$data);
	}

	public function Admin(){
		if($this->session->userdata('user')=='Admin'){
			redirect('Admin/index');
		}
		$this->load->view('loginAdmin');
	}

	public function signUp(){
		if($this->session->userdata('user')!='Umum'){
			redirect('General/index');
		}
		$this->load->view('SignUp');
	}

	public function Profile(){
		$data = null;
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}
		$this->session->set_userdata('page','content_profile');
		$this->load->view('index',$data);
	}

	public function listMateri($kategori = null){
		$data = null;
		$data['all'] = null;
		$data['search'] = null;
		$data['sort'] = null;
		$data['class'] = null;
		$data['clust'] = null;
		if($kategori == 'All' || $kategori == null){$data['all'] = 'selected';}
		elseif($kategori == 'Search'){$data['search'] = 'selected';}
		elseif($kategori == 'Sort'){$data['sort'] = 'selected';}
		elseif($kategori == 'Class'){$data['class'] = 'selected';}
		elseif($kategori == 'Clust'){$data['clust'] = 'selected';}

		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}

		$this->session->set_userdata('page','content_listAlgorithm');
		$this->load->view('index',$data);
	}

	public function learnAlgo($idMateri){
		$data = null;
		$data['idMateri'] = $idMateri;
		$bagMateri = new BagMateri();
		$list = $bagMateri->getList('idMateri',$idMateri);
		$materi = new Materi();
		$row = $materi->getMateri($idMateri);
		$i = 0;
		foreach($list->result_array() as $c){
			$bag[$i] = $c;
			$i++;
		}

		//code User
		if($this->session->userdata('user')!='Umum'){
			$user = unserialize($this->session->userdata('objUser'));
			if(!$this->Materi->isLearnedBy($user->getEmail(),$idMateri)){
				$getPoin = $user->getTotPoin() + $materi->getPoin();
				$arrPoin = array('TotPoin' => $getPoin);
				$user->update($arrPoin,$user->getEmail());
			}
			$this->session->set_userdata('objUser',serialize($user));
			$data['user'] = $user;
		}
		//end code user

		$data['bag'] = $bag;
		$data['materi'] = $materi;
		$this->session->set_userdata('page','content_learnAlgorithm');
		$this->load->view('index',$data);
	}

	public function listForum(){
		$data = null;
		$listAll = null;
		$listAllUser = null;
		$listTT = null;
		$listTTUser = null;
		$listQA = null;
		$listQAUser = null;
		$listCF = null;
		$listCFUser = null;
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}
		$All = $this->Forum->getListLimit(5,0);
		$i = 0;
		foreach($All->result_array() as $c){
			$listAll[$i] = $c;
			$userTemp = new User();
			$temp = $userTemp->getUser($c['Author']);
			$listAllUser[$i] = $userTemp;
			$i++;
		}

		$TT = $this->Forum->getListLimit(5,0,'Tipe','Tips and Trick');
		$i = 0;
		foreach($TT->result_array() as $c){
			$listTT[$i] = $c;
			$userTemp = new User();
			$temp = $userTemp->getUser($c['Author']);
			$listTTUser[$i] = $userTemp;
		}

		$QA = $this->Forum->getListLimit(5,0,'Tipe','Question and Answer');
		$i = 0;
		foreach($QA->result_array() as $c){
			$listQA[$i] = $c;
			$userTemp = new User();
			$temp = $userTemp->getUser($c['Author']);
			$listQAUser[$i] = $userTemp;
		}

		$CF = $this->Forum->getListLimit(5,0,'Tipe','Custom Forum');
		$i = 0;
		foreach($CF->result_array() as $c){
			$listCF[$i] = $c;
			$userTemp = new User();
			$temp = $userTemp->getUser($c['Author']);
			$listCFUser[$i] = $userTemp;
		}

		$data['listAll']= $listAll;
		$data['listAllUser'] = $listAllUser;
		$data['listTT'] = $listTT;
		$data['listTTUser'] = $listTTUser;
		$data['listQA'] = $listQA;
		$data['listQAUser'] = $listQAUser;
		$data['listCF'] = $listCF;
		$data['listCFUser'] = $listCFUser;

		$this->session->set_userdata('page','content_listForum');
		$this->load->view('index',$data);
	}

	public function listForumSpec($kategori = null){
		$data = null;
		$data['all'] = null;
		$data['tt'] = null;
		$data['qa'] = null;
		$data['cf'] = null;
		if($kategori == 'All' || $kategori == null){$data['all'] = 'selected';}
		elseif($kategori == 'TT'){$data['tt'] = 'selected';}
		elseif($kategori == 'QA'){$data['qa'] = 'selected';}
		elseif($kategori == 'CF'){$data['cf'] = 'selected';}

		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}

		$this->session->set_userdata('page','content_listForumSpec');
		$this->load->view('index',$data);
	}

	public function viewForum($idForum){
		$data = null;
		$forum = new Forum();
		$Forum = $forum->getForum($idForum);
		$data['Forum'] = $Forum;
		if($this->session->userdata('user')!='Umum'){
			$user = unserialize($this->session->userdata('objUser'));
			$this->session->set_userdata('objUser',serialize($user));
			$data['user'] = $user;
			$rate = $this->Forum->getUserRate($user->getEmail(),$idForum);
			if($rate){
				$data['userRate'] = $rate->RateValue;
			}
			else{
				$data['userNotRate'] = true;
			}
		}
		$Author = new User();
		$row = $Author->getUser($Forum->Author);
		$data['Author'] = $Author;

		$komentar = new Komentar();
		$row = $komentar->getListForum('idForum',$idForum);
		$j = 0;
		if($row->num_rows() != null){
			foreach($row->result_array() as $c){
				$listKomen[$j] = $c;
				$userTemp = new User();
				$temp = $userTemp->getUser($c['Author']);
				$listUserKomen[$j] = $userTemp;
				$j++;
			}
		}else{
			$listKomen = null;
			$listUserKomen = null;
		}
		
		$data['listKomen'] = $listKomen;
		$data['listUserKomen'] = $listUserKomen;
		$this->session->set_userdata('page','content_isiForum');
		$this->load->view('index',$data);
	}

	public function listQuiz($kategori = null){
		$data = null;
		$data['all'] = null;
		$data['search'] = null;
		$data['sort'] = null;
		$data['class'] = null;
		$data['clust'] = null;
		$data['custom'] = null;
		if($kategori == 'All' || $kategori == null){$data['all'] = 'selected';}
		elseif($kategori == 'Search'){$data['search'] = 'selected';}
		elseif($kategori == 'Sort'){$data['sort'] = 'selected';}
		elseif($kategori == 'Class'){$data['class'] = 'selected';}
		elseif($kategori == 'Clust'){$data['clust'] = 'selected';}
		elseif($kategori == 'Custom'){$data['custom'] = 'selected';}

		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}

		$this->session->set_userdata('page','content_listQuiz');
		$this->load->view('index',$data);
	}

	public function doQuiz($idSoal){
		$data = null;
		$this->session->set_userdata('hasilQuiz',null);
		$daftarSoal = $this->Latihan->getDaftarSoal($idSoal);
		$detailSoal = $this->Latihan->getLatihanBy('idSoal',$idSoal)->row();
		$Author = new User();
		$detailAuthor = $Author->getUser($detailSoal->Author);
		$data['Soal'] = $detailSoal;
		$data['daftarSoal'] = $daftarSoal;
		$data['Author'] = $Author;
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}
		$this->session->set_userdata('page','content_doQuiz');
		$this->load->view('index',$data);
	}

	public function lihatNilai($idSoal){
		$data = null;
		$Soal = $this->Latihan->getLatihanBy('idSoal',$idSoal)->row();
		$data['Soal'] = $Soal;
		$Author = new User();
		$detailAuthor = $Author->getUser($Soal->Author);
		$data['Author'] = $Author;
		if($this->session->userdata('hasilQuiz') != null ||$this->session->userdata('hasilQuiz') >= 0){
			$data['hasil'] = $this->session->userdata('hasilQuiz');
		}
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}
		$this->session->set_userdata('page','content_lihatNilai');
		$this->load->view('index',$data);
	}
	
	public function tambahForum(){
		$data = null;
		if($this->session->userdata('user')!='Umum'){
			$data['user'] = unserialize($this->session->userdata('objUser'));
		}else{
			$this->session->set_flashdata('error','Anda Harus Login untuk membuat Forum baru');
			redirect('General/listForum');
		}
		$this->session->set_userdata('page','content_tambahForum');
		$this->load->view('index',$data);
	}
}
