<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class EditRest_model extends CI_Model
{
    public function update_restaurantinfo($inputdata,$id) {

        $this->db->where('restID',$id);
        $this->db->update('restaurant',$inputdata);

    }


}
