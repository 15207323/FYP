<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/23/2016
 * Time: 22:32 PM
 */
class AdminHome extends CI_Controller {

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
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'Administrator Home';
            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/sidebar_admin', $data);
            $this->load->view('adminhome_view', $data);
            $this->load->view('template/footer_admin');


        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('adminID');
        $this->session->unset_userdata('adminName');
        session_destroy();
        redirect('Welcome', 'refresh');
    }

}

?>