<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }
    public function login() {
        $this->load->view('guest/header');
        $this->load->view('login');
        $this->load->view('guest/footer');
    }
    public function register() {
        $this->load->view('guest/header');
        $this->load->view('register');
        $this->load->view('guest/footer');
    }
    public function ajax_register() {
        $data = [];
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $conf_password = $this->input->post('conf_password');
        $data['query'] = $this->User_model->get_username(['username' => $username]);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = true;
            $data['message'] = validation_errors();
        } elseif ($data['query'] > 0) {
            $data['error'] = true;
            $data['message'] = '<p>User already exist</p>';
        } elseif ($password !== $conf_password) {
            $data['error'] = true;
            $data['message'] = '<p>Password not match</p>';
        } else {
            $input = ['username' => $username, 'password' => md5($password) ];
            $query_insert = $this->User_model->new_user($input);
            if ($query_insert == true) {
                $data['error'] = false;
                $data['message'] = '<p>Registered Successfully</p>';
            }
        }
        echo json_encode($data);
    }
    public function ajax_login() {
        $data = [];
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $input = ['username' => $username, 'password' => md5($password)];
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = true;
            $data['message'] = validation_errors();
        } else {
			$login_query = $this->User_model->login_user($input);
            if ($login_query == true) {
				$user_detail = $this->User_model->login_user_detail($input);
				$this->session->set_userdata([
					'username'  => $user_detail->username,
					'user_id'  => $user_detail->id
				]);
                $data['error'] = false;
                $data['message'] = '<p>Login Successfull</p>';
            }else{
				$data['error'] = true;
                $data['message'] = '<p>Invalid Username or Password</p>';
			}
        }
        echo json_encode($data);
    }
}
