<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembobotan extends CI_Controller {
     var $tabel3 = 'eigen';
     var $tabel2 = 'hasil_jumlah';
    

    public function __construct() {
        parent::__construct();
        $this->load->model('model');
        $this->load->helper('form','url');
         $this->session_data = $this->session->userdata('session_data');
        if ($this->session_data['status'] != "YA"){
               redirect('login');
        }
    }

    // awal tampil index
    public function index() {
        $data['title'] = 'Data Kriteria';
        $data['eigen'] = $this->model->get_all($this->tabel3,"asc");
        $data['lamda'] = $this->model->get_all($this->tabel2,"asc");
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vpembobotan', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vpembobotan', $data);
                    break;
                  
                    }
    }

    public function proses()
    {


        $a1=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ps_sn"))->row()->ps_sn;
        $a2=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "bs_mk"))->row()->ps_sn;
        $a3=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ar_nt"))->row()->ps_sn;
        $a4=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "iq"))->row()->ps_sn;
        $T1 = $a1 + $a2 + $a3 + $a4;

        $b1=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ps_sn"))->row()->bs_mk;
        $b2=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "bs_mk"))->row()->bs_mk;
        $b3=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ar_nt"))->row()->bs_mk;
        $b4=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "iq"))->row()->bs_mk;
        $T2 = $b1 + $b2 + $b3 + $b4;

        $c1=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ps_sn"))->row()->ar_nt;
        $c2=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "bs_mk"))->row()->ar_nt;
        $c3=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ar_nt"))->row()->ar_nt;
        $c4=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "iq"))->row()->ar_nt;
        $T3 = $c1 + $c2 + $c3 + $c4;

        $d1=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ps_sn"))->row()->iq;
        $d2=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "bs_mk"))->row()->iq;
        $d3=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "ar_nt"))->row()->iq;
        $d4=$this->db->get_where('perbandingan_kriteria', array('kriteria' => "iq"))->row()->iq;
        $T4 = $d1 + $d2 + $d3 + $d4;

                $this->model->deleteall('eigen');
        for ($i=1; $i <= 5; $i++) {
            if ($i==1) {
                $jumlah = ($a1 / $T1) + ($b1 / $T2) + ($c1 / $T3) + ($d1 / $T4);
                $bobot = $jumlah / 4;
                $lamdamax1 = $bobot * $T1;

                $dataeigen['kriteria'] = "ps_sn";
                $dataeigen['ps_sn'] = $a1 / $T1;
                $dataeigen['bs_mk'] = $b1 / $T2;
                $dataeigen['ar_nt'] = $c1 / $T3;
                $dataeigen['iq'] = $d1 / $T4;
                $dataeigen['jumlah'] = $jumlah;
                $dataeigen['bobot'] = $bobot;
                $dataeigen['lamdamax'] = $lamdamax1;

                $this->model->get_insert("eigen",$dataeigen);
            }else if ($i==2) {
                $jumlah = ($a2 / $T1) + ($b2 / $T2) + ($c2 / $T3) + ($d2 / $T4);
                $bobot = $jumlah / 4;
                $lamdamax2 = $bobot * $T2;

                $dataeigen['kriteria'] = "bs_mk";
                $dataeigen['ps_sn'] = $a2 / $T1;
                $dataeigen['bs_mk'] = $b2 / $T2;
                $dataeigen['ar_nt'] = $c2 / $T3;
                $dataeigen['iq'] = $d2 / $T4;
                $dataeigen['jumlah'] = $jumlah;
                $dataeigen['bobot'] = $bobot;
                $dataeigen['lamdamax'] = $lamdamax2;
                $this->model->get_insert("eigen",$dataeigen);

            }else if ($i==3) {
                $jumlah = ($a3 / $T1) + ($b3 / $T2) + ($c3 / $T3) + ($d3 / $T4);
                $bobot = $jumlah / 4;
                $lamdamax3 = $bobot * $T3;

                $dataeigen['kriteria'] = "ar_nt";
                $dataeigen['ps_sn'] = $a3 / $T1;
                $dataeigen['bs_mk'] = $b3 / $T2;
                $dataeigen['ar_nt'] = $c3 / $T3;
                $dataeigen['iq'] = $d3 / $T4;
                $dataeigen['jumlah'] = $jumlah;
                $dataeigen['bobot'] = $bobot;
                $dataeigen['lamdamax'] = $lamdamax3;
                $this->model->get_insert("eigen",$dataeigen);

            }else if ($i==4) {
                $jumlah = ($a4 / $T1) + ($b4 / $T2) + ($c4 / $T3) + ($d4 / $T4);
                $bobot = $jumlah / 4;
                $lamdamax4 = $bobot * $T4;

                $dataeigen['kriteria'] = "iq";
                $dataeigen['ps_sn'] = $a4 / $T1;
                $dataeigen['bs_mk'] = $b4 / $T2;
                $dataeigen['ar_nt'] = $c4 / $T3;
                $dataeigen['iq'] = $d4 / $T4;
                $dataeigen['jumlah'] = $jumlah;
                $dataeigen['bobot'] = $bobot;
                $dataeigen['lamdamax'] = $lamdamax4;
                $this->model->get_insert("eigen",$dataeigen);

            }

        }

        $lamdamax= $lamdamax1 + $lamdamax2 + $lamdamax3 + $lamdamax4;
        $ci= ($lamdamax-4) / (4-1);
        $cr= $ci / 0.9; 

        $this->model->deleteall('hasil_jumlah');

        $hasil_jumlah['hasil'] = "Jumlah";
                $hasil_jumlah['ps_sn']  = $T1;
                $hasil_jumlah['bs_mk'] = $T2;
                $hasil_jumlah['ar_nt'] = $T3;
                $hasil_jumlah['iq'] = $T4;
                $hasil_jumlah['lamdamax'] = $lamdamax;
                $hasil_jumlah['ci'] = $ci;
                $hasil_jumlah['cr'] = $cr;
                $this->model->get_insert("hasil_jumlah",$hasil_jumlah);
        
          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Pembobotan diperbaharui</div>");

       redirect("pembobotan");
    }
    
}




