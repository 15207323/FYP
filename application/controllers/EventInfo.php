<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
        /**
 * Created by PhpStorm.
 * User: san
 * Date: 1/3/2017
 * Time: 2:33 PM
 */
class EventInfo extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('javascript');
        $this->load->database();
        $this->load->model('GetEventInfo_model');
        $this->load->model('CreateEvent_model');
        $this->load->model('EditPoint_model');
        $this->load->model('DeleteEvent_model');
        $this->load->model('JoinEvent_model');
        $this->load->model('GetMemberInfo_model');
        $this->load->library('form_validation');

        $this->load->model('SearchEvent_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Dining Event';
            $data['eventInfo'] = $this->GetEventInfo_model->get_event();

            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowallevent_view',$data);
                $this->load->view('template/footer_admin');

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $this->load->view('template/header', $data);
                $this->load->view('template/navigation_member', $data);
                $this->load->view('showallevent_view',$data);
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

            $data['title'] = 'View Dining Event Information';


            if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                $this->data['eventInfo']=$this->GetEventInfo_model->get_adminparticular_event($id);

                $this->load->view('template/header_admin', $data);
                $this->load->view('template/navigation_admin');
                $this->load->view('template/sidebar_admin');
                $this->load->view('adminshowparticularevent_view',$this->data);
                $this->load->view('template/footer_admin');

            }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($id);

                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);
                $this->load->view('showparticularevent_view',$this->data);
                $this->load->view('template/footer');

            }


        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function viewjoint($id = '') {

        if($this->session->userdata('logged_in')){

            $data['title'] = 'View Joint Dining Event Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($id);

            $this->load->view('showparticularjointevent_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function viewcreated($id = '') {

        if($this->session->userdata('logged_in')){

            $data['title'] = 'View Dining Event Information';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($id);

            $this->load->view('showparticularcreatedevent_view',$this->data);

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function created() {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $name = $session_data['memberName'];
            $data['title'] = 'View Created Event';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_created_event($name);

            if (empty($this->data['eventInfo'])){

                $this->load->view('resultnotfound_view');

            } else{

                $this->load->view('showallcreatedevent_view',$this->data);

            }

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }



    public function create() {

        $config = array(

            array(
                'field' => 'eventTitle',
                'label' => 'Title',
                'rules' => 'trim|required|min_length[5]|max_length[50]',
            ),

            array(
                'field' => 'eventAim',
                'label' => 'Aim',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),

            array(
                'field' => 'eventDesc',
                'label' => 'Description',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),

            array(
                'field' => 'eventStartTime',
                'label' => 'Start Time',
                'rules' => 'trim|required|callback_datetime_check',
            ),

            array(
                'field' => 'eventEndTime',
                'label' => 'End Time',
                'rules' => 'trim|required|callback_datetime_check',
            ),

            array(
                'field' => 'eventMinParti',
                'label' => 'Min. Participant',
                'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
            ),

            array(
                'field' => 'eventMaxParti',
                'label' => 'Max. Participant',
                'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
            ),

            array(
                'field' => 'eventEstFee',
                'label' => 'Estimated Fee',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[4]',
            ),

            array(
                'field' => 'eventRestaurantName',
                'label' => 'Restaurant Name',
                'rules' => 'trim|required|min_length[3]|max_length[50]',
            ),

            array(
                'field' => 'eventAddress',
                'label' => 'Restaurant Address',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),
        );


        $this->form_validation->set_rules($config);



        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Create Dining Event';

            $this->load->view('template/header', $data);
            $this->load->view('template/navigation_member');
            $this->load->view('createevent_view');
            $this->load->view('template/footer');

        } else {


            $session_data = $this->session->userdata('logged_in');
            $session_memberName = $session_data['memberName'];
            $session_memberID = $session_data['memberID'];


            $eventdata = array(
                'eventCreatorName' =>  $session_memberName,
                'eventTitle' => $this->security->xss_clean($this->input->post('eventTitle')),
                'eventAim' => $this->security->xss_clean($this->input->post('eventAim')),
                'eventDesc' => $this->security->xss_clean($this->input->post('eventDesc')),
                'eventStartTime' => $this->security->xss_clean($this->input->post('eventStartTime')),
                'eventEndTime' => $this->security->xss_clean($this->input->post('eventEndTime')),
                'eventMinParti' => $this->security->xss_clean($this->input->post('eventMinParti')),
                'eventMaxParti' => $this->security->xss_clean($this->input->post('eventMaxParti')),
                'eventEstFee' => $this->security->xss_clean($this->input->post('eventEstFee')),
                'eventMemberPoint' => 50,
                'eventRestaurantName' => $this->security->xss_clean($this->input->post('eventRestaurantName')),
                'eventAddress' => $this->security->xss_clean($this->input->post('eventAddress')),
            );


            $eid = $this->CreateEvent_model->form_insert($eventdata);

            $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($eid);

            $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($session_memberID);

            $addto = $pointvalue+$nowpoint;


            $this->JoinEvent_model->join_event($eid,$session_memberID);
            $this->EditPoint_model->event_addpoint($session_memberName,$addto);



            $data['title'] = 'Create Dining Event';
            $this->load->view('template/navigation_member');
            $this->load->view('template/header', $data);
            $this->load->view('sucessful_createevent');
            $this->load->view('template/footer');
        }


    }

    public function admincreate() {

        $config = array(

            array(
                'field' => 'eventTitle',
                'label' => 'Title',
                'rules' => 'trim|required|min_length[5]|max_length[50]',
            ),

            array(
                'field' => 'eventAim',
                'label' => 'Aim',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),

            array(
                'field' => 'eventDesc',
                'label' => 'Description',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),

            array(
                'field' => 'eventStartTime',
                'label' => 'Start Time',
                'rules' => 'trim|required|callback_datetime_check',
            ),

            array(
                'field' => 'eventEndTime',
                'label' => 'End Time',
                'rules' => 'trim|required|callback_datetime_check',
            ),

            array(
                'field' => 'eventMinParti',
                'label' => 'Min. Participant',
                'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
            ),

            array(
                'field' => 'eventMaxParti',
                'label' => 'Max. Participant',
                'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
            ),

            array(
                'field' => 'eventEstFee',
                'label' => 'Estimated Fee',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[4]',
            ),

            array(
                'field' => 'eventMemberPoint',
                'label' => 'Member Point',
                'rules' => 'trim|required|numeric|greater_than[0]|max_length[4]',
            ),

            array(
                'field' => 'eventRestaurantName',
                'label' => 'Restaurant Name',
                'rules' => 'trim|required|min_length[3]|max_length[50]',
            ),

            array(
                'field' => 'eventAddress',
                'label' => 'Restaurant Address',
                'rules' => 'trim|required|min_length[10]|max_length[255]',
            ),
        );


        $this->form_validation->set_rules($config);



        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Create Dining Event';

            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin');
            $this->load->view('template/sidebar_admin');
            $this->load->view('admincreateevent_view');
            $this->load->view('template/footer_admin');

        } else {


            $eventdata = array(
                'eventCreatorName' =>  "admin",
                'eventTitle' => $this->security->xss_clean($this->input->post('eventTitle')),
                'eventAim' => $this->security->xss_clean($this->input->post('eventAim')),
                'eventDesc' => $this->security->xss_clean($this->input->post('eventDesc')),
                'eventStartTime' => $this->security->xss_clean($this->input->post('eventStartTime')),
                'eventEndTime' => $this->security->xss_clean($this->input->post('eventEndTime')),
                'eventMinParti' => $this->security->xss_clean($this->input->post('eventMinParti')),
                'eventMaxParti' => $this->security->xss_clean($this->input->post('eventMaxParti')),
                'eventEstFee' => $this->security->xss_clean($this->input->post('eventEstFee')),
                'eventMemberPoint' => $this->security->xss_clean($this->input->post('eventMemberPoint')),
                'eventRestaurantName' => $this->security->xss_clean($this->input->post('eventRestaurantName')),
                'eventAddress' => $this->security->xss_clean($this->input->post('eventAddress')),
            );

            $eid = $this->CreateEvent_model->form_insert($eventdata);

            $this->JoinEvent_model->join_event($eid,"0");

            $data['title'] = 'Create Dining Event';

            $this->load->view('template/header_admin', $data);
            $this->load->view('template/navigation_admin');
            $this->load->view('template/sidebar_admin');
            $this->load->view('sucessful_admincreateevent');
            $this->load->view('template/footer_admin');

        }


    }


    function datetime_check($input)
    {
        if (preg_match('/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)\s([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $input))
        {
            return true; // it matched, return true or false if you want opposite
        }
        else
        {
            $this->form_validation->set_message('datetime_check', 'The %s field is in wrong format. It should be in yyyy-MM-dd hh:mm:ss format');
            return false;
        }
    }

    public function delete($id = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $name = $session_data['memberName'];
            $data['title'] = 'Delete Dining Event';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $eventcreatorname = $this->GetEventInfo_model->get_eventcreatorname($id);

            if ($eventcreatorname == $name){


                $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($id);

                $mid = $this->GetMemberInfo_model->get_memberID($name);

                $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($mid);

                $minusto = $nowpoint-$pointvalue;
                $this->EditPoint_model->event_minuspoint($name,$minusto);

                $this->load->model('DeleteEvent_model');
                $this->DeleteEvent_model->delete_event($id);
                $this->DeleteEvent_model->delete_jointevent($id);

                $this->load->view('sucessful_deleteevent');

            } else {

                $this->load->view('error_notcreatorcannotdeleteevent');

            }


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
                    'field' => 'eventID',
                    'label' => 'Event ID',
                    'rules' => 'trim|callback_check_database',
                ),
            );

            $this->form_validation->set_rules($config);
            $eventID = $this->security->xss_clean($this->input->post('eventID'));

            if($this->form_validation->run() == FALSE)
            {

                if($this->session->userdata('logged_in')) {

                    $data['title'] = 'View All Dining Event';
                    $data['eventInfo'] = $this->GetEventInfo_model->get_event();

                    if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('adminshowallevent_view',$this->data);
                        $this->load->view('template/footer_admin');

                    }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                        $this->load->view('template/navigation_member', $data);
                        $this->load->view('template/header', $data);
                        $this->load->view('showallevent_view',$this->data);
                        $this->load->view('template/footer');

                    }

                }

                else
                {
                    //If no session, redirect to login page
                    redirect('Welcome', 'refresh');
                }

            }
            else
            {

                if($this->session->userdata('logged_in')) {

                    $this->security->xss_clean($this->input->post('eventID'));

                    $data['title'] = 'View Dining Event Information';

                    if(array_key_exists("adminID",$this->session->userdata('logged_in'))) {

                        $this->data['eventInfo']=$this->GetEventInfo_model->get_adminparticular_event($eventID);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('adminshowparticularevent_view',$this->data);
                        $this->load->view('template/footer_admin');

                    }else if(array_key_exists("memberID",$this->session->userdata('logged_in'))){

                        $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($eventID);

                        $this->load->view('template/navigation_member', $data);
                        $this->load->view('template/header', $data);
                        $this->load->view('showparticularevent_view',$this->data);
                        $this->load->view('template/footer');

                    }

                }

                else
                {
                    //If no session, redirect to login page
                    redirect('Welcome', 'refresh');
                }


            }

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }



    }

    function check_database()
    {
        //Field validation succeeded.  Validate against database
        $eventID = $this->security->xss_clean($this->input->post('eventID'));

        //query the database
        $result = $this->SearchEvent_model->search($eventID);

        if($result)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid Event ID.');
            return false;
        }

    }

    public function joinevent ($id){

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberID'] = $session_data['memberID'];
            $data['memberName'] = $session_data['memberName'];
            $mid = $session_data['memberID'];
            $mname = $session_data['memberName'];

            $data['title'] = 'Join Dining Event';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);



            $maxparti = $this->GetEventInfo_model->get_eventmax($id);
            $nowparti = $this->JoinEvent_model->get_eventpartinum($id);


            if($nowparti < $maxparti) {

                $result = $this->JoinEvent_model->join_event($id,$mid);

                if($result){

                    $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($id);

                    $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($mid);

                    $addto = $pointvalue+$nowpoint;

                    $this->JoinEvent_model->join_event($id,$mid);
                    $this->EditPoint_model->event_addpoint($mname,$addto);

                    $this->load->view('sucessful_joinevent');
                } else {

                    $this->load->view('error_jointeventalready');
                }


            } else {

                $this->load->view('error_eventreachmaxalready');

            }



            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }


    }

    public function joint() {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['memberID'] = $session_data['memberID'];
            $mid = $session_data['memberID'];
            $data['title'] = 'View Joint Event';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_jointevent($mid);

            if (empty($this->data['eventInfo'])){

                $this->load->view('resultnotfound_view');

            } else{

                $this->load->view('showalljointevent_view',$this->data);

            }

            $this->load->view('template/footer');

        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }

    }

    public function quit($eid=""){

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $name = $session_data['memberName'];
            $mid = $session_data['memberID'];
            $data['title'] = 'Quit Dining Event';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $isjoint = $this->JoinEvent_model->check_eventjoint($eid,$mid);

            if ($isjoint == true){


                $pointvalue = (int)$this->GetEventInfo_model->get_eventpoint($eid);

//                $mid = $this->GetMemberInfo_model->get_memberID($name);

                $nowpoint = (int)$this->GetMemberInfo_model->get_memberpoint($mid);

                $minusto = $nowpoint-$pointvalue;
                $this->EditPoint_model->event_minuspoint($name,$minusto);

                $this->load->model('DeleteEvent_model');
                $this->DeleteEvent_model->delete_jointevent($eid);

                $this->load->view('sucessful_quitevent');

            } else {

                $this->load->view('error_notjointcannotquitevent');

            }


            $this->load->view('template/footer');


        } else {
            //If no session, redirect to login page
            redirect('Welcome', 'refresh');
        }




    }

    public function edit($id)
    {


        if ($this->session->userdata('logged_in')) {

            if (array_key_exists("adminID", $this->session->userdata('logged_in'))) {


                $data['event'] = $this->GetEventInfo_model->get_adminparticular_event($id);

                $this->load->library('form_validation');

                $config = array(

                    array(
                        'field' => 'eventTitle',
                        'label' => 'Title',
                        'rules' => 'trim|required|min_length[5]|max_length[50]',
                    ),

                    array(
                        'field' => 'eventAim',
                        'label' => 'Aim',
                        'rules' => 'trim|required|min_length[10]|max_length[255]',
                    ),

                    array(
                        'field' => 'eventDesc',
                        'label' => 'Description',
                        'rules' => 'trim|required|min_length[10]|max_length[255]',
                    ),

                    array(
                        'field' => 'eventStartTime',
                        'label' => 'Start Time',
                        'rules' => 'trim|required|callback_datetime_check',
                    ),

                    array(
                        'field' => 'eventEndTime',
                        'label' => 'End Time',
                        'rules' => 'trim|required|callback_datetime_check',
                    ),

                    array(
                        'field' => 'eventMinParti',
                        'label' => 'Min. Participant',
                        'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
                    ),

                    array(
                        'field' => 'eventMaxParti',
                        'label' => 'Max. Participant',
                        'rules' => 'trim|required|numeric|greater_than[1]|less_than_equal_to[12]',
                    ),

                    array(
                        'field' => 'eventEstFee',
                        'label' => 'Estimated Fee',
                        'rules' => 'trim|required|numeric|greater_than[0]|max_length[4]',
                    ),

                    array(
                        'field' => 'eventMemberPoint',
                        'label' => 'Member Point',
                        'rules' => 'trim|required|numeric|greater_than[0]|max_length[4]',
                    ),

                    array(
                        'field' => 'eventRestaurantName',
                        'label' => 'Restaurant Name',
                        'rules' => 'trim|required|min_length[3]|max_length[50]',
                    ),

                    array(
                        'field' => 'eventAddress',
                        'label' => 'Restaurant Address',
                        'rules' => 'trim|required|min_length[10]|max_length[255]',
                    ),
                );


                $this->form_validation->set_rules($config);


                if (!$this->input->post('post')) {


                    $data['title'] = 'Edit Dining Event Information';
                    $data['attributes'] = $this->GetEventInfo_model->get_adminparticular_event($id);


                    $this->load->view('template/header_admin', $data);
                    $this->load->view('template/navigation_admin');
                    $this->load->view('template/sidebar_admin');
                    $this->load->view('editevent_view', $data);
                    $this->load->view('template/footer_admin');


                } else {
                    if ($this->form_validation->run() == TRUE) {

                        $inputdata = array();

                        if ($this->input->post('eventTitle') != NULL) {
                            $inputdata['eventTitle'] = $this->security->xss_clean($this->input->post('eventTitle'));

                        }

                        if ($this->input->post('eventAim') != NULL) {
                            $inputdata['eventAim'] = $this->security->xss_clean($this->input->post('eventAim'));

                        }

                        if ($this->input->post('eventDesc') != NULL) {
                            $inputdata['eventDesc'] = $this->security->xss_clean($this->input->post('eventDesc'));
                        }

                        if ($this->input->post('eventStartTime') != NULL) {
                            $inputdata['eventStartTime'] = $this->security->xss_clean($this->input->post('eventStartTime'));

                        }

                        if ($this->input->post('eventEndTime') != NULL) {
                            $inputdata['eventEndTime'] = $this->security->xss_clean($this->input->post('eventEndTime'));

                        }

                        if ($this->input->post('eventMinParti') != NULL) {
                            $inputdata['eventMinParti'] = $this->security->xss_clean($this->input->post('eventMinParti'));
                        }

                        if ($this->input->post('eventMaxParti') != NULL) {
                            $inputdata['eventMaxParti'] = $this->security->xss_clean($this->input->post('eventMaxParti'));

                        }

                        if ($this->input->post('eventEstFee') != NULL) {
                            $inputdata['eventEstFee'] = $this->security->xss_clean($this->input->post('eventEstFee'));

                        }

                        if ($this->input->post('eventMemberPoint') != NULL) {
                            $inputdata['eventMemberPoint'] = $this->security->xss_clean($this->input->post('eventMemberPoint'));
                        }

                        if ($this->input->post('eventRestaurantName') != NULL) {
                            $inputdata['eventRestaurantName'] = $this->security->xss_clean($this->input->post('eventRestaurantName'));

                        }

                        if ($this->input->post('eventAddress') != NULL) {
                            $inputdata['eventAddress'] = $this->security->xss_clean($this->input->post('eventAddress'));

                        }


                        $this->load->model('EditMember_model');
                        $this->EditEvent_model->update_eventinfo($inputdata, $id);

                        $data['title'] = 'Edit Dining Event Information';
                        $data['attributes'] = $this->GetEventInfo_model->get_adminparticular_event($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('sucessful_editevent', $data);
                        $this->load->view('template/footer_admin');

                    } else {

                        $data['title'] = 'Edit Dining Event Information';
                        $data['attributes'] = $this->GetEventInfo_model->get_adminparticular_event($id);

                        $this->load->view('template/header_admin', $data);
                        $this->load->view('template/navigation_admin');
                        $this->load->view('template/sidebar_admin');
                        $this->load->view('editevent_view', $data);
                        $this->load->view('template/footer_admin');


                    }
                }


            } else if (array_key_exists("memberID", $this->session->userdata('logged_in'))) {

                $session_data = $this->session->userdata('logged_in');
                $data['memberName'] = $session_data['memberName'];
                $data['title'] = 'Home';
                $this->load->view('template/navigation_memberhome', $data);
                $this->load->view('template/header', $data);
                $this->load->view('diningeventhome_view', $data);
                $this->load->view('template/footer');

            }


        } else {
            //If no session, redirect to login page
            redirect('Login', 'refresh');
        }


    }


}