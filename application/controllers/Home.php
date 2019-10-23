<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
		$this->load->library('session');
    }
	public function index(){
		$data = [];
		$data['sidebar'] = $this->load->view('guest/sidebar','', true);
		$this->load->view('guest/header');
        $this->load->view('home', $data);
        $this->load->view('guest/footer');
	}
}	