<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/24/2016
 * Time: 4:41 PM
 */
class Login extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){

        $this->load->helper(array('form'));

        $data['title'] = 'Login';

        $this->load->view('template/header', $data);
        $this->load->view('template/navigation');
        $this->load->view('login_view', $data);
        $this->load->view('template/footer');
    }


}
?>