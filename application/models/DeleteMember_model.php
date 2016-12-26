<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class DeleteMember_model extends CI_Model
{
    public function delete_member($name) {

        $this->db->where('memberName',$name);
        $res = $this->db->delete('member');
        if($res)
            return TRUE;
        else
            return FALSE;
    }
}
