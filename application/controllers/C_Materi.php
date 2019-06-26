<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Materi extends CI_Controller {

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

	public function getDataListMateriBy($kategori){
		$materi = new Materi();
		$kategori = urldecode($kategori);
		if($kategori == 'All'){
			$listMateri = $materi->getListMateri();
		}else{
			$listMateri = $materi->getListMateri('Kategori',$kategori);	
		}
		$i = 0;
		if($listMateri->row()){
			foreach($listMateri->result_array() as $c){
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

	public function tambahMateri(){
		$user = unserialize($this->session->userdata('objUser'));
		$pict = $this->input->post('Kategori').'.jpg';
		$detailMateri = array(
			'Nama' => $this->input->post('Nama'),
			'Kategori' => $this->input->post('Kategori'),
			'Poin' => $this->input->post('Poin'),
			'Author' => $user->getEmail(),
			'Pict' => $pict,
			'SubmitBy' => 'Admin',
			'IsAccept' => 1
			);
		$idMateri = $this->Materi->insert($detailMateri);
		redirect('C_Admin/tambahMateri/'.$idMateri);
	}

	public function tambahSlide($idMateri){
/*
			$materi = $this->Materi->getMateri($idMateri);*/

			$jumSlide = $this->input->post('currNum');
			$i = 0;
			
			while($i < $jumSlide){
				$i++;
				$config['upload_path']          = './images/materi/'.$idMateri.'/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['file_name']			= 'no';
	            $config['max_size']             = 3000;
	            $config['max_width']            = 2200;
	            $config['max_height']           = 2200;
	            $this->load->library('upload', $config);


			    // create an album if not already exist in uploads dir
			    // wouldn't make more sence if this part is done if there are no errors and right before the upload ??
			    if (!is_dir('images/materi'))
			    {
			        mkdir('./images/materi', 0777, true);
			    }
			    $dir_exist = true; // flag for checking the directory exist or not
			    if (!is_dir('images/materi/' . $idMateri))
			    {
			        mkdir('./images/materi/' . $idMateri, 0777, true);
			        $dir_exist = false; // dir not exist
			    }
			    $gbr = 'gambar'.$i;
			    
			    if (!$this->upload->do_upload($gbr))
			    {
			        // upload failed
			        //delete dir if not exist before upload
			        if(!$dir_exist)
			          rmdir('./images/materi/' . $idMateri);

			        $error =  $this->upload->display_errors('<span>', '</span>');
			        echo 'gagal';
			        echo $error;
			    } else
			    {
			        $upload_data = $this->upload->data();
			        $step = $this->input->post('step'.$i);
			        $gambar = $upload_data['file_name'];
			        $data = array(
			        	'idMateri' => $idMateri,
			        	'Nomor' => $i,
			        	'Deskripsi' => $step,
			        	'Gambar' => $gambar
			        	);
			        $tempId = $this->Materi->insertSlide($data);
			    }
			}
			redirect('C_Admin/kelolaMateri');
			
	}
	

}
