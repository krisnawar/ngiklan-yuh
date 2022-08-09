<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/dashboard_model');
    }

    function index()
    {
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle']            = $this->page_title->show();

        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $this->data['count_users']          = $this->dashboard_model->get_count_record('users');

        $this->data['iklan_non_approve']    = $this->dashboard_model->get_iklan_status(0);

        $this->data['iklan_approved']       = $this->dashboard_model->get_iklan_status(1);

        $this->data['iklan_proceed']       = $this->dashboard_model->get_iklan_status(2);

        $this->data['iklan_live']       = $this->dashboard_model->get_iklan_status(4);

        $this->data['stat_iklan']           = $this->dashboard_model->get_iklan_stat();

        $this->data['stat_tayang']           = $this->dashboard_model->get_stat_tayang();

        $this->data['login_as']             = $this->ion_auth->is_superadmin();

        $this->template->admin_render('admin/dashboard/index', $this->data);
    }
}