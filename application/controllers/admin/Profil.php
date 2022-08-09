<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs->unshift(1, lang('menu_profile'), 'admin/profil');
        $this->load->model('admin/profil_model');
    }

    function index()
    {
        $this->template->admin_render('admin/profil/index', $this->data);
    }

    function info_profil()
    {
        $this->page_title->push(lang('menu_profile_info'));
        $this->data['pagetitle']         = $this->page_title->show();
        $this->breadcrumbs->unshift(2, lang('menu_profile_info'), 'admin/profil/info_profil');
        $this->data['breadcrumb']           = $this->breadcrumbs->show();
        $this->template->admin_render('admin/profil/info_profil', $this->data);
    }
    
    function ubah_profil()
    {
        $this->page_title->push(lang('menu_profile_change_profile'));
        $this->data['pagetitle']            = $this->page_title->show();
        $this->breadcrumbs->unshift(2, lang('menu_profile_change_profile'), 'admin/profil/ubah_profil');
        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $this->data['id']                   = $this->data['user_login']['id'];

        $this->form_validation->set_rules('namadepan', 'Nama Depan', 'required|alpha');
        $this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required|alpha');
        $this->form_validation->set_rules('no_hp', 'No HP/Whatsapp', 'required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() == TRUE)
        {
            $first_name     = $this->input->post('namadepan', TRUE);
            $last_name      = $this->input->post('namabelakang', TRUE);
            $phone          = $this->input->post('no_hp', TRUE);
            $email          = $this->input->post('email', TRUE);

            $this->session->set_flashdata('message', $this->profil_model->get_error());
        }

        if($this->form_validation->run() == TRUE && $this->profil_model->ubah_profil($this->data['id'], $first_name, $last_name, $phone, $email))
        {
            $this->session->set_flashdata('berhasil', $this->profil_model->get_error());
            redirect('admin/profil/ubah_profil', 'refresh');
        }

        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['berhasil'] = $this->session->flashdata('berhasil');

            $this->data['namadepan'] = array(
                'name'  => 'namadepan',
                'id'    => 'namadepan',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => $this->data['user_login']['firstname'],
            );
            $this->data['namabelakang'] = array(
                'name'  => 'namabelakang',
                'id'    => 'namabelakang',
                'type'  => 'text',
                'class' => 'form-control',
                'value' => str_replace(' ', '', $this->data['user_login']['lastname']),
            );
            $this->data['no_hp'] = array(
                'name'  => 'no_hp',
                'id'    => 'no_hp',
                'type'  => 'tel',
                'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
                'class' => 'form-control',
                'value' => $this->data['user_login']['phone'],
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'email',
                'class' => 'form-control',
                'value' => $this->data['user_login']['email'],
            );

            $this->session->set_flashdata('message', $this->profil_model->get_error());
            $this->template->admin_render('admin/profil/ubah_profil', $this->data);
        }
    }

    function ubah_password()
    {
        $this->page_title->push(lang('menu_profile_change_password'));
        $this->data['pagetitle']            = $this->page_title->show();
        $this->breadcrumbs->unshift(2, lang('menu_profile_change_password'), 'admin/profil/ubah_password');
        $this->data['breadcrumb']           = $this->breadcrumbs->show();

        $this->form_validation->set_rules('old', 'Password Lama', 'required');
		$this->form_validation->set_rules('new', 'Password Baru', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Konfirmasi Password Baru', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['berhasil'] = $this->session->flashdata('berhasil');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
                'type' => 'password',
                'class' => 'form-control',
			];
			$this->data['new_password'] = [
				'name' => 'new',
				'id' => 'password',
				'type' => 'password',
                'class' => 'form-control',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
                'class' => 'form-control',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
                'class' => 'form-control',
				'value' => $user->id,
			];

			// render
			$this->template->admin_render('admin/profil/ubah_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('berhasil', $this->ion_auth->messages());
                redirect('admin/profil/ubah_password', 'refresh');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/profil/ubah_password', 'refresh');
			}
		}
    }
}