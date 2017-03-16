<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class RemarkForm_model extends CI_Model
{
    public function remark($inputdata,$id) {

        $this->db->where('contactID',$id);
        $this->db->update('contactform',$inputdata);

    }


}
