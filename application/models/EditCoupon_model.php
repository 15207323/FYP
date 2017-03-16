<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class EditCoupon_model extends CI_Model
{
    public function update_couponinfo($inputdata,$id) {

        $this->db->where('couponID',$id);
        $this->db->update('coupon',$inputdata);

    }


}
