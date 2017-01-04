<?php

/**
 * Created by PhpStorm.
 * User: san
 * Date: 1/4/2017
 * Time: 1:36 PM
 */
class EditPoint_model extends CI_Model
{

    public function event_addpoint($name,$point) {

        $this->db->set('memberPoint','memberPoint + '. (int)$point,FALSE);
        $this->db->where('memberName',$name);
        $this->db->update('member');

    }

}