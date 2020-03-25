<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dasar extends CI_Model {
	public function tampil_soal()
	{
		return $this->db->get('tb_testDasar');
	}

}

/* End of file m_dasar.php */
/* Location: ./application/models/m_dasar.php */