<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 3/13/2017
 * Time: 4:14 PM
 */
class RestInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('javascript');
        $this->load->database();
        $this->load->model('GetRestInfo_model');
        $this->load->model('CreateRest_model');
        $this->load->model('DeleteRest_model');
        $this->load->model('EditRest_model');
        $this->load->library('form_validation');
        $this->load->model('SearchRest_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Restaurant';


            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->data['restInfo'] = $this->GetRestInfo_model->adminget_restaurant();

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowallrestaurant_view',$this->data);
                $this->load->view('template/footer_admin');

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))) {

                $this->data['restInfo'] = $this->GetRestInfo_model->get_restaurant();
                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);
                $this->load->view('showallrestaurant_view', $this->data);
                $this->load->view('template/footer');
            }

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function view($id = '') {

        if($this->session->userdata('logged_in')){

            $data['title'] = 'View Restaurant Information';
            $data['restInfo'] = $this->GetRestInfo_model->get_particular_restaurant($id);

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowparticularrestaurant_view',$data);
                $this->load->view('template/footer_admin');

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))) {

                $this->load->view('template/header', $data);
                $this->load->view('template/navigation_member', $data);
                $this->load->view('showparticularrestaurant_view',$this->data);
                $this->load->view('template/footer');

            }


        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function create() {

        $config = array(

            array(
                'field' => 'restName',
                'label' => 'Restaurant Name',
                'rules' => 'trim|required|min_length[3]|max_length[30]',
            ),

            array(
                'field' => 'restAddress',
                'label' => 'Restaurant Address',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),

            array(
                'field' => 'restCategory',
                'label' => 'Category',
                'rules' => 'trim|required|min_length[3]|max_length[20]',
            ),

            array(
                'field' => 'restTel',
                'label' => 'Restaurant Tel.',
                'rules' => 'trim|regex_match[/^[0-9]{8}$/]',
            ),

            array(
                'field' => 'restEmail',
                'label' => 'Restaurant E-mail',
                'rules' => 'trim|valid_email',
            ),

            array(
                'field' => 'restOpenHr',
                'label' => 'Opening Hour',
                'rules' => 'trim|min_length[5]|max_length[100]',
            ),

            array(
                'field' => 'restAvgPrice',
                'label' => 'Average Price',
                'rules' => 'trim|numeric|greater_than[0]|max_length[4]',
            ),

        );




        if($this->session->userdata('logged_in')) {

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == FALSE) {

                    $data['title'] = 'Create Restaurant Record';
                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('createrest_view');
                    $this->load->view('template/footer_admin');

                } else {

                    $restdata = array(
                        'restName' =>  $this->security->xss_clean($this->input->post('restName')),
                        'restAddress' => $this->security->xss_clean($this->input->post('restAddress')),
                        'restTel' => $this->security->xss_clean($this->input->post('restTel')),
                        'restEmail' => $this->security->xss_clean($this->input->post('restEmail')),
                        'restOpenHr' => $this->security->xss_clean($this->input->post('restOpenHr')),
                        'restAvgPrice' => $this->security->xss_clean($this->input->post('restAvgPrice')),
                        'restCategory' => $this->security->xss_clean($this->input->post('restCategory')),
                        'restAvgRate' => 0,
                    );


                    $this->CreateRest_model->form_insert($restdata);


                    $data['title'] = 'Create Restaurant Record';
                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('sucessful_createrestaurant');
                    $this->load->view('template/footer_admin');



                }

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){
                $data['title'] = 'Restaurant Home';
                $this->load->view('template/header', $data);
                $this->load->view('template/navigation_member', $data);
                $this->load->view('RestaurantHome_view',$data);
                $this->load->view('template/footer');

            }

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }









    public function edit($id) {


        if($this->session->userdata('logged_in')) {

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                $data['rest'] = $this->GetRestInfo_model->get_particular_restaurant($id);
                $this->load->library('form_validation');

                $config = array(

                    array(
                        'field' => 'restName',
                        'label' => 'Restaurant Name',
                        'rules' => 'trim|min_length[3]|max_length[30]',
                    ),

                    array(
                        'field' => 'restAddress',
                        'label' => 'Restaurant Address',
                        'rules' => 'trim|min_length[10]|max_length[255]',
                    ),

                    array(
                        'field' => 'restCategory',
                        'label' => 'Category',
                        'rules' => 'trim|min_length[3]|max_length[20]',
                    ),

                    array(
                        'field' => 'restTel',
                        'label' => 'Restaurant Tel.',
                        'rules' => 'trim|regex_match[/^[0-9]{8}$/]',
                    ),

                    array(
                        'field' => 'restEmail',
                        'label' => 'Restaurant E-mail',
                        'rules' => 'trim|valid_email',
                    ),

                    array(
                        'field' => 'restOpenHr',
                        'label' => 'Opening Hour',
                        'rules' => 'trim|min_length[5]|max_length[100]',
                    ),

                    array(
                        'field' => 'restAvgPrice',
                        'label' => 'Average Price',
                        'rules' => 'trim|numeric|greater_than[0]|max_length[4]',
                    ),



                );



                $this->form_validation->set_rules($config);

                if (!$this->input->post('post')) {


                    $data['title'] = 'Edit Restaurant Information';
                    $data['attributes'] = $this->GetRestInfo_model->get_particular_restaurant($id);
                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('editrestaurant_view', $data);
                    $this->load->view('template/footer_admin');

                } else {
                    if ($this->form_validation->run() == TRUE) {

                        $inputdata = array();

                        if ($this->input->post('restName') != NULL) {
                            $inputdata['restName'] = $this->security->xss_clean($this->input->post('restName'));
                        }

                        if ($this->input->post('restAddress') != NULL) {
                            $inputdata['restAddress'] = $this->security->xss_clean($this->input->post('restAddress'));

                        }

                        if ($this->input->post('restTel') != NULL) {
                            $inputdata['restTel'] = $this->security->xss_clean($this->input->post('restTel'));

                        }

                        if ($this->input->post('restEmail') != NULL) {
                            $inputdata['restEmail'] = $this->security->xss_clean($this->input->post('restEmail'));
                        }

                        if ($this->input->post('restOpenHr') != NULL) {
                            $inputdata['restOpenHr'] = $this->security->xss_clean($this->input->post('restOpenHr'));
                        }

                        if ($this->input->post('restAvgPrice') != NULL) {
                            $inputdata['restAvgPrice'] = $this->security->xss_clean($this->input->post('restAvgPrice'));

                        }

                        if ($this->input->post('restCategory') != NULL) {
                            $inputdata['restCategory'] = $this->security->xss_clean($this->input->post('restCategory'));

                        }


                        $this->load->model('EditRest_model');
                        $this->EditRest_model->update_restaurantinfo($inputdata, $id);

                        $data['title'] = 'Edit Restaurant Information';
                        $data['attributes'] = $this->EditRestInfo_model->get_particular_restaurant($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('sucessful_editrestaurant', $data);
                        $this->load->view('template/footer_admin');


                    } else {

                        $data['title'] = 'Edit Restaurant Information';
                        $data['attributes'] = $this->GetRestInfo_model->get_particular_restaurant($id);
                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('editrestaurant_view', $data);
                        $this->load->view('template/footer_admin');

                    }
                }

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){
                $data['title'] = 'Restaurant Home';
                $this->load->view('template/header', $data);
                $this->load->view('template/navigation_member', $data);
                $this->load->view('RestaurantHome_view',$data);
                $this->load->view('template/footer');

            }

        }

        else
        {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }



    public function delete($id = '') {

        if($this->session->userdata('logged_in')){


            $data['title'] = 'Delete Dining Event';
            $this->load->view('template/navigation_admin', $data);
            $this->load->view('template/header', $data);

            $this->load->model('DeleteRest_model');
            $this->DeleteRest_model->delete_restaurant($id);
            $this->load->view('sucessful_deleterestaurant');

            $this->load->view('template/footer');


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
                    'field' => 'restName',
                    'label' => 'Restaurant Name',
                    'rules' => 'trim|exist[restaurant.restName]',
                ),
            );

            $this->form_validation->set_rules($config);
            $restName = $this->security->xss_clean($this->input->post('restName'));

            if($this->form_validation->run() == FALSE)
            {

                if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                    $data['title'] = 'Restaurant Home';
                    $this->load->view('template/navigation_admin', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('restauranthome_view', $data);
                    $this->load->view('template/footer');

                }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){
                    $data['title'] = 'Restaurant Home';
                    $this->load->view('template/navigation_memberhome', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('restauranthome_view', $data);
                    $this->load->view('template/footer');

                }

            }
            else
            {

                $this->security->xss_clean($this->input->post('restName'));

                $this->data['restInfo']=$this->GetRestInfo_model->get_particular_restaurant($restName);

                $data['title'] = $restName;

                if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {
                    $data['title'] = 'Restaurant Home';
                    $this->load->view('template/navigation_admin', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('showparticularrestaurant_view', $data);
                    $this->load->view('template/footer');

                }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){
                    $data['title'] = 'Restaurant Home';
                    $this->load->view('template/navigation_memberhome', $data);
                    $this->load->view('template/header', $data);
                    $this->load->view('showparticularrestaurant_view', $data);
                    $this->load->view('template/footer');

                }

            }

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }



    }


}