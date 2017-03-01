<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
class JoinEvent_model extends CI_Model
{
    public function join_event($eid,$mid) {

        $array = array('eventID'=>$eid, 'eventParticipantID'=>$mid);

        $this->db->select('eventID,eventParticipantID');
        $this->db->from('diningeventparticipant');
        $this->db->where('eventID',$eid);
        $this->db->where('eventParticipantID',$mid);
        $this->db->limit(1);

        $query = $this->db->get();



        if ($query->num_rows() == 0) {

            $this->db->insert('diningeventparticipant',$array);

            return true;
        } else {
            return false;
        }

    }

    public function get_eventpartinum($eid) {

        $this->db->select('eventID');
        $this->db->from('diningeventparticipant');
        $this->db->where('eventID',$eid);
        $query = $this->db->count_all_results();
        if ($query > 0 )
        {
            return $query;
        }
        return 0;

    }

    public function check_eventjoint($eid,$mid){

        $this->db->select('eventID,eventParticipantID');
        $this->db->from('diningeventparticipant');
        $this->db->where('eventID',$eid);
        $this->db->where('eventParticipantID',$mid);
        $this->db->limit(1);

        $query = $this->db->get();


        if ($query->num_rows() == 0) {

            return false;
        } else {
            return true;
        }



    }




}
