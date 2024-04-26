<?php 

defined('BASEPATH') or exit('just shut the hell up');

class m_subjects extends CI_Model {

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('subjects');
        return $this->db->get()->result();
    }
    public function insert_data($data) {
        $this->db->insert('subjects', $data);
    }
    public function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function update_data($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('subjects', $data);
    }
	public function delete_data($data) {
			$this->db->where ('id', $data['id']);
			$this->db->delete('subjects', $data);
		}
}

?>