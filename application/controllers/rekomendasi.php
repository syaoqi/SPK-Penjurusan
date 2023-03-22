<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {
    var $tabel = 'ipa';
    var $tabel2 = 'ips'; //variabel tabel

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
        $data['title'] = 'Proses penentuan';
        $data['data'] = $this->model->get_rekom($this->tabel);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vrekomendasi', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vrekomendasi', $data);
                    break;
                  
                    }
        
    }
    public function IPA() {
        $data['title'] = 'Proses penentuan';
        $data['data'] = $this->model->get_rekom($this->tabel);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'bk':
                $this->load->view('vrekomendasi', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vrekomendasi', $data);
                    break;
                    
                    }
        
    }public function IPS() {
        $data['title'] = 'Proses penentuan';
        $data['data'] = $this->model->get_rekom($this->tabel2);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vrekomendasi_ips', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vrekomendasi_ips', $data);
                    break;
                    
                    }
        
    }public function balance(){

        $this->model->deleteall('ipa');
        $this->model->deleteall('ips');
        $pindah = $this->db->query("SELECT max(id) as pringkat FROM hasil_rekomendasi_ips")->row()->pringkat;
        if ($pindah > 120) {
            $pd = $pindah - 120;
                for ($i=1; $i <= $pd; $i++) { 
                    $data['nama'] = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->nama;
                    $data['jk'] = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->jk;
                    $data['nilai'] = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->total_ipa;
                    $this->model->get_insert("ipa",$data);
                    // $this->db->query("DELETE FROM hasil_rekomendasi_ips WHERE id=$i");
                }
                $data = $this->db->get('hasil_rekomendasi');
                foreach ($data->result() as $row) {
                    $nama = $row->nama;
                    $jk = $row->jk;
                    $nilai = $row->total_ipa;
                    $data = array(
                        'nama'  => $nama,
                        'jk'   => $jk,
                        'nilai'    => $nilai,
                    );
            
                    $this->model->get_insert('ipa',$data);
                }
                for ($i=$pindah; $i > $pd ; $i--) { 
                    $nama = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->nama;
                    $jk = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->jk;
                    $nilai = $this->db->get_where('hasil_rekomendasi_ips', array('id'=> $i))->row()->total_ips;
                    $data2 = array(
                        'nama'  => $nama,
                        'jk'   => $jk,
                        'nilai'    => $nilai,
                    );
            
                    $this->model->get_insert('ips',$data2);
                }

            
            
            
        }

        $dt_hasil = $this->db->query("SELECT * FROM ipa ORDER BY nilai desc");
            if ($dt_hasil->num_rows() > 0) {
                $num = 1;
                foreach ($dt_hasil->result() as $dt) {
                    $idku = $dt->id;
                    $rangking = $num;
                    $this->db->query("UPDATE ipa SET pringkat = '$rangking' WHERE id = $idku");
                    $num++;
                    if ($rangking <= 40) {
                        $klas = "IPA 1";
                        $this->db->query("UPDATE ipa SET kelas = '$klas' WHERE id = $idku"); 
                    }elseif ($rangking >40) {
                        $klas = "IPA 2";
                        $this->db->query("UPDATE ipa SET kelas = '$klas' WHERE id = $idku");
                    }

                }
            }
            $dt_hasil_ips = $this->db->query("SELECT * FROM ips ORDER BY nilai desc");
            if ($dt_hasil_ips->num_rows() > 0) {
                $num2 = 1;
                foreach ($dt_hasil_ips->result() as $dt2) {
                    $idku2 = $dt2->id;
                    $rangking2 = $num2;
                    $this->db->query("UPDATE ips SET pringkat = '$rangking2' WHERE id = $idku2");
                    $num2++;
                    if ($rangking2 <= 40) {
                        $klas = "IPS 1";
                        $this->db->query("UPDATE ips SET kelas = '$klas' WHERE id = $idku2"); 
                    }elseif ($rangking2 >40 && $rangking2<=80) {
                        $klas = "IPS 2";
                        $this->db->query("UPDATE ips SET kelas = '$klas' WHERE id = $idku2");
                    }elseif ($rangking2 >80) {
                        $klas = "IPS 3";
                        $this->db->query("UPDATE ips SET kelas = '$klas' WHERE id = $idku2");
                    }
                }
            }
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i>Data Kelas IPA dan IPS Sudah Seimbangkan</div>");

       redirect("rekomendasi");


    }
    

}
