<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('board_model');
//		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('show_board');
	}

	public function lists()
	{
		$this->load->view('show_board');
	}
	
	public function write_ok()
	{
		$this->board_model->insert_board();
	}	
}
?>