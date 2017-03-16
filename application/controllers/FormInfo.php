<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 3/16/2017
 * Time: 1:18 PM
 */
class FormInfo extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('GetFormInfo_model');
        $this->load->model('RemarkForm_model');
        $this->load->library('form_validation');

    }

    public function index(){

        if($this->session->userdata('logged_in')) {


            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $data['title'] = 'View Contact Form';
                $this->data['formInfo']=$this->GetFormInfo_model->get_form();

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowallform_view',$this->data);
                $this->load->view('template/footer_admin');


            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                redirect('Home', 'refresh');

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

            $data['title'] = 'View Contact Form Detail';
            $this->data['FormInfo']=$this->GetFormInfo_model->get_particular_form($id);

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowparticularform_view',$this->data);
                $this->load->view('template/footer_admin');


            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                redirect('Home','refresh');
            }


        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }


    public function remark($id){

        if($this->session->userdata('logged_in')) {


            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $data['form'] = $this->GetFormInfo_model->get_particular_form($id);

                $this->load->library('form_validation');

                $config = array(

                    array(
                        'field' => 'contactRemark',
                        'label' => 'Title',
                        'rules' => 'trim|required',
                    ),

                );

                $this->form_validation->set_rules($config);


                if (!$this->input->post('post')) {

                    $data['title'] = 'Remark Contact Form';
                    $data['attributes'] = $this->GetFormInfo_model->get_particular_form($id);

                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('remarkform_view', $data);
                    $this->load->view('template/footer_admin');

                } else {
                    if ($this->form_validation->run() == TRUE) {

                        $inputdata = array();

                        if ($this->input->post('contactRemark') != NULL) {
                            $inputdata['contactRemark'] = $this->security->xss_clean($this->input->post('contactRemark'));

                        }

                        $this->load->model('EditCoupon_model');
                        $this->RemarkForm_model->remark_form($inputdata, $id);

                        $data['title'] = 'Remark Contact Form';
                        $data['attributes'] = $this->GetFormInfo_model->get_particular_form($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('sucessful_remarkform', $data);
                        $this->load->view('template/footer_admin');

                    } else {

                        $data['title'] = 'Remark Contact Form';
                        $data['attributes'] = $this->GetFormInfo_model->get_particular_form($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('remarkform_view', $data);
                        $this->load->view('template/footer_admin');

                    }
                }


            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                redirect('Home', 'refresh');

            }


        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }



}