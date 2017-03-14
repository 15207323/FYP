<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/28/2016
 * Time: 11:40 PM
 */
class CouponHome extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetCouponInfo_model');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'Coupon Home';

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                $session_data = $this->session->userdata('logged_in');
                $data['adminName'] = $session_data['adminName'];

                $this->data['couponInfo']=$this->GetCouponInfo_model->get_coupon();

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);
                $this->load->view('couponhome_view',$this->data);

            }
            else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $session_data = $this->session->userdata('logged_in');
                $data['memberName'] = $session_data['memberName'];

                $this->data['couponInfo']=$this->GetCouponInfo_model->get_coupon();

                $this->load->view('template/navigation_memberhome', $data);
                $this->load->view('template/header', $data);
                $this->load->view('couponhome_view',$this->data);

            }


            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

}