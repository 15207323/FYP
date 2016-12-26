<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/26/2016
 * Time: 4:48 PM
 */
class EditMember_model extends CI_Model
{
    function __construct() {

        parent::__construct();
        $this->load->database();

    }

    function update_member(){

        $update = array(

        );

        $this->db->where('memberName', $name);
        $this->db->update('member', $update);

    }


}

?>