<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/27/2016
 * Time: 5:22 PM
 */
class SearchEvent_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function search($id)
    {
        $this->db->select('eventID');
        $this->db->from('diningevent');
        $this->db->where('eventID', $id);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}