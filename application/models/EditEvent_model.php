<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class EditEvent_model extends CI_Model
{
    public function update_eventinfo($inputdata,$id) {

        $this->db->where('eventID',$id);
        $this->db->update('diningevent',$inputdata);

    }


}
