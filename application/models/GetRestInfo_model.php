<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:12 PM
 */
class GetRestInfo_model extends CI_Model
{


    public function get_restaurant() {

        $this->db->select("restID,restName,restAddress,restTel,restEmail,restCategory,restAvgRate");
        $this->db->from('restaurant');
        $this->db->order_by('restAvgRate','DESC');
        $query = $this->db->get();
        return $query->result();

    }
       public function adminget_restaurant() {

            $this->db->select("restID,restName,restAddress,restTel,restEmail,restCategory,restAvgRate");
            $this->db->from('restaurant');
            $query = $this->db->get();
            return $query->result();

        }

    public function get_top_restaurant() {

        $this->db->select("restID,restName,restAvgRate");
        $this->db->from('restaurant');
        $this->db->order_by('restAvgRate','DESC');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();

    }

    public function get_particular_restaurant($id) {

        $this->db->select("restID,restName,restAddress,restTel,restEmail,restOpenHr,restAvgPrice,restCategory,restAvgRate");
        $this->db->from('restaurant');
        $this->db->where('restID',$id);
        $query = $this->db->get();
        return $query->result();

    }

    public function get_random_restaurant() {

        $this->db->select("restID,restName,restAddress,restTel,restEmail,restCategory,restAvgRate");
        $this->db->from('restaurant');
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();

    }




}
?>