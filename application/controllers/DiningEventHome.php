<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/28/2016
 * Time: 11:40 PM
 */
class DiningEventHome extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'Dining Event Home';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation_memberhome', $data);
            $this->load->view('diningeventhome_view');
            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function search() {

        if($this->session->userdata('logged_in')){

            $this->load->library('form_validation');

            $config = array(

                array(
                    'field' => 'restName',
                    'label' => 'Restaurant Name',
                    'rules' => 'trim|exist[restaurant.restaurantName]',
                ),
            );

            $this->form_validation->set_rules($config);
            $memberName = $this->security->xss_clean($this->input->post('restName'));

            if($this->form_validation->run() == FALSE)
            {
                $session_data = $this->session->userdata('logged_in');
                $data['adminName'] = $session_data['adminName'];

                $data['title'] = 'View All Member';

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);

                $this->data['restInfo']=$this->GetRestaurantInfo_model->get_restaurant();
                $this->load->view('restauranthome_view',$this->data);

                $this->load->view('template/footer');
            }
            else
            {
                $session_data = $this->session->userdata('logged_in');

                $this->security->xss_clean($this->input->post('memberName'));
                $this->data['restInfo']=$this->GetRestaurantInfo_model->get_particular_restaurant($restName);


                $data['adminName'] = $session_data['adminName'];
                $data['title'] = 'View User Information';

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);

                $this->load->view('showparticularrestaurant_view',$this->data);

                $this->load->view('template/footer');
            }

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }



    }

}