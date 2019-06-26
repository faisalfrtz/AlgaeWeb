<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Latihan extends CI_Controller {

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

	public function getDataListQuizBy($kategori){
		$Soal = new Latihan();
		$kategori = urldecode($kategori);
		if($kategori == 'All'){
			$row = $Soal->getLatihanBy();
		}else{
			$row = $Soal->getLatihanBy('Kategori',$kategori);	
		}
		$temp = null;
		$tempUser = null;
		$jumSoal = null;
		$i = 0;
		foreach($row->result_array() as $c){
			$temp[$i] = $c;
			$row = $this->User->getUser($c['Author']);
			$tempUser[$i] = $row;
			$jumSoal[$i] = $this->Latihan->getDaftarSoal($c['idSoal'])->num_rows();
			$i++;
		}
		$data['temp'] = $temp;
		$data['userTemp'] = $tempUser;
		$data['jumSoal'] = $jumSoal;
		echo json_encode($data);
	}

	public function lihatNilai($idSoal,$jumSoal){
		$Soal = $this->Latihan->getLatihanBy('idSoal',$idSoal)->row();
		$daftarSoal = $this->Latihan->getDaftarSoal($idSoal);
		$no = 1;
		$jwbBenar = 0;
		foreach($daftarSoal->result() as $c){
			$tempJwb = $this->input->post('jwb'.$no);
			if($tempJwb == $c->JwbBenar){
				$jwbBenar++;
			}
			$no++;
		}
		if($jwbBenar == 0){
			$hasil = 0;
		}else{
			$hasil = ($jwbBenar/$jumSoal) * 100;
			$hasil = round($hasil);
		}
		if($this->session->userdata('user')!='Umum'){
			$user = unserialize($this->session->userdata('objUser'));
			$poinDapat = ($jwbBenar/$jumSoal) * $Soal->Poin;
			$poinDapat = round($poinDapat);
			$select = array('Email'=> $user->getEmail(),'idSoal'=>$idSoal);
			$userNilai = $this->Latihan->selectDaftarNilai($select);
			if($userNilai->num_rows() == 0){
				$data2 = array(
					'idSoal' => $idSoal,
					'Email' => $user->getEmail(),
					'Nilai' => $hasil
					);
				$this->Latihan->insertToNilai($data2);
				$curTotPoin = $user->getTotPoin();
				$totPoin = $curTotPoin+$poinDapat;
				$data3 = array('TotPoin'=>$totPoin);
				$NewUser = new User();
				$row = $NewUser->update($data3,$user->getEmail());
				$this->session->set_userdata('objUser',serialize($NewUser));
			}
			else{
				$data2 = array(
					'Nilai' => $hasil
					);
				$userN = $userNilai->row();
				$this->Latihan->updateToNilai($userN->id,$data2);
				$un = $userNilai->row();
				if($poinDapat > $un->Nilai){
					$curTotPoin = $user->getTotPoin();
					$totPoin = $curTotPoin+$poinDapat;
				}
				else{
					$curTotPoin = $user->getTotPoin() - $Soal->Poin;
					$totPoin = $curTotPoin+$poinDapat;
				}
				$data3 = array('TotPoin'=>$totPoin);
				$NewUser = new User();
				$row = $NewUser->update($data3,$user->getEmail());
				$this->session->set_userdata('objUser',serialize($NewUser));
			}	
		}
		$this->session->set_userdata('hasilQuiz',$hasil);
		redirect('General/lihatNilai/'.$idSoal);
	}

	public function tambahQuiz(){
		$user = unserialize($this->session->userdata('objUser'));
		$pict = $this->input->post('Kategori').'.jpg';
		if($this->session->userdata('user') == 'Admin'){
			$detailQuiz = array(
				'Nama' => $this->input->post('Nama'),
				'Kategori' => $this->input->post('Kategori'),
				'Poin' => $this->input->post('Poin'),
				'Author' => $user->getEmail(),
				'Waktu' => $this->input->post('Waktu'),
				'Pict' => $pict,
				'SubmitBy' => 'Admin',
				'IsAccept' => 1
				);
			$idQuiz = $this->Latihan->insert($detailQuiz);
			redirect('C_Admin/tambahQuiz/'.$idQuiz);
		}
	}

	public function tambahDaftarSoal($idSoal){
		$jumSoal = $this->input->post('currNum');
		$i = 1;
		while($i <= $jumSoal){
			$isi = $this->input->post('soal'.$i);
			$jwbBenar =  $this->input->post('opt'.$i);
			$A = $this->input->post('A'.$i);
			$B = $this->input->post('B'.$i);
			$C = $this->input->post('C'.$i);
			$D = $this->input->post('D'.$i);
			$E = $this->input->post('E'.$i);
			$data = array(
				'Nomor' => $i,
				'idSoal' => $idSoal,
				'Isi' => $isi,
				'JwbBenar' => $jwbBenar,
				'A' => $A,
				'B' => $B,
				'C' => $C,
				'D' => $D,
				'E' => $E,
				);
			$this->Latihan->insertToDaftarSoal($data);
			$i++;
		}
		redirect('C_Admin/kelolaQuiz');

	}

	public function delQuiz($idSoal){
		$data = array(
			'Flag'=>0
			);
		$this->Latihan->update($data,$idSoal);
	}
	

}
