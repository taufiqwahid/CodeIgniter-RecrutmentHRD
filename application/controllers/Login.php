<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  require 'vendor/autoload.php';

  use Ramsey\Uuid\Uuid;
  use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
		$this->session->unset_userdata($this->session->all_userdata());
		$this->session->sess_destroy();
	}
	public function cekLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'USERNAME', 'required');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required');
		if ($this->form_validation->run() == true) {
			$cekLogin = $this->m_login->cekData($username,$password);
			if ($cekLogin == true && $cekLogin->level=='admin') {
				$userdata = array(
					'level' => $cekLogin->level,
					'username' => $username,
					'nama_lengkap' => $cekLogin->nama_lengkap
				);
				$this->session->set_userdata($userdata);
				redirect(base_url('admin/'),'refresh');
			}elseif ($cekLogin==true && $cekLogin->level=='peserta') {
				$userdata = array(
					'level' => $cekLogin->level,
					'username' => $username,
					'nama_lengkap' => $cekLogin->nama_lengkap
				);
				$this->session->set_userdata($userdata);	
				redirect(base_url('perekrutan/'),'refresh');
			}else{
				redirect('login','refresh');
			}
			
		}else{
			$this->load->view('login');
		}	
	}
 
	public function cekLogout()
	{
		$this->session->unset_userdata($this->session->all_userdata());
		$this->session->sess_destroy();
		redirect('login','refresh');
	}


	//MEMBUAT AKUN
	public function membuatAkun()
	{	
		$id_peserta = Uuid::uuid4()->toString();
		$username = $this->input->post('username');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		if ($username=='admin') {
			$level='admin';
		}else{
			$level='peserta';
		}
		

		$this->form_validation->set_rules('username', 'USERNAME', 'required');
		$this->form_validation->set_rules('nama_lengkap', 'NAMA LENGKAP', 'required');
		$this->form_validation->set_rules('password', 'PASSWORD', 'required');
		$this->form_validation->set_rules('repassword', 'RE-PASSWORD', 'required');

		if (isset($_POST['buat'])==true) {
			if ($password==$repassword) {
				if ($this->form_validation->run() == true) {

				$cekData = $this->m_login->cekAkun($username)->row(); //jika username sama

				if ($cekData) {
					echo "<script>Swal.fire('Data Telah Ada Yang Punya','aaa','error');</script>";
					redirect('login','refresh');
				}else{
					$akun = array(
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'password' => $password,
					'level' => $level );
					$this->m_login->membuatAkun($akun);

					$data = array(
					'id_peserta' => $id_peserta,
					'nama_lengkap' => $nama_lengkap,
					'username' => $username,
					'password' => $password);
					$this->m_admin->simpanDataPeserta($data);

					$masuk = $this->db->affected_rows();
					if ($masuk>0) {		
						echo "<script>alert('Berhasil MEMBUAT akun !!')</script>";
						redirect('login','refresh');
					}else{
						echo "<script>alert('GAGAL MEMBUAT MEMBUAT !!')</script>";
						redirect('login','refresh');
					}
				}
			}else{
				$this->load->view('login');
			}				
		}else{
			echo "<script>alert('Password TIDAK BOLEH BEDA dengan Re-Password ');</script>";
			redirect('login','refresh');
		}

		}else{
			echo "<script>alert('Password HARUS SAMA dengan Re-Password ');</script>";
			redirect('login','refresh');
		}
	}

}