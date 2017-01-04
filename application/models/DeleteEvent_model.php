<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class DeleteEvent_model extends CI_Model
{
    public function delete_event($id) {

        $this->db->where('eventID',$id);
        $res = $this->db->delete('diningevent');
        if($res)
            return TRUE;
        else
            return FALSE;
    }
}
