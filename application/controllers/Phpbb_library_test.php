<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Phpbb_library_test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('phpbb_bridge');
    }

    function index() {

        $username = $this->session->userdata('username');
        $password = $this->session->userdata('userpassword');
        $this->phpbb_bridge->user_login($username, $password);
        ciredirect('forum');
    }

    function user_add() {
        $email = $this->session->userdata('useremail');
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('userpassword');
        $this->phpbb_bridge->user_add($email, $username, $password, '2');
        print_r($this->session->userdata());
    }

    function logout() {
        $this->phpbb_bridge->user_logout();
    }

}
