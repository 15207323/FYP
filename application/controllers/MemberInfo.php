<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/10/2016
 * Time: 7:40 PM
 * http://localhost/dinetgt/memberdata
 */
class MemberInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetMemberInfo_model');
    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Member';

            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/header', $data);

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_member();
            $this->load->view('showallmember_view',$this->data);

            $this->load->view('template/footer');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function view($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'View User Information';

            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/header', $data);

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($name);
            $this->load->view('showparticularmember_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }


    public function edit($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'Edit User Information';


            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/header', $data);

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($name);
            $this->load->model('EditMember_model',$data);
            $this->load->view('showparticularmember_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function delete($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'Delete User';


            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/header', $data);

            $this->load->model('DeleteMember_model');
            $this->DeleteMember_model->delete_member($name);

            $this->load->view('sucessful_deletemember');

            $this->load->view('template/footer');


        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }



}?>