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
		$return_value = $this->board_model->insert_board();
		echo $return_value;
	}	

	public function getView() {
		$data = $this->board_model->getView();

		echo $data->name."^".$data->title."^".$data->contents."^".$data->code; 
	}

	public function getList() {
		$return_value = $this->board_model->getList();
		$data['board'] = $return_value;

		$HEADER_HTML = "
		<div style='width:100%; border-top:1px solid #333333; height:30px; clear:both'>
				<span style='width:10%; float:left; text-align:center; line-height:30px'>
					<b>No.</b>
				</span>
				<span style='width:20%; float:left; text-align:center; line-height:30px'>
					<b>이름</b>
				</span>
				<span style='width:40%; float:left; text-align:center; line-height:30px'>
					<b>제목</b>
				</span>
				<span style='width:30%; float:left; text-align:center; line-height:30px'>
					<b>날짜</b>
				</span>
			</div>";
		$FOOTER_HTML = "
		</div>";
		$return_html = $HEADER_HTML;

		$idx = 0;
		foreach ($data['board'] as $items) {
			$idx++;
			$return_html .= "
			<div style='width:100%; border-top:1px solid #aaaaaa; height:30px; clear:both; color:#999999'>
				<span style='width:10%; float:left; text-align:center; line-height:30px'>
					".$idx."
				</span>
				<span style='width:20%; float:left; text-align:center; line-height:30px'>
					".$items['name']."
				</span>
				<span style='width:40%; float:left; text-align:center; line-height:30px'>
					<a style='text-decoration:underline; cursor:pointer'
					onclick=\"javascript:viewBoard('".$items['code']."');\">".$items['title']."</a>
				</span>
				<span style='width:30%; float:left; text-align:center; line-height:30px'>
					".$items['postdate']."
				</span>
			</div>";
		}

		$return_html .= $FOOTER_HTML;

		echo $return_html;
	}
}
?>