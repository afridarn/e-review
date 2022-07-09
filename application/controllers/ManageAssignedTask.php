<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAssignedTask extends CI_Controller {

	public function index(){
		$this->load->helper(array('url'));
		$this->load->view("template/headerReviewer");
		$this->load->view("reviewer");
		$this->load->view("template/kaki");
	}

	public function ViewAssignedTask()
    {
        $this->load->model('reviewer');
        $results1 = $this -> reviewer -> ViewRequestedTask();
        $results2 = $this -> reviewer -> ViewAcceptedTask();
        $results3 = $this -> reviewer -> ViewRejectedTask();
        $this->load->view('template/headerMakelaar');
        $this->load->view('mat/ViewAssignedTask', 
            array('task1'=> $results1, 'task2'=>$results2, 'task3'=>$results3));
        $this->load->view('template/kaki');
    }

	public function AcceptTask($id_penugasan)
    {
        $this->load->model('reviewer');
        $this->reviewer->AcceptTask($id_penugasan);
        redirect('ManageAssignedTask');
    }

    public function RejectTask($id_penugasan)
    {
        $this->load->model('reviewer');
        $this->reviewer->RejectTask($id_penugasan);
        redirect('ManageAssignedTask');
    }

    public function submitReview()
	{
		$this->load->helper(array('url','form'));
		$this->load->model('reviewer');
		$results = $this -> reviewer -> viewAcceptedTask();
		$this->load->view("template/headerReviewer");
		$this->load->view("mat/submitReview", array('task' => $results));
		$this->load->view("template/kaki");
	}

    public function addingReview()
	{

		$this->load->helper(array('form', 'url', 'security'));
		$this->load->model('reviewer');
		$this->load->library(array('form_validation'));


		$config['upload_path']          = './hasil/';
		$config['allowed_types']        = 'docx|doc|pdf';
		$config['max_size']             = 100;

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
		
		
		$this->reviewer->addingReview($new_name);

	$msg = '';
		$this->load->view('template/headerReviewer');
		$this->load->view('mat/submitreviewsuccess', array("msg" => $msg));
		$this->load->view('template/kaki');
		return;
	}
    

	public function withdraw_funds()
    {
		$this->load->helper(array('url','form'));
        $this->load->model('reviewer');
        $session_data = $this->session->userdata('logged_in');
        $id_user = $session_data['id_user'];
        $results = $this-> reviewer->get_reviewer_balance($id_user);
        $this->load->view("template/headerReviewer");
        $this->load->view("mat/deductfunds", array('reviewer' => $results));
        $this->load->view("template/kaki");
    }

    public function withdrawing_funds()
    {
		$this->load->helper(array('url','form'));
        $this->load->model('reviewer');
        $session_data = $this->session->userdata('logged_in');
        $id_user = $session_data['id_user'];
        $reviewer = $this->reviewer->get_reviewer_balance($id_user);
        $balance = $reviewer[0]['balance'];
        $withdraw = $this->input->post('withdraw');
        if($withdraw>$balance)
        {

            $this->session->set_flashdata('fail_max_deduct_funds', 'The amount of balance you want to withdraw exceeded your amount of balance');
            redirect('manageassignedtask/withdraw_funds');
        }
        else if ($withdraw<5000)
        {
            $this->load->model('reviewer');
            $this->session->set_flashdata('fail_min_deduct_funds', 'Minimum amount to withdraw is Rp10000');
            redirect('manageassignedtask/withdraw_funds');
        }
        else
        {
            $this->load->model('reviewer');
            $this->reviewer->get_funds($id_user, $balance, $withdraw);

            $this->session->set_flashdata('success_deduct_funds', 'Your balance have been successfully');
            redirect('manageassignedtask/withdraw_funds');
        }
    }

}
