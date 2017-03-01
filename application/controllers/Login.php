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
        $this->load->library('session');
    }

    public function index(){

        $this->load->helper(array('form'));

        if(!($this->session->userdata('logged_in'))){
            $data['title'] = 'Login';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('login_view', $data);
            $this->load->view('template/footer');

        }
        else

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                $session_data = $this->session->userdata('logged_in');
                $data['adminName'] = $session_data['adminName'];
                $data['title'] = 'Administrator Home';
                $this->load->view('template/navigation_admin', $data);
                $this->load->view('template/header', $data);
                $this->load->view('adminhome_view', $data);
                $this->load->view('template/footer');

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $session_data = $this->session->userdata('logged_in');
                $data['memberName'] = $session_data['memberName'];
                $data['title'] = 'Home';
                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);
                $this->load->view('home_view', $data);
                $this->load->view('template/footer');

            }



        }




}
?>