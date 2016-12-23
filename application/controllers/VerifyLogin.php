<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/23/2016
 * Time: 2:50 PM
 */
class VerifyLogin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Login_model','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $config = array(

            array(
                'field' => 'memberEmail',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email',
            ),

            array(
                'field' => 'memberPwd',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[3]|max_length[20]|callback_check_database',
            ),

        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            $data['title'] = 'Login';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation');
            $this->load->view('login_view', $data);
            $this->load->view('template/footer');
        }
        else
        {
            //Go to private area
            redirect('Home', 'refresh');
        }

    }

    function check_database($memberPwd)
    {
        //Field validation succeeded.  Validate against database
        $memberEmail = $this->security->xss_clean($this->input->post('memberEmail'));

        //query the database
        $result = $this->Login_model->login($memberEmail, $memberPwd);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'memberID' => $row->memberID,
                    'memberName' => $row->memberName,
                );
                $this->session->set_userdata('logged_in', $sess_array);


            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}
?>
