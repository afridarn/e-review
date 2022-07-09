<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editorctl extends CI_Controller {

	public function index()
	{
		$this->load->view("template/kepala");
		$this->load->view("editor");
		$this->load->view("template/kaki");
	}

}
