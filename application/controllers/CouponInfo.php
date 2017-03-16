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
        $this->load->model('BuyCoupon_model');
        $this->load->model('EditPoint_model');
        $this->load->model('GetMemberInfo_model');
        $this->load->library('form_validation');

    }

    public function index(){

        if($this->session->userdata('logged_in')) {


            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $data['title'] = 'View All Coupon';
                $this->data['couponInfo']=$this->GetCouponInfo_model->get_coupon();

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowallcoupon_view',$this->data);
                $this->load->view('template/footer_admin');


            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                redirect('CouponHome', 'refresh');

            }


        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }



    }

    public function view($id) {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View Coupon Information';
            $this->data['couponInfo']=$this->GetCouponInfo_model->get_particular_coupon($id);

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowparticularcoupon_view',$this->data);
                $this->load->view('template/footer_admin');


            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);
                $this->load->view('showparticularcoupon_view',$this->data);
                $this->load->view('template/footer');

            }


        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function delete($id = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $name = $session_data['memberName'];
            $data['title'] = 'Delete Dining Event';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $eventcreatorname = $this->GetEventInfo_model->get_eventcreatorname($id);

            if ($eventcreatorname == $name){


                $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($id);

                $mid = $this->GetMemberInfo_model->get_memberID($name);

                $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($mid);

                $minusto = $nowpoint-$pointvalue;
                $this->EditPoint_model->event_minuspoint($name,$minusto);

                $this->load->model('DeleteEvent_model');
                $this->DeleteEvent_model->delete_event($id);
                $this->DeleteEvent_model->delete_jointevent($id);

                $this->load->view('sucessful_deleteevent');

            } else {

                $this->load->view('error_notcreatorcannotdeleteevent');

            }


            $this->load->view('template/footer');


        } else {
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
                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('createcoupon_view');
                    $this->load->view('template/footer_admin');

                } else {

                    $coupondata = array(
                        'couponTitle' => $this->security->xss_clean($this->input->post('couponTitle')),
                        'couponDesc' => $this->security->xss_clean($this->input->post('couponDesc')),
                        'couponMemberPointNeed' => $this->security->xss_clean($this->input->post('couponMemberPointNeed')),
                        'couponExpireDay' => $this->security->xss_clean($this->input->post('couponExpireDay')),
                        'couponMaxOwner' => $this->security->xss_clean($this->input->post('couponMaxOwner')),

                    );

                    $this->CreateCoupon_model->form_insert($coupondata);

                    $data['title'] = 'Create Coupon';
                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('sucessful_createcoupon');
                    $this->load->view('template/footer_admin');

                }
            }

        } else {

            redirect('Welcome', 'refresh');

        }



    }

    public function edit($id)
    {


        if ($this->session->userdata('logged_in')) {

            if (array_key_exists("adminID", $this->session->userdata('logged_in'))) {


                $data['coupon'] = $this->GetCouponInfo_model->get_particular_coupon($id);

                $this->load->library('form_validation');

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


                if (!$this->input->post('post')) {

                    $data['title'] = 'Edit Coupon Information';
                    $data['attributes'] = $this->GetCouponInfo_model->get_particular_coupon($id);

                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('editcoupon_view', $data);
                    $this->load->view('template/footer_admin');

                } else {
                    if ($this->form_validation->run() == TRUE) {

                        $inputdata = array();

                        if ($this->input->post('couponTitle') != NULL) {
                            $inputdata['couponTitle'] = $this->security->xss_clean($this->input->post('couponTitle'));

                        }

                        if ($this->input->post('couponDesc') != NULL) {
                            $inputdata['couponDesc'] = $this->security->xss_clean($this->input->post('couponDesc'));

                        }

                        if ($this->input->post('couponMemberPointNeed') != NULL) {
                            $inputdata['couponMemberPointNeed'] = $this->security->xss_clean($this->input->post('couponMemberPointNeed'));

                        }

                        if ($this->input->post('couponExpireDay') != NULL) {
                            $inputdata['couponExpireDay'] = $this->security->xss_clean($this->input->post('couponExpireDay'));

                        }

                        if ($this->input->post('couponMaxNum') != NULL) {
                            $inputdata['couponMaxNum'] = $this->security->xss_clean($this->input->post('couponMaxNum'));

                        }

                        $this->load->model('EditCoupon_model');
                        $this->EditCoupon_model->update_couponinfo($inputdata, $id);

                        $data['title'] = 'Edit Coupon Information';
                        $data['attributes'] = $this->GetCouponInfo_model->get_particular_coupon($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('sucessful_editcoupon', $data);
                        $this->load->view('template/footer_admin');

                    } else {

                        $data['title'] = 'Edit Coupon Information';
                        $data['attributes'] = $this->GetCouponInfo_model->get_particular_coupon($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('editcoupon_view', $data);
                        $this->load->view('template/footer_admin');

                    }
                }

            }else if (array_key_exists("memberID", $this->session->userdata('logged_in'))) {

                redirect('CouponHome', 'refresh');
            }


        }else {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
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


    public function buycoupon ($id){

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberID'] = $session_data['memberID'];
            $data['memberName'] = $session_data['memberName'];
            $mid = $session_data['memberID'];
            $mname = $session_data['memberName'];

            $data['title'] = 'Buy Coupon';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $couponneedpoint = (int)$this->GetCouponInfo_model->get_couponpoint($id);
            $mpoint = (int)$this->GetMemberInfo_model->get_memberpoint($mid);

            $couponleft = $this->GetCouponInfo_model->get_couponowned($id);


            if($couponleft > 0) {



                if($mpoint >= $couponneedpoint) {

                    $result = $this->BuyCoupon_model->check_couponowned($id,$mid);

                    if($result){

                        $this->GetCouponInfo_model->get_couponpoint($id);

                        $miusto = $mpoint-$couponneedpoint;

                        $this->BuyCoupon_model->buy_coupon($id,$mid);

                        $this->EditPoint_model->event_minuspoint($mname,$miusto);

                        $this->BuyCoupon_model->minus_couponnum($id);

                        $this->load->view('sucessful_buycoupon');
                    } else {

                        $this->load->view('error_couponownedalready');
                    }


                } else {

                    $this->load->view('error_notenoughtmemberpoint');

                }

            } else {

                $this->load->view('error_couponownerreachmaxalready');

            }



            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function owned() {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['memberID'] = $session_data['memberID'];
            $mid = $session_data['memberID'];
            $data['title'] = 'View All Owned Coupon';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['couponInfo']=$this->GetCouponInfo_model->get_ownedcoupon($mid);

            if (empty($this->data['couponInfo'])){

                $this->load->view('resultnotfound_view');

            } else{

                $this->load->view('showallownedcoupon_view',$this->data);

            }

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function viewowned($id = '') {

        if($this->session->userdata('logged_in')){

            $data['title'] = 'View Owned Coupon Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['couponInfo']=$this->GetCouponInfo_model->get_particular_coupon($id);

            $this->load->view('showparticularownedcoupon_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }


}

