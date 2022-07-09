<?php
Class Account extends CI_model
{
    function insertNewUser()
    {

        $roles = $this->input->post('roles');

        //membuat record baru di tabel users
        $thequery ="INSERT INTO users (nama, username, pwd, email)
                    VALUES (
                            '" . $this->input->post('nama')     . "',
                            '" . $this->input->post('username') . "',
                            '" . md5($this->input->post('katasandi')) . "',
                            '" . $this->input->post('email')    . "'
                            )";
        $this->db->query($thequery);

        //ambil id-user yang baru hasil insertion
        $id_user = $this->db->insert_id();

        //membuat record baru di reviewer/editor
        foreach ($roles as $item) {
            $peran = $item;
            if($peran=='1') {
                $thequery2 = "INSERT INTO editor (nama, email, id_user, date_updated)
                VALUES (' ". $this->input->post('nama'). "',' "
                               . $this->input->post('email') . "',". $id_user . ", now())";
                $this->db->query($thequery2);

                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated)
                VALUES (". $id_user . ", ". $peran . ", now())";
                $this->db->query($thequery3);
            } elseif ($peran==2) {
                $thequery2 = "INSERT INTO reviewer (nama, email, id_user, date_updated)
                VALUES (' ". $this->input->post('nama'). "',' "
                               . $this->input->post('email') . "',". $id_user . ", now())";
                $this->db->query($thequery2);

                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated)
                VALUES (". $id_user . ", ". $peran . ", now())";
                $this->db->query($thequery3);
            } else {
                $thequery2 = "INSERT INTO makelaar (nama, email, id_user, date_updated  )
                VALUES (' ". $this->input->post('nama'). "',' "
                               . $this->input->post('email') . "',". $id_user . ", now())";
                $this->db->query($thequery2);
                
                $thequery3 = "INSERT INTO member (id_user, id_grup, date_updated)
                VALUES (". $id_user . ", ". $peran . ", now())";
                $this->db->query($thequery3);
            }
        }

        return $id_user;
    }

    function getIDUser()
    {
        /*$query = "  SELECT t1.*, t3.id_grup, t3.nama_grup FROM (SELECT * FROM users t0
                        WHERE t0.username = '" . $this->input->post('username') . "'
                        AND t0.pwd = MD5('" . $this->input->post('katasandi') . "')
                        AND t0.sts_user = 1) t1
                            INNER JOIN member t2 ON t1.id_user=t2.id_user AND t2.sts_member = 1
                           iNNER JOIN grup t3 ON t2.id_grup=t3.id_grup AND t3.sts_grup = 1";*/
                           $query = "SELECT * FROM users t0
                           INNER JOIN member t2 ON t0.id_user=t2.id_user AND t2.sts_member = 1
                           WHERE t0.username = '" . $this->input->post('username') . "'
                           AND t0.pwd = MD5('" . $this->input->post('katasandi') . "')
                           AND t0.sts_user = 1";
                    
        $res = $this->db->query($query);
        $users = $res->result_array();
        if(count($users)>0)
        {
            return $users;
        } 
        else
        {
            return[];
        }
            
    }
}