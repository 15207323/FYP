<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/10/2016
 * Time: 7:40 PM
 * http://localhost/dinetgt/memberdata
 */
class UserInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetMemberInfo_model');
    }

    public function view($name = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['title'] = 'View User Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['memberInfo']=$this->GetMemberInfo_model->get_particular_member($name);
            $this->load->view('showuser_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function edit($member = NULL) {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $username = $session_data['memberName'];


            $data['member'] = $this->GetMemberInfo_model->get_particular_member($username);

            $this->load->library('form_validation');

            $config = array(

                array(
                    'field' => 'memberPwd',
                    'label' => 'Password',
                    'rules' => 'trim|min_length[3]|max_length[20]',
                ),

                array(
                    'field' => 'memberPwdConf',
                    'label' => 'Password Confirmation',
                    'rules' => 'trim|matches[memberPwd]',
                ),

                array(
                    'field' => 'memberEmail',
                    'label' => 'E-mail',
                    'rules' => 'trim|valid_email|unique[member.memberEmail]',
                ),

                array(
                    'field' => 'memberTel',
                    'label' => 'Mobile Phone No.',
                    'rules' => 'trim|regex_match[/^[0-9]{8}$/]',
                ),


            );


            $this->form_validation->set_rules($config);


            if (!$this->input->post('post')) {


                $data['title'] = 'Edit User Information';
                $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);

                $this->load->view('template/navigation_member');
                $this->load->view('template/header', $data);
                $this->load->view('edituser_view', $data);
                $this->load->view('template/footer');

            } else {
                if ($this->form_validation->run() == TRUE) {

                    $inputdata = array();

                    if (($this->input->post('memberPwd') != NULL) && ($this->input->post('memberPwdConf') != NULL)) {
                        $inputdata['memberPwd'] = $this->security->xss_clean($this->input->post('memberPwd'));
                    }

                    if ($this->input->post('memberEmail') != NULL) {
                        $inputdata['memberEmail'] = $this->security->xss_clean($this->input->post('memberEmail'));

                    }

                    if ($this->input->post('memberTel') != NULL) {
                        $inputdata['memberTel'] = $this->security->xss_clean($this->input->post('memberTel'));

                    }

                    $this->load->model('EditMember_model');
                    $this->EditMember_model->update_memberinfo($inputdata, $username);

                    $data['title'] = 'Edit User Information';
                    $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);

                    $this->load->view('template/navigation_member');
                    $this->load->view('template/header', $data);
                    $this->load->view('sucessful_edituser', $data);
                    $this->load->view('template/footer');

                } else {

                    $data['title'] = 'Edit User Information';
                    $data['attributes'] = $this->GetMemberInfo_model->get_particular_member($username);

                    $this->load->view('template/navigation_member');
                    $this->load->view('template/header', $data);
                    $this->load->view('edituser_view', $data);
                    $this->load->view('template/footer');

                }
            }

        }else{
            redirect('Welcome', 'refresh');
        }

    }

}?>