<?php
defined('BASEPATH') or exit('piss off');

class m_faculties extends CI_Model {
    public function all_data()
	{
		$this->db->select('*');
		$this->db->from('faculties');
		return $this->db->get()->result();
	}
}
?>