<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:12 PM
 */
class GetEventInfo_model extends CI_Model
{

    public function get_event() {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventCreateTime,eventStartTime,eventEndTime,eventRestaurantName");
        $this->db->from('diningevent');
        $this->db->order_by('eventID','DSC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_particular_event($id) {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventAim,eventDesc,eventCreateTime,eventStartTime,eventEndTime,eventMinParti,eventMaxParti,eventEstFee,eventRestaurantName,eventAddress");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);
        $query = $this->db->get();
        return $query->result();

    }

    public function get_created_event($name) {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventCreateTime,eventStartTime,eventEndTime,eventRestaurantName");
        $this->db->from('diningevent');
        $this->db->where('eventCreatorName',$name);
        $query = $this->db->get();
        return $query->result();

    }



}
?>