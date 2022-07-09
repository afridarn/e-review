<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Makelaar extends CI_Model
{


function MonitorProgressOfTask()
    {
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel";
        $res = $this->db->query($thequery);

        return $res->result_array();
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

    function getListEditor()
    {
        $this->db->SELECT('users.nama,users.id_user, users.sts_user,member.id_user,member.id_grup,editor.id_user,users.date_created');
        $this->db->FROM('users,member,editor');
        $this->db->WHERE('editor.id_user=users.id_user');
        $this->db->WHERE('member.id_grup= 1');
        $this->db->WHERE('users.id_user= member.id_user');


        $res = $this->db->get();
        return $res->result();
    }


    function enable($where)
    {
        $thequery = "UPDATE users
                    SET sts_user = '1'
                    WHERE id_user=" . ($where);
        $this->db->query($thequery);
    }
    function disable($where)
    {
        $thequery = "UPDATE users
                    SET sts_user = '0'
                    WHERE id_user=" . ($where);
        $this->db->query($thequery);
    }

    function getListPayment()
    {
        $this->db->SELECT('users.nama, penugasan.tgl_deadline, artikel.judul,artikel.id_artikel,penugasan.id_user,users.email,penugasan.sts_penugasan');
        $this->db->FROM('users,penugasan,artikel,reviewer');
        $this->db->WHERE('users.id_user = reviewer.id_user');
        $this->db->WHERE('users.id_user = penugasan.id_user');
        $this->db->WHERE('artikel.id_artikel = penugasan.id_artikel');
        $this->db->WHERE('penugasan.sts_penugasan = 2');

        $res = $this->db->get();
        return $res->result();
    }


    function ConfirmP($where)
    {
        $thequery = "UPDATE penugasan
                    SET sts_penugasan = '3'
                    WHERE id_penugasan=" . ($where);
        $this->db->query($thequery);
    }
    function ViewPaidTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t2.sts_penugasan = '2'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }

}