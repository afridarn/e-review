<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageAllTasks extends CI_Controller {

	public function index(){
		$this->load->helper(array('url'));
		$this->load->view("template/headerMakelaar");
		$this->load->view("makelaar");
		$this->load->view("template/kaki");
	}

	public function monitorProgressofTask()
	{
		$this->load->helper(array('url'));
		$this->load->model('makelaar');
		$results = $this -> makelaar -> monitorProgressofTask();
		$this->load->view("template/headerMakelaar");
		$this->load->view("mat2/monitorprogressoftask", array('task' => $results));
		$this->load->view("template/kaki");
	}

/*	public function confirmTaskCompletion()
    {
        //load model 
        $this->load->model('makelaar');

        //memanggil fungsi yang mengeksekusi query yang diminta
        $data['task'] = $this->makelaar->getListTask();

        $this->load->helper(array('url'));
        $this->load->view("template/headerMakelaar");
        $this->load->view('mat2/confirmtaskcompletion', $data);
        $this->load->view("template/kaki");
    } */

	public function confirm($id_user)
    {
        $this->load->model('makelaar');
        //memanggil fungsi yang mengeksekusi query yang diminta
        $this->makelaar->Confirm($id_user);
        redirect('ManageAllTasks/confirmTaskCompletion');
    }

	public function manageEditors()
    {

        //load model 
        $this->load->model('makelaar');

        //memanggil fungsi yang mengeksekusi query yang diminta
        $data['editor'] = $this->makelaar->getListEditor();


        $this->load->view("template/headerReviewer");
        $this->load->view("mat2/manageeditors", $data);
        $this->load->view("template/kaki");
    }

	public function enable($id_user)
    {
        $this->load->model('makelaar');
        //memanggil fungsi yang mengeksekusi query yang diminta
        $this->makelaar->enable($id_user);
        redirect('ManageAllTasks/manageeditors');
    }

    public function disable($id_user)
    {
        $this->load->model('makelaar');
        //memanggil fungsi yang mengeksekusi query yang diminta
        $this->makelaar->disable($id_user);
        redirect('ManageAllTasks/manageeditors');
    }


    public function CP()
    {
        //load model 
        $this->load->model('makelaar');

        //memanggil fungsi yang mengeksekusi query yang diminta
        $results = $this -> makelaar -> ViewPaidTask();
        $this->load->helper(array('url'));
        $this->load->view("template/headerReviewer");
        $this->load->view('mat2/ConfirmTaskCompletion', array('task'=> $results));
        $this->load->view("template/kaki");
    }

    public function confirmP($id_user)
    {
        $this->load->model('makelaar');
        //memanggil fungsi yang mengeksekusi query yang diminta
        $this->makelaar->ConfirmP($id_user);
        redirect('ManageAllTasks/CP');
    }
    public function downloadFile($file_penugasan)
    {
        $this->load->helper('download');
        $filepath = 'artikel/'.$file_penugasan;
        force_download($filepath, NULL);
    }
    public function downloadBuktiTf($BuktiTf)
    {
        $this->load->helper('download');
        $filepath = 'bukti/'.$BuktiTf;
        force_download($filepath, NULL);
    }
}
