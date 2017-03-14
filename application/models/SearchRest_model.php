<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/27/2016
 * Time: 5:22 PM
 */
class SearchRest_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }

    function search($name)
    {
        $this->db->select('restID');
        $this->db->from('restaurant');
        $this->db->where('restName', $name);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}