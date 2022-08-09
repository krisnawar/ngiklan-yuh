<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        /* COMMON :: ADMIN & PUBLIC */
        /* Load */
        $this->load->database();
        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->config('common/dp_config');
        $this->load->config('common/dp_language');
        $this->load->library(array('form_validation', 'ion_auth', 'template', 'common/mobile_detect'));
        $this->load->helper(array('array', 'language', 'url'));
        $this->load->model('common/prefs_model');


        $this->data['lang']                 = element($this->config->item('language'), $this->config->item('language_abbr'));
        $this->data['charset']              = $this->config->item('charset');
        $this->data['frameworks_dir']       = $this->config->item('frameworks_dir');
        $this->data['non_frameworks_dir']   = $this->config->item('non_frameworks_dir');
        $this->data['plugins_dir']          = $this->config->item('plugins_dir');
        $this->data['avatar_dir']           = $this->config->item('avatar_dir');
        $this->data['img_dir']              = $this->config->item('img_dir');
        $this->data['favicon']              = base_url($this->data['img_dir'] . '/NYIcon.ico');

        /* Any mobile device (phones or tablets) */
        if ($this->mobile_detect->isMobile())
        {
            $this->data['mobile'] = TRUE;

            if ($this->mobile_detect->isiOS()){
                $this->data['ios']     = TRUE;
                $this->data['android'] = FALSE;
            }
            else if ($this->mobile_detect->isAndroidOS())
            {
                $this->data['ios']     = FALSE;
                $this->data['android'] = TRUE;
            }
            else
            {
                $this->data['ios']     = FALSE;
                $this->data['android'] = FALSE;
            }

            if ($this->mobile_detect->getBrowsers('IE')){
                $this->data['mobile_ie'] = TRUE;
            }
            else
            {
                $this->data['mobile_ie'] = FALSE;
            }
        }
        else
        {
            $this->data['mobile']    = FALSE;
            $this->data['ios']       = FALSE;
            $this->data['android']   = FALSE;
            $this->data['mobile_ie'] = FALSE;
        }

        if ($this->ion_auth->logged_in() && $this->ion_auth->is_superadmin())
        {
            $this->data['superadmin_link'] = TRUE;
        }
        else
        {
            $this->data['superadmin_link'] = FALSE;
        }

        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
        {
            $this->data['admin_link'] = TRUE;
        }
        else
        {
            $this->data['admin_link'] = FALSE;
        }

        if ($this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() && ! $this->ion_auth->is_superadmin())
        {
            $this->data['user_link'] = TRUE;
        }
        else
        {
            $this->data['user_link'] = FALSE;
        }

        if ($this->ion_auth->logged_in())
        {
            $this->data['logout_link'] = TRUE;
        }
        else
        {
            $this->data['logout_link'] = FALSE;
        }
    }
}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            $this->session->set_flashdata('message', 'Anda harus login dan/atau seorang admin');
            redirect('error/404', 'refresh');
            //redirect('login', 'refresh');
        }
        else
        {
            $this->load->config('admin/dp_config');
            $this->load->library('admin/page_title');
            $this->load->library('admin/breadcrumbs');
            $this->load->helper('menu');
            $this->lang->load('admin/admin');

            $this->breadcrumbs->unshift(0, $this->lang->line('menu_dashboard'), 'admin/dashboard');

            $this->data['title']        = $this->config->item('title');

            $this->data['user_login']   = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        }
    }
}

class User_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (! $this->ion_auth->logged_in())
        {
            $this->session->set_flashdata('message', 'Anda harus login');
            redirect('login', 'refresh');
        }
        else
        {
            $this->load->config('admin/dp_config');
            $this->load->library('admin/page_title');
            $this->load->library('admin/breadcrumbs');
            $this->load->helper('menu');
            $this->lang->load('admin/admin');

            $this->breadcrumbs->unshift(0, $this->lang->line('menu_dashboard'), 'admin/dashboard');

            $this->data['title']        = $this->config->item('title');

            $this->data['user_login']   = $this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
        }
    }
}
        