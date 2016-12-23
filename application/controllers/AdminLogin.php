<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/24/2016
 * Time: 4:41 PM
 */
class AdminLogin extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){

        $this->load->helper(array('form'));

        $data['title'] = 'Administrator Login';

        $this->load->view('template/header', $data);
        $this->load->view('adminlogin_view', $data);
        $this->load->view('template/footer');
    }


}
?>