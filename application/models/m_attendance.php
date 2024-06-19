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
    public function get_student_by_nim($nim) {
        $this->db->select('students.*, subjects.*');
        $this->db->from('students');
        $this->db->join('subjects', 'students.subject_id = subjects.subject_id', 'left');
        $this->db->where('students.nim', $nim);
        return $this->db->get()->row();
    }

    public function has_attended_today($nim, $subject_id) {
        $this->db->where('nim', $nim);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('date', date('Y-m-d'));
        return $this->db->get('attendance')->num_rows() > 0;
    }

    public function mark_attendance($nim, $subject_id, $status) {
        $data = array(
            'nim' => $nim,
            'subject_id' => $subject_id,
            'date' => date('Y-m-d'),
            'status' => $status
        );
        $this->db->insert('attendance', $data);
    }
    public function check_attendance($nim, $subject_id, $date) {
        $this->db->where('nim', $nim);
        $this->db->where('subject_id', $subject_id);
        $this->db->where('DATE(time)', $date);
        $query = $this->db->get('attendance');
        return $query->num_rows() > 0;
    }
}

?>