<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct()
	{
        parent::__construct();
    }

	function index()
	{
        if ($this->ion_auth->logged_in())
        {
            $this->data['user_name'] = $this->ion_auth->user()->row()->id;
            $this->data['milik_user'] = $this->ion_auth->user()->row();
        }
        else
        {
            $this->data['user_name'] = 'Tamu.';
        }
		$this->load->view('home', $this->data);
	}
}
