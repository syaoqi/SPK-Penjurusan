<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penentuan extends CI_Controller {
    var $tabel = 'perkalianbobot'; //variabel tabel

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
        $data['data'] = $this->model->get_all($this->tabel);
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vpenentuan', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vpenentuan', $data);
                    break;
               
                    }
        
    }

    public function hapus($gid) {
        $this->model->delete($this->tabel,$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('penentuan');
    }
    public function proses()
    {

        $kc1=$this->db->get_where('eigen', array('kriteria' => "ps_sn"))->row()->bobot;
       $kc2=$this->db->get_where('eigen', array('kriteria' => "bs_mk"))->row()->bobot;
       $kc3=$this->db->get_where('eigen', array('kriteria' => "ar_nt"))->row()->bobot;
       $kc4=$this->db->get_where('eigen', array('kriteria' => "iq"))->row()->bobot;
  
       $data = $this->db->get('hasil_normalisasi');
       $this->model->deleteall('perkalianbobot');
       $this->model->deleteall('hasil_rekomendasi');
       $this->model->deleteall('hasil_rekomendasi_ips');
       
        if ($data->num_rows > 0) {
            foreach ($data->result() as $row) {
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

                $pc1 = $ps * $kc1;
                $pc2 = $sn * $kc1;
                $pc3 = $bs * $kc2;
                $pc4 = $mk * $kc2;
                $pc5 = $ar * $kc3;
                $pc6 = $nt * $kc3;
                $pc7 = $iq * $kc4;
                $total_ipa = $pc2 + $pc4 + $pc6  + $pc7;
                $total_ips = $pc1 + $pc3 + $pc5  + $pc7;

                if ($total_ipa > $total_ips) {
                    $rek = "IPA";
                    $data = array(
                        'nama'  => $nama,
                        'jk'   => $jk,
                        'mk'    => $pc4,
                        'sn'     => $pc2,
                        'nt'    => $pc6,
                        'iq'    => $pc7,
                        'total_ipa'    => $total_ipa,
                        'total_ips'    => $total_ips,
                    );
            
                    $this->model->get_insert('hasil_rekomendasi',$data);
                }elseif ($total_ips > $total_ipa) {
                    $rek = "IPS";
                    $data = array(
                        'nama'  => $nama,
                        'jk'   => $jk,
                        'ps'   => $pc1,
                        'bs'    => $pc3,
                        'ar'    => $pc5,
                        'iq'    => $pc7,
                        'total_ipa'    => $total_ipa,
                        'total_ips'    => $total_ips,
                    );
            
                    $this->model->get_insert('hasil_rekomendasi_ips',$data);
                    
                }


                  $data = array(
                    'nama'  => $nama,
                    'jk'   => $jk,
                    'tgl'   => $tgl,
                    'ps'   => $pc1,
                    'sn'     => $pc2,
                    'bs'    => $pc3,
                    'mk'    => $pc4,
                    'ar'    => $pc5,
                    'nt'    => $pc6,
                    'iq'    => $pc7,
                    'total_ipa'    => $total_ipa,
                    'total_ips'    => $total_ips,
                    'rekom' => $rek
                );
        
                $this->model->get_insert('perkalianbobot',$data);
            }

            
            $dt_hasil = $this->db->query("SELECT * FROM hasil_rekomendasi ORDER BY total_ips desc");
            if ($dt_hasil->num_rows() > 0) {
                $num = 1;
                foreach ($dt_hasil->result() as $dt) {
                    $idku = $dt->id;
                    $rangking = $num;
                    $this->db->query("UPDATE hasil_rekomendasi SET pringkat = '$rangking' WHERE id = $idku");
                    $num++;
                    if ($rangking <= 40) {
                        $klas = "IPA 1";
                        $this->db->query("UPDATE hasil_rekomendasi SET klas = '$klas' WHERE id = $idku"); 
                    }elseif ($rangking >40) {
                        $klas = "IPA 2";
                        $this->db->query("UPDATE hasil_rekomendasi SET klas = '$klas' WHERE id = $idku");
                    }

                }
            }

            $dt_hasil_ips = $this->db->query("SELECT * FROM hasil_rekomendasi_ips ORDER BY total_ipa desc");
            if ($dt_hasil_ips->num_rows() > 0) {
                $num2 = 1;
                foreach ($dt_hasil_ips->result() as $dt2) {
                    $idku2 = $dt2->id;
                    $rangking2 = $num2;
                    $this->db->query("UPDATE hasil_rekomendasi_ips SET pringkat = '$rangking2' WHERE id = $idku2");
                    $num2++;
                    if ($rangking2 <= 40) {
                        $klas = "IPS 1";
                        $this->db->query("UPDATE hasil_rekomendasi_ips SET klas = '$klas' WHERE id = $idku2"); 
                    }elseif ($rangking2 >40 && $rangking2<=80) {
                        $klas = "IPS 2";
                        $this->db->query("UPDATE hasil_rekomendasi_ips SET klas = '$klas' WHERE id = $idku2");
                    }elseif ($rangking2 >80) {
                        $klas = "IPS 3";
                        $this->db->query("UPDATE hasil_rekomendasi_ips SET klas = '$klas' WHERE id = $idku2");
                    }
                }
            }


        }
    

          $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Penentuan jurusan siswa/i berhasil, silakan cek jurusan masing-masing siswa</div>");
        redirect('penentuan');
    }

}
