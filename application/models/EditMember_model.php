<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class EditMember_model extends CI_Model
{
    public function update_memberinfo($inputdata,$username) {

        $this->db->where('memberName',$username);
        $this->db->update('member',$inputdata);

    }


}
