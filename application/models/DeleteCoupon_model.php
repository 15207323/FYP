<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class DeleteCoupon_model extends CI_Model
{

    public function delete_coupon($id) {

        $this->db->where('couponID',$id);
        $this->db->delete('coupon');

    }




}
