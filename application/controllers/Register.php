<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/22/2016
 * Time: 5:49 PM
 */
class Register extends CI_Controller
{
    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Register_model');
        $this->load->library('form_validation');
    }

    function index() {

        $config = array(

            array(
                'field' => 'memberName',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[20]|unique[member.memberName]',
            ),

            array(
                'field' => 'memberPwd',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]|max_length[20]',
            ),

            array(
                'field' => 'memberPwdConf',
                'label' => 'Password Confirmation',
                'rules' => 'trim|required|matches[memberPwd]',
            ),

            array(
                'field' => 'memberEmail',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|unique[member.memberEmail]',
            ),

            array(
                'field' => 'memberTel',
                'label' => 'Mobile Phone No.',
                'rules' => 'trim|required|regex_match[/^[0-9]{8}$/]',
            ),
        );


        $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->load->view('template/navigation');
            $this->load->view('template/header', $data);
            $this->load->view('register_view');
            $this->load->view('template/footer');
        } else {
            $memberdata = array(
                'memberName' => $this->security->xss_clean($this->input->post('memberName')),
                'memberPwd' => $this->security->xss_clean($this->input->post('memberPwd')),
                'memberEmail' => $this->security->xss_clean($this->input->post('memberEmail')),
                'memberTel' => $this->security->xss_clean($this->input->post('memberTel')),
            );
            $this->Register_model->form_insert($memberdata);

            $data['title'] = 'Register';
            $this->load->view('template/navigation');
            $this->load->view('template/header', $data);
            $this->load->view('sucessful_register');
            $this->load->view('template/footer');
        }
    }

}

?>