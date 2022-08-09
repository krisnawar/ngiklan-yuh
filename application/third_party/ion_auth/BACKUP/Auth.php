<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}


	function index()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}


    function login()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');

            if ($this->form_validation->run() == TRUE)
            {
                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    //$this->data['user_name'] = $this->ion_auth->user()->row()->username;
                    if ( ! $this->ion_auth->is_admin())
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('/', 'refresh');
                    }
                    else
                    {
                        /* Data */
                        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                        /* Load Template */
                        redirect('/', 'refresh');
                        // $this->template->auth_render('auth/choice', $this->data);
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
				    redirect('login', 'refresh');
                }
            }
            else
            {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['identity'] = array(
                    'name'        => 'identity',
                    'id'          => 'identity',
                    'type'        => 'text',
                    'value'       => $this->form_validation->set_value('identity'),
                    'class'       => 'form-control',
                    'placeholder' => lang('login_your_username')
                );
                $this->data['password'] = array(
                    'name'        => 'password',
                    'id'          => 'password',
                    'type'        => 'password',
                    'class'       => 'form-control',
                    'placeholder' => lang('login_your_password')
                );

                /* Load Template */
                $this->template->auth_render('auth/login', $this->data);
            }
        }
        else
        {
            redirect('/', 'refresh');
        }
    }


    function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin')
        {
            redirect('login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
    }
    
    function register()
    {
        if ( ! $this->ion_auth->logged_in())
        {
            $tables = $this->config->item('tables', 'ion_auth');

            $this->form_validation->set_rules('username', 'lang:username', 'required');
            $this->form_validation->set_rules('first_name', 'lang:users_firstname', 'required');
            $this->form_validation->set_rules('last_name', 'lang:users_lastname', 'required');
            $this->form_validation->set_rules('email', 'lang:users_email', 'required|valid_email|is_unique['.$tables['users'].'.email]');
            $this->form_validation->set_rules('phone', 'lang:users_phone', 'required');
            //$this->form_validation->set_rules('company', 'lang:users_company', 'required');
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
            
            if ($this->form_validation->run() == TRUE && $this->ion_auth->register($username, $password, $email, $additional_data))
            {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('login', 'refresh');
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
                $this->template->auth_render('auth/register', $this->data);
            }
        }
        else
        {
            redirect('/', 'refresh');
        }
    }

    function forgot_password()
	{
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('forgot_identity', 'ion_auth') != 'email')
		{
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('forgot_identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = [
				'name' => 'identity',
                'id' => 'identity',
                'class' => 'form-control',
			];

			if ($this->config->item('forgot_identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->template->auth_render('auth/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('forgot_identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('forgot_identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('forgot_identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				//$this->session->set_flashdata('message', $this->ion_auth->messages());
				//redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				$config = [
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.googlemail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'ngiklanyuh@gmail.com',
                            'smtp_pass' => '@NgiklanYuh988',
                            'mailtype' => 'html'
                                        ];
                $data = array(
            	  		        'identity'=>$forgotten['identity'],
                    	        'forgotten_password_code' => $forgotten['forgotten_password_code'],
                            );
                $this->load->library('email');
                $this->email->initialize($config);
                $this->load->helpers('url');
                $this->email->set_newline("\r\n");
                
                $this->email->to($forgotten['identity']);
                $this->email->from('krisnawardhana14@gmail.com');
                $this->email->subject('Forgot Password Confirmation');
                $body = $this->load->view('auth/email/forgot_password.tpl.php',$data,TRUE);
                $this->email->message($body);
                
                if ($this->email->send()) 
                {
                    $this->session->set_flashdata('message','Email Send sucessfully');
                    return redirect('auth/login');
                } 
                else
                {
                    $this->session->set_flashdata('message','Email Not Send');
	                show_error($this->email->print_debugger());
                }
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

}
