<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Normalisasidata extends CI_Controller {
     var $tabel = 'hasil_normalisasi'; //variabel tabel 

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
        $data['title'] = 'Data Penerima Beasiswa Ternormalisasi';
        $data['data'] = $this->model->get_all($this->tabel);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vnormalisasidata', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vnormalisasidata', $data);
                    break;
                  
                    }
    }

   
      public function hapusall() {
        $this->model->deleteall('hasil_normalisasi');
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('normalisasidata');
    }
    public function proses()
    {
        
       $c1=$this->db->get_where('kriteria', array('id' => 1))->row()->jenis;
       $c2=$this->db->get_where('kriteria', array('id' => 2))->row()->jenis;
       $c3=$this->db->get_where('kriteria', array('id' => 3))->row()->jenis;
       $c4=$this->db->get_where('kriteria', array('id' => 4))->row()->jenis;
       
       $data = $this->db->get('calon_siswa');
    

        // $this->db->where('tahun',$tahun);  
        $data2 = $this->db->get('calon_siswa');
        $this->model->deleteall('hasil_normalisasi');
        if ($data2->num_rows() > 0) {

            $max_c1=1;
            $min_c1=1;
            $max_c2=1;
            $min_c2=1;
            $max_c3=1;
            $min_c3=1;
            $max_c4=1;
            $min_c4=1;
            $max_c5=1;
            $min_c5=1;
            $max_c6=1;
            $min_c6=1;
            $max_c7=1;
            $min_c7=1;
            
            if($c1=="Benefit"){
               $max_c1 = $this->db->query("SELECT max(ps) as PS_SN  FROM calon_siswa")->row()->PS_SN;
               $max_c2 = $this->db->query("SELECT max(sn) as PS_SN FROM calon_siswa")->row()->PS_SN;
               $this->db->query("UPDATE r_max SET ps = '$max_c1' WHERE id = 1");
               $this->db->query("UPDATE r_max SET sn = '$max_c2' WHERE id = 1");
            }else{
               $min_c1 = $this->db->query("SELECT min(ps) as PS_SN FROM calon_siswa ")->row()->PS_SN;
               $min_c2 = $this->db->query("SELECT min(sn) as PS_SN FROM calon_siswa")->row()->PS_SN;
            }
            if($c2=="Benefit"){
                 $max_c3 = $this->db->query("SELECT max(bs) as BS_MK FROM calon_siswa")->row()->BS_MK;
                 $max_c4 = $this->db->query("SELECT max(mk) as BS_MK FROM calon_siswa")->row()->BS_MK;
                 $this->db->query("UPDATE r_max SET bs = '$max_c3' WHERE id = 1");
               $this->db->query("UPDATE r_max SET mk = '$max_c4' WHERE id = 1");
            }else{
                 $min_c3 = $this->db->query("SELECT min(bs) as BS_MK FROM calon_siswa")->row()->BS_MK;
                 $min_c4 = $this->db->query("SELECT min(mk) as BS_MK FROM calon_siswa")->row()->BS_MK;
            }
            
            if($c3=="Benefit"){
                $max_c5 = $this->db->query("SELECT max(ar) as AR_NT FROM calon_siswa")->row()->AR_NT;
                $max_c6 = $this->db->query("SELECT max(nt) as AR_NT FROM calon_siswa")->row()->AR_NT;
                $this->db->query("UPDATE r_max SET ar = '$max_c5' WHERE id = 1");
               $this->db->query("UPDATE r_max SET nt = '$max_c6' WHERE id = 1");
            }else{
                 $min_c5 = $this->db->query("SELECT min(ar) as AR_NT FROM calon_siswa")->row()->AR_NT;
                 $min_c6 = $this->db->query("SELECT min(nt) as AR_NT FROM calon_siswa")->row()->AR_NT;
            }
            if($c4=="Benefit"){
                $max_c7 = $this->db->query("SELECT max(iq) as IQ FROM calon_siswa")->row()->IQ;
                $this->db->query("UPDATE r_max SET iq = '$max_c7' WHERE id = 1");
            }else{
                 $min_c7 = $this->db->query("SELECT min(iq) as IQ FROM calon_siswa")->row()->IQ;
            }

            $tess = array(
               'max_c1' =>  $max_c1,
               'min_c1' =>$min_c1,
               'max_c2' => $max_c2,
                'min_c2'=>$min_c2,
               'max_c3' => $max_c3,
               'min_c3'=> $min_c3,
               'max_c4' => $max_c4,
               'min_c4'=> $min_c4,
               'max_c5' => $max_c5,
               'min_c5'=> $min_c5,
               'max_c6' => $max_c6,
               'min_c6'=> $min_c6,
               'max_c7' => $max_c7,
               'min_c7'=> $min_c7,
               
            );

      //      print_r($tess);
            foreach ($data2->result() as $row) {
              $nama = $row->nama;
              $jk = $row->jk;
              $tgl = $row->tgl;
              $ps = $row->ps;
              $sn = $row->sn;
              $bs = $row->bs;
              $mk = $row->mk;
              $ar = $row->ar;
              $nt = $row->nt;
              $iq = $row->iq;
                

                if($c1=="Benefit"){
                  $hc1 = $ps/$max_c1;
                }else{
                  $hc1= $min_c1/$ps;
                }

                if($c1=="Benefit"){
                  $hc2 = $sn/$max_c2;
                }else{
                  $hc2= $min_c2/$sn;
                }

                if($c2=="Benefit"){
                  $hc3 = $bs/$max_c3;
                }else{
                  $hc3= $min_c3/$bs;
                }

                 if($c2=="Benefit"){
                  $hc4 = $mk/$max_c4;
                }else{
                  $hc4= $min_c4/$mk;
                }

                if($c3=="Benefit"){
                  $hc5 = $ar/$max_c5;
                 
                }else{
                   $hc5= $min_c5/$ar;
                  
                }

                if($c3=="Benefit"){
                    $hc6 = $nt/$max_c6;
                   
                  }else{
                     $hc6= $min_c6/$nt;
                    
                  }

                  if($c4=="Benefit"){
                    $hc7 = $iq/$max_c7;
                   
                  }else{
                     $hc7= $min_c7/$iq;
                    
                  }

    

                $data = array(
                    'nama'  => $nama,
                    'jk'   => $jk,
                    'tgl'   => $tgl,
                    'ps'   => $hc1,
                    'sn'     => $hc2,
                    'bs'    => $hc3,
                    'mk'    => $hc4,
                    'ar'    => $hc5,
                    'nt'    => $hc6,
                    'iq'    => $hc7
                      
                );
        
                $this->model->get_insert('hasil_normalisasi',$data);

            }
            
        }

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil Di Normalisasi</div>");
        redirect('normalisasidata');
    }

}
