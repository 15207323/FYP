<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/28/2016
 * Time: 11:40 PM
 */
class RestaurantHome extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('GetRestInfo_model');
        $this->load->model('SearchRest_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'Restaurant Home';

            $this->data['restInfo']=$this->GetRestInfo_model->get_top_restaurant();
            $this->data['restranInfo']=$this->GetRestInfo_model->get_random_restaurant();

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation_memberhome', $this->data);
            $this->load->view('restauranthome_view');
            $this->load->view('template/footer');

        }
        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

}