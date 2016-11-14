<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/11/2016
 * Time: 11:57 AM
 */
class AddMember_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function form_insert($memberdata){
// Inserting in Table(students) of Database(college)
        $this->db->insert('member', $memberdata);
    }

}

?>