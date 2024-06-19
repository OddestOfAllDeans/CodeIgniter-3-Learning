<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_students extends CI_Model {


	public function all_data()
	{
		$this->db->select('*');
		$this->db->from('students');
		$this->db->join('faculties', 'faculties.faculty_id = students.faculty_id',  'left');
		$this->db->join('prodi', 'prodi.prodi_id = students.prodi_id',  'left');
		return $this->db->get()->result();
	}
	public function insert_data($data) {
		$this->db->insert('students', $data);
	}
	public function detail_data($id)
	{
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('id', $id);
		return $this->db->get()->row();
		}
		public function update_data($data) {
			$this->db->where('id', $data['id']);
			$this->db->update('students', $data);
		}

		public function delete_data($data) {
			$this->db->where ('id', $data['id']);
			$this->db->delete('students', $data);
		}
		public function show_data() {
			$this->db->join('faculties', 'faculties.faculty_id = students.faculty_id',  'left');
			$this->db->join('prodi', 'prodi.prodi_id = students.prodi_id',  'left');
			return $this->db->get('students');
		}
		public function get_student($id) {
			$this->db->join('faculties', 'faculties.faculty_id = students.faculty_id',  'left');
			$this->db->join('prodi', 'prodi.prodi_id = students.prodi_id',  'left');
			$query = $this->db->get_where('students', array('id' => $id));
			return $query->row_array();
		}
		public function detail_data2($id){
			return $this->db->query('select * from students s left join faculties f on (s.faculty_id = f.faculty_id) left join prodi p on (s.prodi_id = p.prodi_id)')->row_array();
		}
		public function student_exists($name, $exclude_id = null) {
			$this->db->where('name', $name);
			if ($exclude_id) {
				$this->db->where('id !=', $exclude_id);
			}
			return $this->db->get('students')->num_rows() > 0;
		}
		public function get_student_by_nim($nim) {
			$this->db->where('nim', $nim);
			return $this->db->get('students')->row();
		}
	}
