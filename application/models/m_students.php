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
		$this->db->join('faculties', 'faculties.faculty_id = students.faculty_id',  'left');
		$this->db->join('prodi', 'prodi.prodi_id = students.prodi_id',  'left');
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
	}
