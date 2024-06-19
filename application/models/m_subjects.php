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
    public function detail_data($subject_id)
    {
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('subject_id', $subject_id);
        return $this->db->get()->row();
    }
    public function update_data($data) {
        $this->db->where('subject_id', $data['subject_id']);
        $this->db->update('subjects', $data);
    }
	public function delete_data($data) {
			$this->db->where ('subject_id', $data['subject_id']);
			$this->db->delete('subjects', $data);
	}
    public function subject_exists($subjects, $exclude_id = null) {
        $this->db->where('subjects', $subjects);
        if ($exclude_id) {
            $this->db->where('subject_id !=', $exclude_id);
        }
        return $this->db->get('subjects')->num_rows() > 0;
    }
    public function get_enum_values($subjects, $day) {
        $query = $this->db->query("SHOW COLUMNS FROM {$subjects} LIKE '{$day}'");
        $row = $query->row();
        preg_match("/^enum\(\'(.*)\'\)$/", $row->Type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
}

?>