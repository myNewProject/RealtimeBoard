<?php
	class Board_model extends CI_Model {
		public function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function insert_board() {
			$this->load->helper('date');

			$data = array(
				'name' => $this->input->post('name'),
				'title' => $this->input->post('title'),
				'contents' => $this->input->post('contents')
			);

			$this->db->set('postdate', 'now()', FALSE);

			return $this->db->insert('board', $data);
		}

		public function getView() {
			$CODE = $this->input->post('CODE');

			$SQL = "select code, title, contents, name, postdate from board where code=".$CODE;
			$query = $this->db->query($SQL);

			return $query->row();
		}

		public function getList() {
			$SQL = "select code,title,contents,name,postdate from board order by postdate desc";
			$query = $this->db->query($SQL);
			return $query->result_array();
		}
	}
?>