<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/25/2016
 * Time: 2:03 AM
 */
class login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('encrypt');
    }

    function login($memberEmail, $memberPwd)
    {
        $this->db->select('memberName, memberID, memberEmail, memberPwd');
        $this->db->from('member');
        $this->db->where('memberEmail', $memberEmail);
        $this->db->where('memberPwd',$memberPwd);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>