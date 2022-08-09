<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page_title->push(lang('menu_user'));
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, lang('menu_user'), 'admin/user');
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->load->model('admin/user_model');
    }

    function index()
    {
        $this->data['users_all'] = $this->user_model->get_user_record();
        $this->template->admin_render('admin/user/index.php', $this->data);
    }

}