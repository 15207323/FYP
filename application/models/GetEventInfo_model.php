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

//    member

    public function get_event() {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventCreateTime,eventStartTime,eventEndTime,eventMinParti,eventMaxParti,eventRestaurantName");
        $this->db->from('diningevent');
        $this->db->order_by('eventID','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_particular_event($id) {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventAim,eventDesc,eventCreateTime,eventStartTime,eventEndTime,eventMinParti,eventMaxParti,eventEstFee,eventRestaurantName,eventAddress");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);
        $this->db->order_by('eventID','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_adminparticular_event($id) {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventAim,eventDesc,eventCreateTime,eventStartTime,eventEndTime,eventMinParti,eventMaxParti,eventEstFee,eventMemberPoint,eventRestaurantName,eventAddress");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);
        $this->db->order_by('eventID','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_created_event($name) {

        $this->db->select("eventID,eventCreatorName,eventTitle,eventCreateTime,eventStartTime,eventEndTime,eventMinParti,eventMaxParti,eventRestaurantName");
        $this->db->from('diningevent');
        $this->db->where('eventCreatorName',$name);
        $this->db->order_by('eventID','DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_eventpoint($id) {
        $this->db->select("eventMemberPoint");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);

        return $this->db->get()->row()->eventMemberPoint;
    }

    public function get_eventmax($id) {
        $this->db->select("eventMaxParti");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);

        return $this->db->get()->row()->eventMaxParti;
    }

    public function get_eventcreatorname($id) {
        $this->db->select("eventCreatorName");
        $this->db->from('diningevent');
        $this->db->where('eventID',$id);

        return $this->db->get()->row()->eventCreatorName;
    }

    public function get_jointevent($id){

        $this->db->select('diningeventparticipant.*,diningevent.eventID,diningevent.eventCreatorName,diningevent.eventTitle,diningevent.eventCreateTime,diningevent.eventStartTime,diningevent.eventEndTime,diningevent.eventMinParti,diningevent.eventMaxParti,diningevent.eventRestaurantName');
        $this->db->from('diningeventparticipant,diningevent');
        $this->db->where('diningeventparticipant.eventParticipantID',$id);
        $this->db->where('diningeventparticipant.eventID = diningevent.eventID');

        $query = $this->db->get();

        return $query->result();


    }


}
?>