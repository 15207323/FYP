<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 3/2/2017
 * Time: 2:57 PM
 */
class CouponInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetCouponInfo_model');
        $this->load->model('GetMemberInfo_model');
        $this->load->library('form_validation');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Coupon';

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                $session_data = $this->session->userdata('logged_in');
                $data['adminName'] = $session_data['adminName'];

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);
                $this->data['couponInfo']=$this->GetCounponInfo_model->get_coupon();
                $this->load->view('showallcoupon_view',$this->data);

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $session_data = $this->session->userdata('logged_in');
                $data['memberName'] = $session_data['memberName'];

                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);
                $this->data['couponInfo']=$this->GetCounponInfo_model->get_coupon();
                $this->load->view('showallcoupon_view',$this->data);

            }

            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function create() {

        if($this->session->userdata('logged_in')) {

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $config = array(

                    array(
                        'field' => 'couponTitle',
                        'label' => 'Title',
                        'rules' => 'trim|required|min_length[5]|max_length[50]',
                    ),

                    array(
                        'field' => 'couponDesc',
                        'label' => 'Description',
                        'rules' => 'trim|required|min_length[10]|max_length[5000]',
                    ),

                    array(
                        'field' => 'couponMemberPointNeed',
                        'label' => 'Member Point',
                        'rules' => 'trim|required|integer|greater_than_equal_to[0]|max_length[3]',
                    ),

                    array(
                        'field' => 'couponExpireDay',
                        'label' => 'Expire Date',
                        'rules' => 'trim|required|callback_datetime_check',
                    ),

                    array(
                        'field' => 'couponMaxNum',
                        'label' => 'Max. Owner',
                        'rules' => 'trim|required|integer|greater_than_equal_to[1]|max_length[2]',
                    ),
                );


                $this->form_validation->set_rules($config);



                if ($this->form_validation->run() == FALSE) {

                    $data['title'] = 'Create Coupon';
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/header', $data);
                    $this->load->view('createcoupon_view');
                    $this->load->view('template/footer');

                } else {

                    $coupondata = array(
                        'couponTitle' => $this->security->xss_clean($this->input->post('couponTitle')),
                        'eventAim' => $this->security->xss_clean($this->input->post('eventAim')),
                        'eventDesc' => $this->security->xss_clean($this->input->post('eventDesc')),
                        'eventStartTime' => $this->security->xss_clean($this->input->post('eventStartTime')),
                        'eventEndTime' => $this->security->xss_clean($this->input->post('eventEndTime')),
                        'eventMinParti' => $this->security->xss_clean($this->input->post('eventMinParti')),
                        'eventMaxParti' => $this->security->xss_clean($this->input->post('eventMaxParti')),
                        'eventEstFee' => $this->security->xss_clean($this->input->post('eventEstFee')),
                        'eventMemberPoint' => 50,
                        'eventRestaurantName' => $this->security->xss_clean($this->input->post('eventRestaurantName')),
                        'eventAddress' => $this->security->xss_clean($this->input->post('eventAddress')),
                    );


                    $eid = $this->CreateEvent_model->form_insert($eventdata);

                    $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($eid);

                    $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($session_memberID);

                    $addto = $pointvalue+$nowpoint;


                    $this->JoinEvent_model->join_event($eid,$session_memberID);
                    $this->EditPoint_model->event_addpoint($session_memberName,$addto);



                    $data['title'] = 'Create Dining Event';
                    $this->load->view('template/navigation_member');
                    $this->load->view('template/header', $data);
                    $this->load->view('sucessful_createevent');
                    $this->load->view('template/footer');
                }
            }

        } else {

            redirect('Welcome', 'refresh');

        }



    }


    function datetime_check($input)
    {
        if (preg_match('/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)\s([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $input))
        {
            return true; // it matched, return true or false if you want opposite
        }
        else
        {
            $this->form_validation->set_message('datetime_check', 'The %s field is in wrong format. It should be in yyyy-MM-dd hh:mm:ss format');
            return false;
        }
    }


}

