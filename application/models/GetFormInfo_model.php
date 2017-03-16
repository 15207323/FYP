<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:12 PM
 */
class GetFormInfo_model extends CI_Model
{


    public function get_form()
    {

        $this->db->select("contactID,contactPerson,contactTitle,contactRemark");
        $this->db->from('contactform');
        $this->db->order_by('contactID', 'DESC');
        $query = $this->db->get();
        return $query->result();

    }


    public function get_particular_form($id)
    {

        $this->db->select("contactID,contactPerson,contactEmail,contactTitle,contactContent,contactSentTime,contactRemark");
        $this->db->from('contactform');
        $this->db->where('contactID', $id);
        $query = $this->db->get();
        return $query->result();

    }
}


?>