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

    public function get_memberpoint($id) {

        $this->db->select("memberPoint");
        $this->db->from('member');
        $this->db->where('memberID',$id);

        return $this->db->get()->row()->memberPoint;

    }

    public function get_memberid($name) {

        $this->db->select("memberID");
        $this->db->from('member');
        $this->db->where('memberName',$name);

        return $this->db->get()->row()->memberID;

    }


    public function get_membername($id) {

        $this->db->select("memberName");
        $this->db->from('member');
        $this->db->where('memberID',$id);

        return $this->db->get()->row()->memberName;

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