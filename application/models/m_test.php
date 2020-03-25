<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {
	
	public function bidang()
	{
		$this->db->select('bidang');
		$this->db->distinct();
		return $this->db->get('tb_test');
	}

	public function soalTest($bidang)
	{
		return $this->db->get_where('tb_test',array('bidang'=>$bidang));
	}
	public function jawabanTest($bidang)
	{
		return $this->db->get_where('tb_test',array('bidang'=>$bidang));
	}
	public function hasilTest($data)
	{
		return $this->db->insert('tb_hasil', $data);
	}

	public function hasilBidang($bidang)
	{
		$this->db->where('bidang', $bidang);
		return $this->db->get('tb_hasil');
	}
	public function cekTb_Hasil($nama_lengkap,$bidang,$username)
	{
		$this->db->where('nama_lengkap', $nama_lengkap);
		$this->db->where('bidang', $bidang);
		$this->db->where('username', $username);
		return $this->db->get('tb_hasil');
	}
	public function tampil_soal()
	{
		$this->db->order_by('bidang', 'desc');
		return $this->db->get('tb_test');
	}

	public function tambah_soal($soal)
	{
		$this->db->insert('tb_test', $soal);
	}
}

/* End of file m_test.php */
/* Location: ./application/models/m_test.php */ ?>