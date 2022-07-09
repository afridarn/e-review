<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Model
{


    public function insertNewTask($new_name)
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $harga = $this->input->post('jumlahkata');

        $thequery ="INSERT INTO artikel (judul, penulis, kata_kunci, jumlah_kata, bidang_ilmu, id_user)
                    VALUES (
                            '" . $this->input->post('judul')     . "',
                            '" . $this->input->post('authors') . "',
                            '" . $this->input->post('katakunci') . "',
                            '" . $this->input->post('jumlahkata')    . "',
                            '" . $this->input->post('bidangilmu')    . "',
                            " . $id_user . "
                            )";
        $this->db->query($thequery);

        $id_artikel = $this->db->insert_id();

        $thequery3 ="UPDATE artikel SET filename='".$new_name."' WHERE id_artikel=".$id_artikel;
        $this->db->query($thequery3);

        $rp = 25;
        $biaya = $harga * $rp;
        
        $thequery2="INSERT INTO penugasan (id_user, id_artikel, tgl_penugasan, biaya, tgl_deadline)
                    VALUES (
                            '" . $this->input->post('iduserreviewer')    . "',
                            ". $id_artikel .",
                            now(),
                            ".$biaya.",
                            '" . $this->input->post('deadline')    . "'
                            )";
        $this->db->query($thequery2);
        $id_penugasan = $this->db->insert_id();
        

        return $this->db->insert_id();
    }

    function ViewUploadedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t0.id_user = $id_user AND ( t2.sts_penugasan = '1' OR t2.sts_penugasan = '2' OR t2.sts_penugasan = '3')";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }
    function ViewAcceptedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t0.id_user = $id_user AND t2.sts_penugasan = '4'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }
    function ViewRejectedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t0.id_user = $id_user AND t2.sts_penugasan = '5'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }

   
    function SelectPotentialReviewer($sts=1)
    {
        $query = "SELECT * FROM reviewer WHERE sts_reviewer = " .$sts; 
        $res = $this ->db-> query($query); 

        return $res->result_array(); 
    }

    function viewUnpaidTask(){
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t0.id_user = $id_user AND t2.sts_penugasan = '1'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }

    function committingPayment($new_name){
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $id_penugasan=$this->input->post('idpenugasan');
        $thequery = "UPDATE penugasan SET sts_penugasan=2, date_updated=NOW()
                        WHERE id_penugasan= '$id_penugasan'";
        $res = $this->db->query($thequery);

        $thequery3 ="UPDATE penugasan SET buktitf='".$new_name."' WHERE id_penugasan= '$id_penugasan'";
        $this->db->query($thequery3);
    }

    function getListTask()
    {
        $this->db->SELECT('users.nama, penugasan.tgl_deadline, artikel.judul,artikel.id_artikel,penugasan.id_user,users.email,penugasan.sts_penugasan');
        $this->db->FROM('users,penugasan,artikel,reviewer');
        $this->db->WHERE('users.id_user = reviewer.id_user');
        $this->db->WHERE('users.id_user = penugasan.id_user');
        $this->db->WHERE('artikel.id_artikel = penugasan.id_artikel');
        $this->db->WHERE('penugasan.sts_penugasan = 4');

        $res = $this->db->get();
        return $res->result();
    }
   

    function ViewReviewedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t0.id_user = $id_user AND t2.sts_penugasan='4'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }

    function confirmingTaskCompletion()
    {
        $idpenugasan = $this->input->post('idpenugasan2');
        $thequery = "UPDATE penugasan SET sts_penugasan=6 WHERE id_penugasan=' ". $idpenugasan . "'";
        $res = $this->db->query($thequery);

     /*   $thequery2 = "SELECT biaya FROM penugasan WHERE id_penugasan=' ". $idpenugasan. "' ";
        $result = $this->db->query($thequery2);
        $balance = $result[0]['biaya']; */

        $this->db->select('biaya');
        $this->db->from('penugasan');
        $this->db->where('penugasan.id_penugasan', $idpenugasan);
            $result8 = $this->db->get()->result_array();
            $balance = $result8[0]['biaya'];

      /*  $thequery3 = "SELECT id_user FROM penugasan WHERE id_penugasan =' ". $idpenugasan. "' ";
        $result2 = $this->db->query($thequery3);
        $idreviewer = $result2[0]['id_user'];*/

        $this->db->select('id_user');
        $this->db->from('penugasan');
        $this->db->where('penugasan.id_penugasan', $idpenugasan);
            $result8 = $this->db->get()->result_array();
            $idreviewer = $result8[0]['id_user'];
       
        $thequery4 = "UPDATE reviewer SET balance = '$balance' WHERE id_user='$idreviewer'";
        $this->db->query($thequery4);
    }

   /* function addBalance()
    {
        $thequery2 = "SELECT biaya FROM penugasan WHERE id_penugasan=' ". $this->input->post('idpenugasan2'). "' ";
        $balance = $this->db->query($thequery2);

        $thequery3 = "SELECT id_user FROM penugasan WHERE id_penugasan =' ". $this->input->post('idpenugasan2'). "' ";
        $idreviewer = $this->db->query($thequery3);
        $thequery4 = "UPDATE reviewer SET balance = '$balance' WHERE id_user='$idreviewer'";    
    }*/
    
}
    

