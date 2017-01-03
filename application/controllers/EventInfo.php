<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
        /**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:33 PM
 */
class EventInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetEventInfo_model');
        $this->load->library('form_validation');
//        $this->load->model('SearchEvent_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Dining Event';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_event();
            $this->load->view('showallevent_view',$this->data);

            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function view($id = '') {

        if($this->session->userdata('logged_in')){

            $data['title'] = 'View Dining Event Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($id);


            $this->load->view('showparticularevent_view',$this->data);

            $this->load->view('template/footer');



        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }



}