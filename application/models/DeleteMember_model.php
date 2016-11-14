<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/11/2016
 * Time: 4:10 PM
 */
class DeleteMember_model extends CI_Model
{
    public function delete_member($table, $where = array()) {
        $this->db->where($where);
        $res = $this->db->delete($table);
        if($res)
            return TRUE;
        else
            return FALSE;
    }
}