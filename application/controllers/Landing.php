<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MY_Controller
{
    function __construct()
	{
        parent::__construct();
        $this->lang->load('landing');
    }

    function index()
    {
        $this->load->view('landing_page', $this->data);
    }
}