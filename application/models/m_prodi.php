<?php
defined('BASEPATH') or exit('piss off');

class m_prodi extends CI_Model {
    public function all_data()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		return $this->db->get()->result();
	}
}
?>