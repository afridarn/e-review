<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->view('home');
	}

	public function signup()
	{
		//helper form --> enable form submission
		//helper url --> enable form  url
		$this->load->helper(array('form', 'url'));

		//load form view
		$this->load->view('template/headerSignUp');
		$this->load->view('signup', array("error" => ""));
		$this->load->view('template/kaki');
		return;
	}

	public function signingUp()
	{
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));


		//validasi form
		$this->form_validation->set_rules('nama', 'Nama', 'trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('katasandi', 'Kata Sandi', 'trim|min_length[2]|max_length[128]|xss_clean');
		$this->form_validation->set_rules('email', 'Surel', 'trim|min_length[2]|max_length[128]|xss_clean');

		$res = $this->form_validation->run();
		if($res == FALSE) {
			$error = array('error' => validation_errors());
			$this->load->view('template/kepala');
			$this->load->view('signup', $error);
			$this->load->view('template/kaki');
			return FALSE;
		}


		//pemeriksaan berkas foto
		$config['upload_path']			='./photos/';
		$config['allowed_types']		='gif|jpg|png';
		$config['max_size']				='50';
		$config['max_width']			='1500';
		$config['max_height']			='2000';

		//load library upload -> menangani upload berkas
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')){
			//gagal upload
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/kepala');
			$this->load->view('signup', $error);
			$this->load->view('template/kaki');
			return;
		}
		//berhasil upload
		$data = array('upload_data' => $this->upload->data());
		//insert data akun ke database -> query
		$id_user = $this->account->insertNewUser();
		$this->load->view('template/headerSignUp');
		$this->load->view('signup_success');
		$this->load->view('template/kaki');
		return;

	}

	public function login(){
		$this->load->helper(array('form', 'url'));
		$this->load->view('template/headerLogIn');
		$this->load->view('login.php');
		$this->load->view('template/kaki');
	}

	public function checkingLogin()
	{
		$this->load->helper(array('form', 'url', 'security'));
		$this->load->model('account');
		$this->load->library(array('form_validation'));

		/*$this->form_validation->set_rules('username', 'Username', 'trim|min_length[2]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('katasandi', 'Kata Sandi', 'trim|min_length[2]|max_length[50]|xss_clean');

		$res = $this->form_validation->run();
		if($res == FALSE)
		{
			$msg=validation_errors();
			$this->load->view('template/kepala');
			$this->load->view('login', array('msg' => $msg));
			$this->load->view('template/kaki');
			return FALSE;
		}*/

		$users = $this->account->getIDUser();
		
		if(sizeof($users)<=0)
		{
			$msg=validation_errors();
			$this->load->view('template/kepala');
			$this->load->view('login', array('msg'=> "Username/Password is Incorrect!"));
			$this->load->view('template/kaki');
			return FALSE;
		}
		else
		{
			$sess_array=array(
				'id_user' 		=> $users[0]['id_user'],
				'nama' 			=> $users[0]['nama'],
				'username' 		=> $users[0]['username'],
				'id_member' 	=> $users[0]['id_grup']
			);
			$this->session->set_userdata('logged_in', $sess_array);

			switch ($users[0]['id_grup']) {
				case '1':
					redirect('ManageMyTasks/index/' . $users[0]['id_user']);
					break;
				case '2':
					redirect('ManageAssignedTask/index/' . $users[0]['id_user']);
					break;
				case '3':
					redirect('ManageAllTasks/index/' . $users[0]['id_user']);
					break;
			}
		}
	}

	public function redirecting()
	{
		$session_data = $this->session->userdata('logged_in');

		if (!$session_data) {
			redirect('login');
		}

		switch ($session_data['id_grup']) {
			case '1':
				redirect('ManageMyTasks/index/' . $session_data['id_user']);
				break;
			case '2':
				redirect('ManageAssignedTask/index/' . $session_data['id_user']);
				break;
			case '3':
				redirect('ManageAllTasks/index/' . $session_data['id_user']);
				break;
			default:
				redirect('welcome');
				break;
		}
	}
	public function log_out()
	{
		if( ! $this->session->userdata('logged_in'))
		{
			redirect ('login');
		}
		$session_data = $this->session->userdata('logged_in');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('welcome');
	}
}
