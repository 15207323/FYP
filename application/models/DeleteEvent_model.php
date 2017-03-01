<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class DeleteEvent_model extends CI_Model
{
    public function delete_event($id) {

        $this->db->where('eventID',$id);
        $this->db->delete('diningevent');

    }

    public function delete_jointevent($eid) {

        $this->db->where('eventID',$eid);
        $this->db->delete('diningeventparticipant');

    }
}
