<?php 

defined('BASEPATH') or exit('just shut the hell up');

class m_attendance extends CI_Model {

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('attendance');
        return $this->db->get()->result();
    }
    public function insert_data($data) {
        $this->db->insert('attendance', $data);
    }
    public function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('attendance');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function update_data($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('attendance', $data);
    }
	public function delete_data($data) {
			$this->db->where ('id', $data['id']);
			$this->db->delete('attendance', $data);
		}
}

?>