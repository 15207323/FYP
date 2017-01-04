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
        $this->load->database();
        $this->load->model('GetEventInfo_model');
        $this->load->model('CreateEvent_model');
        $this->load->model('EditPoint_model');
        $this->load->model('DeleteEvent_model');
        $this->load->library('form_validation');

        $this->load->model('SearchEvent_model','');

    }

    public function index() {

        if($this->session->userdata('logged_in')) {

            $data['title'] = 'View All Dining Event';

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_event();
            $this->load->view('showallevent_view',$this->data);

            $this->load->view('template/footer');

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

            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($id);

            $this->load->view('showparticularevent_view',$this->data);

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
                'rules' => 'trim|required|integer',
            ),

            array(
                'field' => 'eventMaxParti',
                'label' => 'Max. Participant',
                'rules' => 'trim|required|integer',
            ),

            array(
                'field' => 'eventEstFee',
                'label' => 'Estimated Fee',
                'rules' => 'trim|required|decimal',
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
            $this->load->view('template/navigation_member');
            $this->load->view('template/header', $data);
            $this->load->view('createevent_view');
            $this->load->view('template/footer');

        } else {


            $session_data = $this->session->userdata('logged_in');
            $session_memberName = $session_data['memberName'];

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

            $pointvalue = $eventdata['eventMemberPoint'];

            $this->CreateEvent_model->form_insert($eventdata);

            $this->EditPoint_model->event_addpoint($session_memberName,$pointvalue);

            $data['title'] = 'Create Dining Event';
            $this->load->view('template/navigation_member');
            $this->load->view('template/header', $data);
            $this->load->view('sucessful_createevent');
            $this->load->view('template/footer');
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
            $this->form_validation->set_message('datetime_check', 'The %s field is in wrong format.');
            return false;
        }
    }

    public function delete($id = '') {

        if($this->session->userdata('logged_in')){

            $session_data = $this->session->userdata('logged_in');
            $data['memberName'] = $session_data['memberName'];
            $data['title'] = 'Delete Dining Event';


            $this->load->view('template/navigation_member', $data);
            $this->load->view('template/header', $data);

            $this->load->model('DeleteEvent_model');
            $this->DeleteEvent_model->delete_event($id);

            $this->load->view('sucessful_deleteevent');

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
                $session_data = $this->session->userdata('logged_in');
                $data['memberName'] = $session_data['memberName'];

                $data['title'] = 'View All Dining Event';

                $this->load->view('template/navigation_member', $data);
                $this->load->view('template/header', $data);

                $this->data['eventInfo']=$this->GetEventInfo_model->get_event();
                $this->load->view('showallevent_view',$this->data);

                $this->load->view('template/footer');
            }
            else
            {
                $session_data = $this->session->userdata('logged_in');

                $this->security->xss_clean($this->input->post('eventID'));
                $this->data['eventInfo']=$this->GetEventInfo_model->get_particular_event($eventID);


                $data['memberName'] = $session_data['memberName'];
                $data['title'] = 'View Dining Event Information';

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

    function check_database($eventid)
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




}