<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Calonsiswa extends CI_Controller {
     var $tabel = 'calon_siswa'; //variabel tabel 

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
        $data['title'] = 'Data Calon Siswa Baru';
        $data['data'] = $this->model->get_all($this->tabel,"asc");
        $peran = $this->session_data['peran'];
        switch ($peran) {
            case 'Admin':
                $this->load->view('vcalonsiswa', $data);
                break;
                case 'bk':
                    $this->load->view('bk/vcalonsiswa', $data);
                    break;
                
        
        }
        
    }
    
    // function form
    public function form() {
        // ambil variable url
        $mau_ke = $this->uri->segment(3);
        $idu = $this->uri->segment(4);

        // ambil variabel dari form
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tgl = $this->input->post('tgl');
        $ps = $this->input->post('ps');
        $sn = $this->input->post('sn');
        $bs = $this->input->post('bs');
        $mk = $this->input->post('mk');
        $ar = $this->input->post('ar');
        $nt = $this->input->post('nt');
        $iq = $this->input->post('iq');

      
        // mengarahkan fungsi form sesuai dengan uri segmentnya
        if ($mau_ke == "add") {
            $data['title'] = 'Tambah Data Siswa';
            $data['aksi'] = 'aksi_add';
            $peran = $this->session_data['peran'];
            switch ($peran) {
                case 'Admin':
                    $this->load->view('vformcalonsiswa', $data);
                    break;
                    case 'bk':
                        $this->load->view('bk/vformcalonsiswa', $data);
                        break;
                    
            
            }
            // $data['qdata']= $this->model->get_all("calon_penerima");
            // $this->load->view('bk/vformcalonsiswa', $data);
        } 
        elseif ($mau_ke == "edit") {
            $data['qdata'] = $this->model->get_byid($this->tabel,$idu);
            $data['title'] = 'Edit Data Siswa';
            $data['aksi']  = 'aksi_edit';
            $peran = $this->session_data['peran'];
            switch ($peran) {
                case 'Admin':
                    $this->load->view('vformcalonsiswa', $data);
                    break;
                    case 'bk':
                        $this->load->view('bk/vformcalonsiswa', $data);
                        break;
                    
            
            }
            
        } 
        elseif ($mau_ke == "aksi_add") {
            // jika uri segmentasinya AKSI_ADD sebagai fungsi untuk insert data
              $data = array(
                // 'id'  => $id,
           
                'nama'  => $nama,
                'jk'  => $jk,
                'tgl'  => $tgl,
      
                'ps'  => $ps,
                'sn'  => $sn,
                'bs'  => $bs,
                'mk'  => $mk,
                'ar'  => $ar,
                'nt'  => $nt,
                'iq'  => $iq,
                
                  
            );

             $this->db->where('id',$id);
    
             $cek = $this->db->get($this->tabel);
             if ($cek->num_rows()>0) {
                $this->model->get_update("calon_siswa","1",$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Nik KTP Tidak Boleh Sama</div>");
               redirect('calonsiswa');
             }else{
    
                $this->model->get_insert($this->tabel,$data);
                $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Simpan</div>");
                redirect('calonsiswa');
             }
        } elseif ($mau_ke == "aksi_edit") {
            // jika uri segmentnya aksi_edit sebagai fungsi untuk update
             $data = array(
                // 'id'  => $id,
              
                'nama'  => $nama,
                'jk'  => $jk,
                'tgl'  => $tgl,
               
                'ps'  => $ps,
                'sn'  => $sn,
                'bs'  => $bs,
                'mk'  => $mk,
                'ar'  => $ar,
                'nt'  => $nt,
                'iq'  => $iq,
                  
            );
    
            $this->model->get_update($this->tabel,$id, $data);
            $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Update</div>");
            redirect('calonsiswa');
        }
    }


    public function hapus($gid) {
        $this->model->delete($this->tabel,$gid);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus</div>");
        redirect('calonsiswa');
    }
     public function hapusall() {
        $this->model->deleteall($this->tabel);
        $this->session->set_flashdata("Pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data berhasil di Hapus Semua</div>");
        redirect('calonsiswa');
    }

}
