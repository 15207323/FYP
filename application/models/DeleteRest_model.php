<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class DeleteRest_model extends CI_Model
{

    public function delete_restaturant($id) {

        $this->db->where('restID',$id);
        $this->db->delete('restaurant');

    }


}
