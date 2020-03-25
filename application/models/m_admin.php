<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	// DATA PESERTA
	public function cekData()
	{
		$peserta = $this->db->get('tb_peserta');
		return $peserta;
	}
	public function dataPeserta()
	{
		return $this->db->get('tb_peserta');
	}
	public function simpanDataPeserta($data)
	{
		$this->db->insert('tb_peserta', $data);
		if ($this->db->affected_rows()) {
			echo "<script>alert('Berhasil MENYIMPAN Data !!');</script>";
		}
	}

	public function editData($id)
	{
		$query = $this->db->get_where('tb_peserta', array('id_peserta'=>$id));
		return $query;
	}
	
	public function updateDataPeserta($id,$data)
	{
		$this->db->where($id);
		$this->db->update('tb_peserta', $data);
		if ($this->db->affected_rows()) {
			echo "<script>alert('Berhasil MENGUBAH Data !!');</script>";
		}
	}
	public function hapusDataPeserta($id)
	{
		$this->db->where($id);
		$this->db->delete('tb_peserta');
		if ($this->db->affected_rows()) {
			echo "<script>alert('Berhasil MENGHAPUS Data !!');</script>";	
		}	
	}

	// HASL SELEKSI PESERTA
	public function hasilSeleksi()
	// USERNAME NAMALENGKAP BIDANG NILAI
	{
		return $this->db->get('tb_hasil');
	}

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */
