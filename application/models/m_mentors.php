<?php 

defined('BASEPATH') OR exit('No thanks big guy');

class m_mentors extends CI_Model {

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('mentors');
        return $this->db->get()->result();
    }
    public function insert_data($data) {
        $this->db->insert('mentors', $data);
    }
    public function detail_data($id) {
        $this->db->select('*');
        $this->db->from('mentors');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function update_data($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('mentors', $data);
    }
    public function delete_data($data) {
        $this->db->where ('id', $data['id']);
        $this->db->delete('mentors', $data);
    }
}

?>