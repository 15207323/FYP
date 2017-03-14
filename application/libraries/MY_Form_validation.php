<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/23/2016
 * Time: 3:54 AM
 */
class MY_Form_validation extends CI_Form_validation
{
    function __construct()
    {
        parent::__construct();
    }

    function unique($str, $field)
    {
        $CI =& get_instance();
        list($table, $column) = explode('.', $field, 2);

        $CI->form_validation->set_message('unique', 'The %s that you requested is unavailable.');

        $query = $CI->db->query("SELECT COUNT(*) AS dupe FROM $table WHERE $column = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? FALSE : TRUE;
    }

    function exist($str, $field)
    {
        $CI =& get_instance();
        list($table, $column) = explode('.', $field, 2);

        $CI->form_validation->set_message('exist', 'The %s that you requested does not exist.');

        $query = $CI->db->query("SELECT COUNT(*) AS dupe FROM $table WHERE $column = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? TRUE : FALSE;
    }

}

?>