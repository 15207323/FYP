<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/11/2016
 * Time: 11:54 AM
 */
class AddMember extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('AddMember_model');
    }
    function index() {
//Including validation library
        $this->load->library('form_validation');

//        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

//Validating Name Field
        $this->form_validation->set_rules('memberName', 'Username', 'required|min_length[1]|max_length[20]');

//Validating Password Field
        $this->form_validation->set_rules('memberPwd', 'Password', 'required|min_length[1]|max_length[20]');

//Validating Email Field
        $this->form_validation->set_rules('memberEmail', 'Email', 'required|valid_email');

//Validating Mobile no. Field
        $this->form_validation->set_rules('memberTel', 'Mobile No.', 'required|regex_match[/^[0-9]{8}$/]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_member');
        } else {
//Setting values for table columns
            $memberdata = array(

                'memberName' => $this->input->post('memberName'),
                'memberPwd' => $this->input->post('memberPwd'),
                'memberEmail' => $this->input->post('memberEmail'),
                'memberTel' => $this->input->post('memberTel'),
            );
//Transfering data to Model
            $this->AddMember_model->form_insert($memberdata);
            $memberdata['message'] = 'Member added successfully!';
//Loading View
            $this->load->view('add_member', $memberdata);
        }
    }

}

?>