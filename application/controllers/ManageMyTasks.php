<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMyTasks extends CI_Controller {

	public function index(){
		//var_dump($this->session->userdata("logged_in")["nama"]);
		
		$this->load->helper(array('url'));
		$this->load->view("template/headerEditor");
		$this->load->view("editor");
		$this->load->view("template/kaki");
	}

	public function addNewTask()
	{
		
		
		$this->load->helper(array('url', 'form'));
		$this->load->view("template/headerEditor");
		$this->load->view("mmt/addnewtask", array('error' => "",));
		$this->load->view("template/kaki");
	}

	public function addingTask()
	{

		$this->load->helper(array('form', 'url', 'security'));
		$this->load->model('Editor');
		$this->load->library(array('form_validation'));


		$this->form_validation->set_rules('judul','Title','trim|min_length[2]|max_length[250]|xss_clean|required');
		$this->form_validation->set_rules('katakunci','Keywords','trim|min_length[2]|max_length[128]|xss_clean|required');
		$this->form_validation->set_rules('authors','Authors','trim|min_length[2]|max_length[256]|xss_clean|required');
		$this->form_validation->set_rules('halaman','Pages','trim|min_length[1]|max_length[128]|xss_clean|numeric');

		$res = $this->form_validation->run();
		if ($res == FALSE) {
			$msg = validation_errors();
			$this->load->view('template/headerEditor', array("msg" => $msg));
			$this->load->view('mmt/addnewtask', array('error' => $msg));
			$this->load->view('template/kaki');
			return FALSE;
		}

		$config['upload_path']          = './artikel/';
		$config['allowed_types']        = 'docx|doc|pdf';
		$config['max_size']             = 10000;

		$new_name = str_replace(' ', '_', time() . '_' . $_FILES["userfile"]['name']);
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);

		$msg='';
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/headerEditor', array("msg" => $msg));
			$this->load->view('mmt/addnewtask', $error);
			$this->load->view('template/kaki');
			return;
		}
		$data = array('upload_data' => $this->upload->data());
		
		
		$id_penugasan = $this->Editor->insertNewTask($new_name);

	$msg = '';
		$this->load->view('template/headerEditor');
		$this->load->view('mmt/addnewtasksuccess', array("msg" => $msg));
		$this->load->view('template/kaki');
		return;
	}

	public function selectPotentialReviewer()
	{
		$this->load->helper(array('url'));
		$this->load->model('editor');
		$results = $this -> editor -> selectPotentialReviewer();
	
		$this->load->view("template/headerEditor");
		$this->load->view("mmt/selectpotentialreviewer", array('reviewer' => $results));
		$this->load->view("template/kaki");
	}

	public function commitPayment()
	{
		$this->load->helper(array('url','form'));
		$this->load->model('editor');
		$results = $this -> editor -> viewUnpaidTask();
		$this->load->view("template/headerEditor");
		$this->load->view("mmt/commitpayment", array('task' => $results));
		$this->load->view("template/kaki");
	}

	public function committingPayment()
	{

		$this->load->helper(array('form', 'url', 'security'));
		$this->load->model('Editor');
		$this->load->library(array('form_validation'));


		$config['upload_path']          = './bukti/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 10000;
		$config['max_length']			= 500;
		$config['max_height']			= 500;

		$new_name = str_replace(' ', '_', time() . '_'. $_FILES["userfile"]['name']);
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);

	/*	$msg='';
		if (!$this->upload->do_upload('bukti')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/headerEditor', array("msg" => $msg));
			$this->load->view('mmt/commitPayment', array('task' => $results));
			$this->load->view('template/kaki');
			return;
		}*/
		$data = array('upload_data' => $this->upload->data());
		
		
		$this->Editor->committingPayment($new_name);

	$msg = '';
		$this->load->view('template/headerEditor');
		$this->load->view('mmt/commitpaymentsuccess', array("msg" => $msg));
		$this->load->view('template/kaki');
		return;
	}

	public function confirmTaskCompletion()
    {
        $this->load->helper(array('url'));
		$this->load->model('editor');
		$results = $this -> editor -> ViewReviewedTask();
		$this->load->view("template/headerEditor");
		$this->load->view("mmt/confirmtaskcompletion", array('task' => $results));
		$this->load->view("template/kaki");
    }

	public function confirmingTaskCompletion()
	{
		$msg = '';
		$this->load->helper(array('url'));
		$this->load->model('editor');
		$this->load->view('template/headerEditor');
		$this->load->view('mmt/confirmtaskcompletionsuccess', array("msg" => $msg));
		$this->load->view('template/kaki');
		$this->editor->confirmingTaskCompletion();

	}

	public function ViewTask()
    {

        $this->load->model('editor'); 
        $results1 = $this -> editor -> ViewUploadedTask();
        $results2 = $this -> editor -> ViewAcceptedTask();
        //var_dump($results2);
        $results3 = $this -> editor -> ViewRejectedTask();
        $this->load->view('template/headerEditor');
        $this->load->view('mmt/ViewTask',
            array('task1'=> $results1, 'task2'=>$results2, 'task3'=>$results3));
        $this->load->view('template/kaki');

    }

	public function downloadFile($file_penugasan)
    {
        $this->load->helper('download');
        $filepath = 'artikel/'.$file_penugasan;
        force_download($filepath, NULL);
    }

	public function downloadReviewedFile($file_penugasan)
    {
        $this->load->helper('download');
        $filepath = 'hasil/'.$file_penugasan;
        force_download($filepath, NULL);
    }

	

	
}
