<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/28/2016
 * Time: 11:40 PM
 */
class DiningEvent extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->library('form_validation');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'Dining Event Home';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);
            $this->load->view('diningeventhome_view');
            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

}