<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nilaikriteria extends CI_Controller {
     var $tabel = 'nilai_kriteria'; //variabel tabel 
     var $tabel2 = 'perbandingan_kriteria';
     var $tabel4 = 'perbandingan_kriteria2';
     var $tabel3 = 'nilaikriteria';

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
        $data['title'] = 'Data Kriteria AHP';
        $data['data'] = $this->model->get_all($this->tabel,"asc");
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vnilaikriteriaa', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vnilaikriteriaa', $data);
                    break;
               
                    }
        
    }

    //tampilan perbandingan kriteria
     public function proses_perbandingan() {

           $c1_2=$this->db->get_where('nilai_kriteria', array('id' => "1"))->row()->nilai;
           $pc1_2=$this->db->get_where('nilai_kriteria', array('id' => "1"))->row()->perbandingan;
           $c1_3=$this->db->get_where('nilai_kriteria', array('id' => "2"))->row()->nilai;
           $pc1_3=$this->db->get_where('nilai_kriteria', array('id' => "2"))->row()->perbandingan;
           $c1_4=$this->db->get_where('nilai_kriteria', array('id' => "3"))->row()->nilai;
           $pc1_4=$this->db->get_where('nilai_kriteria', array('id' => "3"))->row()->perbandingan;

           $c2_3=$this->db->get_where('nilai_kriteria', array('id' => "4"))->row()->nilai;
           $pc2_3=$this->db->get_where('nilai_kriteria', array('id' => "4"))->row()->perbandingan;
           $c2_4=$this->db->get_where('nilai_kriteria', array('id' => "5"))->row()->nilai;
           $pc2_4=$this->db->get_where('nilai_kriteria', array('id' => "5"))->row()->perbandingan;

           $c3_4=$this->db->get_where('nilai_kriteria', array('id' => "6"))->row()->nilai;
           $pc3_4=$this->db->get_where('nilai_kriteria', array('id' => "6"))->row()->perbandingan;

            $this->model->deleteall('perbandingan_kriteria');
            $this->model->deleteall('perbandingan_kriteria2');
        for ($i=1; $i <= 9; $i++) { 
            if ($i==1) {
                $data['kriteria'] = "ps_sn";
                $data['ps_sn']  = 1;
                $data['bs_mk'] = $c1_2;
                $data['ar_nt'] = $c1_3;
                $data['iq'] = $c1_4;
                $this->model->get_insert("perbandingan_kriteria",$data);

                $data2['kriteria'] = "ps_sn";
                $data2['ps_sn']  = "1";
                $data2['bs_mk'] = $pc1_2;
                $data2['ar_nt'] = $pc1_3;
                $data2['iq'] = $pc1_4;
                $this->model->get_insert("perbandingan_kriteria2",$data2);

            }else if ($i==2) {
                $data['kriteria'] = "bs_mk";
                $data2['kriteria'] = "bs_mk";

                $angka = $c1_2;
                switch ($angka){
                    case 1 :
                        $data['ps_sn']  = 1; 
                        $data2['ps_sn']  = "1";
                        break;
                    case 0.5 :
                        $data['ps_sn']  = 2;
                        $data2['ps_sn']  = "2";
                        break;
                    case 0.333333 :
                        $data['ps_sn']  = 3;
                        $data2['ps_sn']  = "3";
                        break;
                    case 0.25 :
                        $data['ps_sn']  = 4;
                        $data2['ps_sn']  = "4";
                        break;
                    case 0.2 :
                        $data['ps_sn']  = 5;
                        $data2['ps_sn']  = "5";
                        break;
                    case 0.166667 :
                        $data['ps_sn']  = 6;
                        $data2['ps_sn']  = "6";
                        break;
                    case 0.142857 :
                        $data['ps_sn']  = 7;
                        $data2['ps_sn']  = "7";
                        break;
                    case 0.125 :
                        $data['ps_sn']  = 8;
                        $data2['ps_sn']  = "8";
                        break;
                    case 0.111111 :
                        $data['ps_sn']  = 9;
                        $data2['ps_sn']  = "9";
                        break;
                    default:
                        $data['ps_sn']  = 1 / $angka;
                        $data2['ps_sn']  = "1/$angka";
                        break;
                        

                }
                
                $data['bs_mk']  = 1;
                $data['ar_nt'] = $c2_3;
                $data['iq'] = $c2_4;

                $data2['bs_mk'] =  "1";
                $data2['ar_nt'] = "$pc2_3";
                $data2['iq'] = "$pc2_4";

                 $this->model->get_insert("perbandingan_kriteria",$data);
                 $this->model->get_insert("perbandingan_kriteria2",$data2);
            }
            else if ($i==3) {
                $data['kriteria'] = "ar_nt";
                $data2['kriteria'] = "ar_nt";

                $angka1 = $c1_3;
                $angka2 = $c2_3;

                switch ($angka1){
                    case 1 :
                        $data['ps_sn']  = 1; 
                        $data2['ps_sn']  = "1";
                        break;
                    case 0.5 :
                        $data['ps_sn']  = 2;
                        $data2['ps_sn']  = "2";
                        break;
                    case 0.333333 :
                        $data['ps_sn']  = 3;
                        $data2['ps_sn']  = "3";
                        break;
                    case 0.25 :
                        $data['ps_sn']  = 4;
                        $data2['ps_sn']  = "4";
                        break;
                    case 0.2 :
                        $data['ps_sn']  = 5;
                        $data2['ps_sn']  = "5";
                        break;
                    case 0.166667 :
                        $data['ps_sn']  = 6;
                        $data2['ps_sn']  = "6";
                        break;
                    case 0.142857 :
                        $data['ps_sn']  = 7;
                        $data2['ps_sn']  = "7";
                        break;
                    case 0.125 :
                        $data['ps_sn']  = 8;
                        $data2['ps_sn']  = "8";
                        break;
                    case 0.111111 :
                        $data['ps_sn']  = 9;
                        $data2['ps_sn']  = "9";
                        break;
                    default:
                        $data['ps_sn']  = 1 / $angka1;
                        $data2['ps_sn']  = "1/$angka1";
                        break;
                }
                    
                        switch ($angka2){
                            case 1 :
                                $data['bs_mk']  = 1; 
                                $data2['bs_mk']  = "1";
                                break;
                            case 0.5 :
                                $data['bs_mk']  = 2;
                                $data2['bs_mk']  = "2";
                                break;
                            case 0.333333 :
                                $data['bs_mk']  = 3;
                                $data2['bs_mk']  = "3";
                                break;
                            case 0.25 :
                                $data['bs_mk']  = 4;
                                $data2['bs_mk']  = "4";
                                break;
                            case 0.2 :
                                $data['bs_mk']  = 5;
                                $data2['bs_mk']  = "5";
                                break;
                            case 0.166667 :
                                $data['bs_mk']  = 6;
                                $data2['bs_mk']  = "6";
                                break;
                            case 0.142857 :
                                $data['bs_mk']  = 7;
                                $data2['bs_mk']  = "7";
                                break;
                            case 0.125 :
                                $data['bs_mk']  = 8;
                                $data2['bs_mk']  = "8";
                                break;
                            case 0.111111 :
                                $data['bs_mk']  = 9;
                                $data2['bs_mk']  = "9";
                                break;
                            default:
                                $data['bs_mk']  = 1 / $angka2;
                                $data2['bs_mk']  = "1/$angka2";
                                break;
                            }

                $data['ar_nt'] = 1;
                $data['iq'] = $c3_4;
                

                $data2['ar_nt'] = "1";
                $data2['iq'] = "$pc3_4";

                 $this->model->get_insert("perbandingan_kriteria",$data);
                 $this->model->get_insert("perbandingan_kriteria2",$data2);
            }
            else if ($i==4) {
                $data['kriteria'] = "iq";
                $data2['kriteria'] = "iq";

                $angka1 = $c1_4;
                $angka2 = $c2_4;
                $angka3 = $c3_4;


                switch ($angka1){
                    case 1 :
                        $data['ps_sn']  = 1; 
                        $data2['ps_sn']  = "1";
                        break;
                    case 0.5 :
                        $data['ps_sn']  = 2;
                        $data2['ps_sn']  = "2";
                        break;
                    case 0.333333 :
                        $data['ps_sn']  = 3;
                        $data2['ps_sn']  = "3";
                        break;
                    case 0.25 :
                        $data['ps_sn']  = 4;
                        $data2['ps_sn']  = "4";
                        break;
                    case 0.2 :
                        $data['ps_sn']  = 5;
                        $data2['ps_sn']  = "5";
                        break;
                    case 0.166667 :
                        $data['ps_sn']  = 6;
                        $data2['ps_sn']  = "6";
                        break;
                    case 0.142857 :
                        $data['ps_sn']  = 7;
                        $data2['ps_sn']  = "7";
                        break;
                    case 0.125 :
                        $data['ps_sn']  = 8;
                        $data2['ps_sn']  = "8";
                        break;
                    case 0.111111 :
                        $data['ps_sn']  = 9;
                        $data2['ps_sn']  = "9";
                        break;
                    default:
                        $data['ps_sn']  = 1 / $angka1;
                        $data2['ps_sn']  = "1/$angka1";
                        break;
                }
                    
                        switch ($angka2){
                            case 1 :
                                $data['bs_mk']  = 1; 
                                $data2['bs_mk']  = "1";
                                break;
                            case 0.5 :
                                $data['bs_mk']  = 2;
                                $data2['bs_mk']  = "2";
                                break;
                            case 0.333333 :
                                $data['bs_mk']  = 3;
                                $data2['bs_mk']  = "3";
                                break;
                            case 0.25 :
                                $data['bs_mk']  = 4;
                                $data2['bs_mk']  = "4";
                                break;
                            case 0.2 :
                                $data['bs_mk']  = 5;
                                $data2['bs_mk']  = "5";
                                break;
                            case 0.166667 :
                                $data['bs_mk']  = 6;
                                $data2['bs_mk']  = "6";
                                break;
                            case 0.142857 :
                                $data['bs_mk']  = 7;
                                $data2['bs_mk']  = "7";
                                break;
                            case 0.125 :
                                $data['bs_mk']  = 8;
                                $data2['bs_mk']  = "8";
                                break;
                            case 0.111111 :
                                $data['bs_mk']  = 9;
                                $data2['bs_mk']  = "9";
                                break;
                            default:
                                $data['bs_mk']  = 1 / $angka2;
                                $data2['bs_mk']  = "1/$angka2";
                                break;
                            }
                    switch ($angka3){
                        case 1 :
                            $data['ar_nt']  = 1; 
                            $data2['ar_nt']  = "1";
                            break;
                        case 0.5 :
                            $data['ar_nt']  = 2;
                            $data2['ar_nt']  = "2";
                            break;
                        case 0.333333 :
                            $data['ar_nt']  = 3;
                            $data2['ar_nt']  = "3";
                            break;
                        case 0.25 :
                            $data['ar_nt']  = 4;
                            $data2['ar_nt']  = "4";
                            break;
                        case 0.2 :
                            $data['ar_nt']  = 5;
                            $data2['ar_nt']  = "5";
                            break;
                        case 0.166667 :
                            $data['ar_nt']  = 6;
                            $data2['ar_nt']  = "6";
                            break;
                        case 0.142857 :
                            $data['ar_nt']  = 7;
                            $data2['ar_nt']  = "7";
                            break;
                        case 0.125 :
                            $data['ar_nt']  = 8;
                            $data2['ar_nt']  = "8";
                            break;
                        case 0.111111 :
                            $data['ar_nt']  = 9;
                            $data2['ar_nt']  = "9";
                            break;
                        default:
                            $data['ar_nt']  = 1 / $angka3;
                            $data2['ar_nt']  = "1/$angka3";
                            break;
                        }

                $data['iq']  = 1;
                
                $data2['iq'] = "1";

                 $this->model->get_insert("perbandingan_kriteria",$data);
                 $this->model->get_insert("perbandingan_kriteria2",$data2);
            }
            
    
        }

        
        

        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data Perbandingan diperbaharui</div>");
       
       redirect("kriteria/perbandingan");
    }
    
    // function form
    public function form() {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        $id = $this->input->post('id');
        $kriteria1 = $this->input->post('kriteria1');
        $perbandingan = $this->input->post('perbandingan');

        if ($perbandingan == "1") {
            $nilai  = 1;
        }elseif ($perbandingan == "2") {
            $nilai  = 2;
        }elseif ($perbandingan == "3") {
            $nilai  = 3;
        }elseif ($perbandingan == "4") {
            $nilai  = 4;
        }elseif ($perbandingan == "5") {
            $nilai  = 5;
        }elseif ($perbandingan == "6") {
            $nilai  = 6;
        }elseif ($perbandingan == "7") {
            $nilai  = 7;
        }elseif ($perbandingan == "8") {
            $nilai  = 8;
        }elseif ($perbandingan == "9") {
            $nilai  = 9;
        }elseif ($perbandingan == "1/2") {
            $nilai  = 0.5;
        }elseif ($perbandingan == "1/3") {
            $nilai  = 0.333333;
        }elseif ($perbandingan == "1/4") {
            $nilai  = 0.25;
        }elseif ($perbandingan == "1/5") {
            $nilai  = 0.2;
        }elseif ($perbandingan == "1/6") {
            $nilai  = 0.166667;
        }elseif ($perbandingan == "1/7") {
            $nilai  = 0.142857;
        }elseif ($perbandingan == "1/8") {
            $nilai  = 0.125;
        }elseif ($perbandingan == "1/9") {
            $nilai  = 0.111111;
        }

        $kriteria2 = $this->input->post('kriteria2');
        

        

        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'UBAH NILAI KRITERIA PEMBANDING';
            $data['aksi'] = 'aksi_add';
            $data['qdata']= $this->model->get_all("nilai_kriteria");
            $data["nilai_kriteria"] = $this->db->get("nilaiperbandingan")->result_array();
            $this->load->view('vformnilaikriteria', $data);
        } 
        elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_byid($this->tabel,$idu);
            $data['title'] = 'Edit Kriteria';
            $data['aksi']  = 'aksi_edit';
            $this->load->view('vformnilaikriteriaa', $data);
        } 
        elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
              $data = array(
                'kriteria1'  => $kriteria1,
                'perbandingan'   => $perbandingan,
                'nilai'     => $nilai,
                'kriteria2'  => $kriteria2,
            );
    
            $this->model->get_update("nilai_kriteria","1",$data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
            redirect('nilaikriteria');
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
               $data = array(
                'kriteria1'  => $kriteria1,
                'perbandingan'   => $perbandingan,
                'nilai'     => $nilai,
                'kriteria2'  => $kriteria2,
            );
    
            $this->model->get_update($this->tabel,$id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('nilaikriteria');
        }
    }




}
