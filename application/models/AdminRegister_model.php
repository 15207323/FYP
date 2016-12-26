<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/22/2016
 * Time: 5:51 PM
 */
class AdminRegister_model extends CI_Model
{
    function __construct() {

        parent::__construct();
        $this->load->database();

    }

    function form_insert($admindata){

        $this->db->insert('administrator', $admindata);

    }


}

?>