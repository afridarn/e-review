<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewerctl extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('url'));
		$this->load->view("template/kepala");
		$this->load->view("reviewer");
		$this->load->view("template/kaki");
	}

}
