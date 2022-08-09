<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_Admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->page_title->push(lang('menu_add_admin'));
        $this->data['pagetitle'] = $this->page_title->show();
        $this->breadcrumbs->unshift(1, lang('menu_add_admin'), 'admin/tambah_admin');
    }

    function index()
    {
        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $tables = $this->config->item('tables', 'ion_auth');

        $this->form_validation->set_rules('username', 'lang:username', 'required');
        $this->form_validation->set_rules('first_name', 'lang:users_firstname', 'required');
        $this->form_validation->set_rules('last_name', 'lang:users_lastname', 'required');
        $this->form_validation->set_rules('email', 'lang:users_email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
        $this->form_validation->set_rules('phone', 'lang:users_phone', 'required');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'lang:users_password_confirm', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $username = strtolower($this->input->post('username'));
            $email    = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone'),
            );
        }

        if ($this->form_validation->run() == TRUE && $this->ion_auth->register_admin($username, $password, $email, $additional_data))
        {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('admin/tambah_admin', 'refresh');
        }
        else
        {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['username'] = array(
                'name'  => 'username',
                'id'    => 'username',
                'type'  => 'text',
                'pattern' => '^[A-Za-z0-9@._\-]{6,16}$',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('username'),
            );
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'email',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'tel',
                'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            /* Load Template */
            $this->template->admin_render('admin/tambah_admin/index', $this->data);
        }
    }
}