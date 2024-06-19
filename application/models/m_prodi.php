<?php
defined('BASEPATH') or exit('piss off');

class m_prodi extends CI_Model {
    public function all_data()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		return $this->db->get()->result();
	}
	public function insert_data($data) {
        $this->db->insert('prodi', $data);
    }
    public function detail_data($prodi_id)
    {
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->where('prodi_id', $prodi_id);
        return $this->db->get()->row();
    }
    public function update_data($data) {
        $this->db->where('prodi_id', $data['prodi_id']);
        $this->db->update('prodi', $data);
    }
	public function delete_data($data) {
			$this->db->where ('prodi_id', $data['prodi_id']);
			$this->db->delete('prodi', $data);
		}
        public function prodi_exists($prodi, $exclude_id = null) {
			$this->db->where('prodi', $prodi);
			if ($exclude_id) {
				$this->db->where('prodi_id !=', $exclude_id);
			}
			return $this->db->get('prodi')->num_rows() > 0;
		}
}
?>