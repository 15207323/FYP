<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/10/2016
 * Time: 7:40 PM
 * http://localhost/dinetgt/memberdata
 */
class UserInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetMemberInfo_model');
    }

    public function view($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['title'] = 'View User Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($name);
            $this->load->view('showuser_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

}?>