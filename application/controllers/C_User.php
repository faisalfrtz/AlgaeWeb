<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {

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

	public function cekUser()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = new User();
		$row = $user->getUser($email);
		$data = null;
		if($row != null){
			if($password == $user->getPassword()){
				$this->User->cekTitle($email);
				$this->session->set_userdata('user','Pelajar');
				$this->session->set_userdata('objUser',serialize($user));
				$data['user'] = $user;
			}
			else{
				$this->session->set_flashdata('error','Password Salah !');
			}
		}
		else{
			$this->session->set_flashdata('error','Email Tidak Ditemukan !');
		}
		redirect('General/index');
	}

	public function loginAdmin(){
		$email = $this->input->post('Email');
		$password = $this->input->post('Password');
		$user = new User();
		$row = $user->getUser($email);
		$data = null;
		if($row != null){
			if($password == $user->getPassword()){
				$this->User->cekTitle($email);
				$this->session->set_userdata('user','Admin');
				$this->session->set_userdata('userContent','Admin');
				$this->session->set_userdata('userType','Admin');
				$this->session->set_userdata('objUser',serialize($user));
				$data['user'] = $user;
				redirect('C_Admin');
			}
			else{
				$this->session->set_flashdata('error','Password Salah !');
			}
		}
		else{
			$this->session->set_flashdata('error','Email Tidak Ditemukan !');
		}
		redirect('General/Admin');
	}

	public function signUp(){
		$email = $this->input->post('Email');
		$userAda = $this->getUser($email);
		$cek = true;
		if($userAda == 1){
			$this->session->set_flashdata('errEmailcss','border-color: red');
			$this->session->set_flashdata('errEmailtxt','Email Sudah Digunakan');
			$cek = false;
		}

		$password = $this->input->post('Password');
		$repassword = $this->input->post('rePassword');
		if($password != $repassword){
			$this->session->set_flashdata('errPasscss','border-color: red');
			$this->session->set_flashdata('errPasstxt','Password Tidak Sama');
			$cek = false;
		}	

		if(!$cek){
			redirect('General/signUp');
		}
		else{
			$nama = $this->input->post('Nama');
			$umur = $this->input->post('Umur');
			$alamat = $this->input->post('Alamat');
			$pekerjaan = $this->input->post('Pekerjaan');
			$gender = $this->input->post('Gender');
			$data = array(
				'Email' => $email,
				'Tipe' => 1,
				'Nama' => $nama,
				'Gender' => $gender,
				'Umur' => $umur,
				'Alamat' => $alamat,
				'Pekerjaan' => $pekerjaan,
				'Password' => $password,
				);
			$this->User->insert($data);
			$newUser = new User();
			$temp = $newUser->getUser($email);
			$this->session->set_userdata('user','Pelajar');
			$this->session->set_userdata('objUser',serialize($newUser));
			redirect('General');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('General/index');
	}

	public function updateProfile($email){
		$nama = $this->input->post('Nama');
		$umur = $this->input->post('Umur');
		$alamat = $this->input->post('Alamat');
		$gender = $this->input->post('Gender');
		$pekerjaan = $this->input->post('Pekerjaan');
		$password = $this->input->post('Password');

		$data = array(
			'Nama'=>$nama,
			'Umur'=>$umur,
			'Alamat'=>$alamat,
			'Gender'=>$gender,
			'Pekerjaan'=>$pekerjaan,
			'Password'=>$password 
			);

		$newUser = new User();
		$temp = $newUser->update($data,$email);
		$this->session->set_userdata('objUser',serialize($newUser));
		redirect('General/profile');
	}

	public function getUser($email){
		$row = $this->User->getUser($email);
		if($row != null){
			$userAda = 1;
		}
		else{
			$userAda = 0;
		}
		$data['user'] = $userAda;
		return $userAda;
		echo json_encode($data);
	}

	

}
