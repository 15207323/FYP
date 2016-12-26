<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/9/2016
 * Time: 5:48 PM
 */
class GetMemberInfo_model extends CI_Model
{

    public function get_member() {

        $this->db->select("memberID,memberName,memberEmail");
        $this->db->from('member');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_particular_member($name) {

        $this->db->select("memberID,memberName,memberPwd,memberEmail,memberTel,memberPoint");
        $this->db->from('member');
        $this->db->where('memberName',$name);
        $query = $this->db->get();
        return $query->result();

    }

}

?>