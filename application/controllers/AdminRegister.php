<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/22/2016
 * Time: 5:49 PM
 */
class AdminRegister extends CI_Controller
{
    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('AdminRegister_model');
        $this->load->library('form_validation');
        $this->load->library('encrypt');

    }

    function index() {

        $config = array(

            array(
                'field' => 'adminName',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[3]|max_length[20]|unique[administrator.adminName]',
            ),

            array(
                'field' => 'adminPwd',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]|max_length[20]',
            ),

            array(
                'field' => 'adminPwdConf',
                'label' => 'Password Confirmation',
                'rules' => 'trim|required|matches[adminPwd]',
            ),

            array(
                'field' => 'adminEmail',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|unique[administrator.adminEmail]',
            ),

        );


        $this->form_validation->set_rules($config);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Registration';
            $this->load->view('template/navigation_admin');
            $this->load->view('template/header', $data);
            $this->load->view('adminregister_view');
            $this->load->view('template/footer');
        } else {
            $admindata = array(
                'adminName' => $this->security->xss_clean($this->input->post('adminName')),
                'adminPwd' => md5($this->security->xss_clean($this->input->post('adminPwd'))),
                'adminEmail' => $this->security->xss_clean($this->input->post('adminEmail')),
            );
            $this->AdminRegister_model->form_insert($admindata);

            $data['title'] = 'Admin Registration';
            $this->load->view('template/navigation_admin');
            $this->load->view('template/header', $data);
            $this->load->view('sucessful_adminregister');
            $this->load->view('template/footer');
        }
    }

}

?>