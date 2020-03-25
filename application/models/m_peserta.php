<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta extends CI_Model {

	public function peserta($username)
	{
		$query = $this->db->get_where('tb_akun', array('username' => $username));
		return $query;
	}
	public function dataPeserta($username)
	{
		$query = $this->db->get_where('tb_peserta', array('username' => $username));
		return $query;
	}
	public function simpanProfil($id,$profil)
	{
		$this->db->where($id);
		$this->db->update('tb_peserta', $profil);
		if ($this->db->affected_rows()) {
			echo "<script>alert('Berhasil MENGUBAH Data !!');</script>";	
		}
	}
	public function bidang()
	{
		return $this->db->get('tb_test');
	}
}

/* End of file m_perekrutan.php */
/* Location: ./application/models/m_perekrutan.php */