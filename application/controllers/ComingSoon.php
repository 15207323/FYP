<?php

/**
 * Created by PhpStorm.
 * User: san
 * Date: 12/24/2016
 * Time: 12:43 AM
 */
class ComingSoon extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    function index()
    {
            $data['title'] = 'Coming Soon';
            $this->load->view('template/header', $data);
            $this->load->view('comingsoon_view');
            $this->load->view('template/footer');

    }


}

?>