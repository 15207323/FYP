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

    public function get_couponpoint($id) {

        $this->db->select("couponMemberPointNeed");
        $this->db->from('coupon');
        $this->db->where('couponID',$id);

        return $this->db->get()->row()->couponMemberPointNeed;


    }

    public function get_couponowned($id) {

        $this->db->select("couponID,couponMaxOwner");
        $this->db->from('coupon');
        $this->db->where('couponID',$id);

        return $this->db->get()->row()->couponMaxOwner;


    }

    public function get_ownedcoupon($id){

        $this->db->select('ownedcoupon.*,coupon.couponID,coupon.couponTitle,coupon.couponDesc,coupon.couponExpireDay');
        $this->db->from('coupon,ownedcoupon');
        $this->db->where('ownedcoupon.memberID',$id);
        $this->db->where('ownedcoupon.couponID = coupon.couponID');

        $query = $this->db->get();

        return $query->result();


    }



}
?>