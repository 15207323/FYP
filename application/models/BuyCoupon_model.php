<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class BuyCoupon_model extends CI_Model
{
    public function buy_coupon($cid,$mid) {

        $array = array('memberID'=>$mid,'couponID'=>$cid);

        $this->db->select('memberID,couponID');
        $this->db->from('ownedcoupon');
        $this->db->where('couponID',$cid);
        $this->db->where('memberID',$mid);
        $this->db->limit(1);

        $query = $this->db->get();



        if ($query->num_rows() == 0) {

            $this->db->insert('ownedcoupon',$array);

            return true;
        } else {
            return false;
        }

    }

    public function check_couponowned($cid,$mid){

        $this->db->select('couponID,memberID');
        $this->db->from('ownedcoupon');
        $this->db->where('couponID',$cid);
        $this->db->where('memberID',$mid);
        $this->db->limit(1);

        $query = $this->db->get();


        if ($query->num_rows() == 0) {

            return true;
        } else {
            return false;
        }

    }

    public function minus_couponnum($cid) {

        $this->db->set('couponMaxOwned', 'couponMaxOwned-1', false);
        $this->db->where('couponID' , $cid);
        $this->db->update('coupon');
    }


}
