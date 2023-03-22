<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('model'));
        $this->session_data = $this->session->userdata('session_data');
		if ($this->session_data['status'] != "YA" ){
        	   redirect('login');
        }

	}

    public function index() {
        
        $data['title'] = 'SPK PENJURUSAN';
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('home', $data);
                break;
                case 'bk':
                    $this->load->view('home_bk', $data);
                    break;
        }
        
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

