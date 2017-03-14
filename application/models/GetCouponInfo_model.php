<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:12 PM
 */
class GetCouponInfo_model extends CI_Model
{

//    member

    public function get_coupon() {

        $this->db->select("couponID,couponTitle");
        $this->db->from('coupon');
        $this->db->order_by('couponID','DESC');
        $query = $this->db->get();
        return $query->result();

    }


    public function get_particular_coupon($id) {

        $this->db->select("couponID,couponTitle,couponDesc,couponMemberPointNeed,couponExpireDay,couponMaxOwner");
        $this->db->from('coupon');
        $this->db->where('couponID',$id);
        $query = $this->db->get();
        return $query->result();

    }



}
?>