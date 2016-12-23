<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/25/2016
 * Time: 2:22 AM
 */
class AdminHome extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->check_isvalidated();
    }

    public function index(){
        // If the user is validated, then this function will run
        $this->load->helper('url');
        echo 'Congratulations, you are logged in.';
        $this->load->view('admin_home');
        //logout link
//        echo '<br /><a href="AdminHome/logout">logout</a>';
//        echo '<br /><a href=''.base_url().'home/do_logout'>Logout Fool!</a>';
        echo "<br /><a href='" . base_url() . "AdminHome/logout'>Logout</a>";
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect(base_url().'Login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'Welcome','refresh');
    }

}
?>