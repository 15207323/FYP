<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/23/2016
 * Time: 3:03 PM
 */
class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    function index()
    {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['title'] = 'Home';
            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);
            $this->load->view('home_view', $data);
            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('Welcome', 'refresh');
    }

}

?>