<?php
Class Reviewer extends CI_Model
{

    function ViewRequestedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t2.id_user = $id_user AND t2.sts_penugasan = '3'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }
    function ViewAcceptedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t2.id_user = $id_user AND t2.sts_penugasan = '4'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }
    function ViewRejectedTask()
    {
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $thequery = "SELECT * FROM artikel t0
                           INNER JOIN penugasan t2 ON t0.id_artikel=t2.id_artikel
                           WHERE t2.id_user = $id_user AND t2.sts_penugasan = '5'";
        $res = $this->db->query($thequery);

        return $res->result_array();
    }
    function AcceptTask($id_penugasan)
    {
        $query = "UPDATE penugasan SET sts_penugasan ='4'WHERE id_penugasan = $id_penugasan";
        $this->db->query($query);
    }
    function RejectTask($id_penugasan)
    {
        $query = "UPDATE penugasan SET sts_penugasan ='5'WHERE id_penugasan = $id_penugasan";
        $this->db->query($query);
    }

    function get_reviewer_balance($id_user)
    {
        $this->db->select('*');
        $this->db->from('reviewer');
        $this->db->where('id_user', $id_user);
        $this->db->where('sts_reviewer', 1);
        return $this->db->get()->result_array();
    }
    function get_funds($id_user, $balance, $withdraw)
    {
            $balance_new = $balance - $withdraw;
            $this->db->set('balance', $balance_new);
            $this->db->set('date_updated', date('Y-m-d H:i:s'));
            $this->db->where('id_user', $id_user);
            $this->db->update('reviewer');
    }

    function getListArticle()
    {
        $this->db->SELECT('artikel.penulis, penugasan.tgl_deadline, artikel.judul, users.email,artikel.id_artikel,artikel.date_created,penugasan.sts_penugasan,artikel.id_user,penugasan.id_user,member.id_user,member.id_grup');
        $this->db->FROM('users,penugasan,artikel,reviewer');
        $this->db->WHERE('penugasan.id_user = reviewer.id_user');
        $this->db->WHERE('users.id_user = reviewer.id_user');
        $this->db->WHERE('artikel.id_artikel = penugasan.id_artikel');
        $this->db->WHERE('penugasan.sts_penugasan = 1');
        $this->db->WHERE('users.id_user = member.id_user');

        $res = $this->db->get();
        return $res->result();
    }


    function addingReview($new_name){
        $id_user = $this->session->userdata("logged_in")["id_user"];
        $id_penugasan=$this->input->post('idpenugasan');
        $thequery = "UPDATE penugasan SET date_updated=NOW()
                        WHERE id_penugasan= '$id_penugasan'";
        $res = $this->db->query($thequery);

        $thequery3 ="UPDATE penugasan SET reviewfile='".$new_name."' WHERE id_penugasan= '$id_penugasan'";
        $this->db->query($thequery3);
    }

}
?>