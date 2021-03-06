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
        $this->load->library('form_validation');
        $this->load->model('SearchMember_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Member';

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_member();

            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin');
            $this->load->view('template/sidebar_admin');
            $this->load->view('showallmember_view',$this->data);
            $this->load->view('template/footer_admin');

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    //show a list include all member
    public function view($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'View User Information';

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($name);

            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin');
            $this->load->view('template/sidebar_admin');
            $this->load->view('showparticularmember_view',$this->data);
            $this->load->view('template/footer_admin');



        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }


    public function edit($member = NULL) {

        $this->check_login();

        $username = $member;


            $data['member'] = $this->GetMemberInfo_model->get_particular_member($username);

            $this->load->library('form_validation');

            $config = array(

                array(
                    'field' => 'memberPwd',
                    'label' => 'Password',
                    'rules' => 'min_length[6]|max_length[20]',
                ),

                array(
                    'field' => 'memberPwdConf',
                    'label' => 'Password Confirmation',
                    'rules' => 'matches[memberPwd]',
                ),

                array(
                    'field' => 'memberEmail',
                    'label' => 'E-mail',
                    'rules' => 'valid_email|unique[member.memberEmail]',
                ),

                array(
                    'field' => 'memberTel',
                    'label' => 'Mobile Phone No.',
                    'rules' => 'regex_match[/^[0-9]{8}$/]',
                ),

                array(
                    'field' => 'memberPoint',
                    'label' => 'Member Point',
                    'rules' => 'trim|numeric',
                ),


            );


            $this->form_validation->set_rules($config);


            if (!$this->input->post('post')) {


                $data['title'] = 'Edit User Information';
                $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);


                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('editmember_view', $data);
                $this->load->view('template/footer_admin');
                

            } else {
                if ($this->form_validation->run() == TRUE) {

                    $inputdata = array();

                    if (($this->input->post('memberPwd') != NULL) && ($this->input->post('memberPwdConf') != NULL)) {
                        $inputdata['memberPwd'] = md5($this->security->xss_clean($this->input->post('memberPwd')));
                    }

                    if ($this->input->post('memberEmail') != NULL) {
                        $inputdata['memberEmail'] = $this->security->xss_clean($this->input->post('memberEmail'));

                    }

                    if ($this->input->post('memberTel') != NULL) {
                        $inputdata['memberTel'] = $this->security->xss_clean($this->input->post('memberTel'));

                    }

                    if ($this->input->post('memberPoint') != NULL) {
                        $inputdata['memberPoint'] = $this->security->xss_clean($this->input->post('memberPoint'));
                    }

                    $this->load->model('EditMember_model');
                    $this->EditMember_model->update_memberinfo($inputdata, $username);

                    $data['title'] = 'Edit User Information';
                    $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);

                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('sucessful_editmember', $data);
                    $this->load->view('template/footer_admin');
                    
                } else {

                    $data['title'] = 'Edit User Information';
                    $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);

                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('editmember_view', $data);
                    $this->load->view('template/footer_admin');


                }
            }


    }




    public function check_login(){

        if(!$this->session->userdata('logged_in')){
            redirect('Welcome', 'refresh');
        }
    }

    public function delete($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['adminName'] = $session_data['adminName'];
            $data['title'] = 'Delete User';

            $this->load->model('DeleteMember_model');
            $this->DeleteMember_model->delete_member($name);

            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin');
            $this->load->view('template/sidebar_admin');
            $this->load->view('sucessful_deletemember');
            $this->load->view('template/footer_admin');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function search() {

        if($this->session->userdata('logged_in')){

            $this->load->library('form_validation');

            $config = array(

                array(
                    'field' => 'memberName',
                    'label' => 'Username',
                    'rules' => 'trim|exist[member.memberName]',
                ),
            );

            $this->form_validation->set_rules($config);
            $memberName = $this->security->xss_clean($this->input->post('memberName'));

            if($this->form_validation->run() == FALSE)
            {
                $session_data = $this->session->userdata('logged_in');
                $data['adminName'] = $session_data['adminName'];

                $data['title'] = 'View All Member';

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);

                $this->data['memberInfo']=$this->GetMemberInfo_model->get_member();
                $this->load->view('showallmember_view',$this->data);

                $this->load->view('template/footer');
            }
            else
            {
                $session_data = $this->session->userdata('logged_in');

                $this->security->xss_clean($this->input->post('memberName'));
                $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($memberName);


                $data['adminName'] = $session_data['adminName'];
                $data['title'] = 'View User Information';

                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);

                $this->load->view('showparticularmember_view',$this->data);

                $this->load->view('template/footer');
            }

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }



    }

}?>