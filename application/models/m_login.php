<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	public function cekData($username,$password)
	{
		$query = $this->db->get_where('tb_akun',
			array('username' => $username,'password' => $password))->row();
		return $query;
	}

	public function dataAkunLogin()
	{
		$query = $this->db->get('tb_akun');	
		return $query;
	}

	public function membuatAkun($akun)
	{
		$akun = $this->db->insert('tb_akun',$akun);
		return $akun;
	}
	
	public function cekAkun($username)
	{
		$query = $this->db->get_where('tb_akun',array('username'=>$username));
		return $query;
	}
	public function cekDataAkun($username)
	{
		$query = $this->db->get_where('tb_akun',array('username'=>$username));
		return $query;
	}
}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */