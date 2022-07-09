<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makelaarctl extends CI_Controller {

	public function index()
	{
		$this->load->view("template/kepala");
		$this->load->view("makelaar");
		$this->load->view("template/kaki");
	}

}
