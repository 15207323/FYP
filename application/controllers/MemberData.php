<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: san
 * Date: 11/10/2016
 * Time: 7:40 PM
 * http://localhost/dinetgt/memberdata
 */
class MemberData extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('GetMemberData_model');
    }

    public function index() {
        $this->data['members']=$this->GetMemberData_model->get_member();
        $this->load->view('member_info',$this->data);
    }

    public function delete($id = '') {
        $this->load->model('DeleteMember_model');
        $where = array('memberID' => $id);
        $this->DeleteMember_model->delete_member('member',$where);
        $this->data['members']=$this->GetMemberData_model->get_member();
        $this->load->view('member_info',$this->data);
    }

    public function edit($id = '') {
        $this->load->model('EditMember_model');
        $where = array('memberID' => $id);
        $this->EditeMember_model->edit_member('member',$where);
    }


}?>