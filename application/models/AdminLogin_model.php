<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/25/2016
 * Time: 2:03 AM
 */
class Adminlogin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function login($adminEmail, $adminPwd)
    {
        $this->db->select('adminName, adminID, adminEmail, adminPwd');
        $this->db->from('administrator');
        $this->db->where('adminEmail', $adminEmail);
        $this->db->where('adminPwd',$adminPwd);
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