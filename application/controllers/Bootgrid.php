<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bootgrid extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('bootgrid_model');
 }

 function index()
 {
  $data['sidebar'] = $this->load->view('user/sidebar','', true);
  $this->load->view('user/header',$data);
  $this->load->view('user/index');
  $this->load->view('user/footer');
 }
 function ques_type()
 {
  $data['sidebar'] = $this->load->view('user/sidebar','', true);
  $this->load->view('user/header',$data);
  $this->load->view('user/ques_type');
  $this->load->view('user/footer');
 }
}
?>