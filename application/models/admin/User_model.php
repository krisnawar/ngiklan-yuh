<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_record()
    {
        $query = $this->db->get('users');
        return $query;
    }
}