<?php
Class Master extends CI_Model
{

    function getListReviewers()
    {
        $query = "SELECT * FROM reviewer";
        $res = $this->db->query($query);

        return  $res->result_array();
    }


}
?>