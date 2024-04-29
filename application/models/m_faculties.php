<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_faculties extends CI_Model {


	public function all_data()
	{
		$this->db->select('*');
		$this->db->from('faculties');
		return $this->db->get()->result();
	}
	public function insert_data($data) {
		$this->db->insert('faculties', $data);
	}
	public function detail_data($faculty_id)
	{
		$this->db->select('*');
		$this->db->from('faculties');
		$this->db->where('faculty_id', $faculty_id);
		return $this->db->get()->row();
		}
		public function update_data($data) {
			$this->db->where ('faculty_id', $data['faculty_id']);
			$this->db->update('faculties', $data);
		}

		public function delete_data($data) {
			$this->db->where ('faculty_id', $data['faculty_id']);
			$this->db->delete('faculties', $data);
		}
	}