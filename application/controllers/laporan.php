<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {
    var $tabel = 'ipa';
    var $tabel2 = 'ips';

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->library('pdfgenerator');
        $this->load->helper('form','url');
         $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA"){
               redirect('login');
        }
    }

    // awal tampil index
    public function index() {
        $data['title'] = 'Laporan';
        $data['data'] = $this->model->get_rekom($this->tabel);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vlaporan', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vlaporan', $data);
                    break;
                           
                    }
    }
    public function indexips() {
        $data['title'] = 'Laporan';
        $data['data'] = $this->model->get_rekom($this->tabel2);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vlaporanips', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vlaporanips', $data);
                    break;
                           
                    }
    }
    

    public function laporanpenentuan()
    {
        
         $data['title'] = 'Laporan Penentuan Jurusan';
         $data['data'] = $this->model->get_rekom($this->tabel);
        $html = $this->load->view('vcetakipa', $data,true);
        
        $this->pdfgenerator->generate($html,'laporan','A4','portrait');

    }
    public function laporanpenentuanips()
    {
        
         $data['title'] = 'Laporan Penentuan Jurusan';
         $data['data'] = $this->model->get_rekom($this->tabel2);
        $html = $this->load->view('vcetakipa', $data,true);
        
        $this->pdfgenerator->generate($html,'laporan','A4','portrait');

    }
    
 

}
