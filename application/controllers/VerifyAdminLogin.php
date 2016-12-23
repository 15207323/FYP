<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/23/2016
 * Time: 2:50 PM
 */
class VerifyAdminLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('AdminLogin_model','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $config = array(

            array(
                'field' => 'adminEmail',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email',
            ),

            array(
                'field' => 'adminPwd',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]|max_length[20]|callback_check_database',
            ),

        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $data['title'] = 'Administrator Login';

            $this->load->view('template/header', $data);
            $this->load->view('adminlogin_view', $data);
            $this->load->view('template/footer');
        }
        else
        {
            //Go to private area
            redirect('AdminHome', 'refresh');
        }

    }

    function check_database($adminPwd)
    {
        //Field validation succeeded.  Validate against database
        $adminEmail = $this->security->xss_clean($this->input->post('adminEmail'));

        //query the database
        $result = $this->AdminLogin_model->login($adminEmail, $adminPwd);

        if($result)
        {

            $admin_sess_array = array();
            foreach($result as $row)
            {

                $admin_sess_array = array(
                    'adminID' => $row->adminID,
                    'adminName' => $row->adminName,
                );
                $this->session->set_userdata('logged_in', $admin_sess_array);


            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid e-mail or password');
            return false;
        }
    }
}
?>
