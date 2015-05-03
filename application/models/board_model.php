<?
	class board_model extends CI_Model {
		public function __construct() {
		}

		public function insert_board() {
			$this->load->helper('date');

			$data = array(
				'name' => $this->input->post('name'),
				'title' => $this->input->post('title'),
				'contents' => $this->input->post('contents')
			);

			$this->db->set('postdate', 'now()', FALSE);

			return $this->db->insert('테이블명', $data);
		}
	}
?>