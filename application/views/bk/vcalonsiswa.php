<?php $this->load->view('header_bk'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>DAFTAR NAMA CALON SISWA/SISWI BARU</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
            <a href="<?php echo base_url() ?>calonsiswa/form/add" class="btn btn-sm btn-success">
                <i class="glyphicon glyphicon-plus"></i> Tambah Data Siswa</a> 
              

                 <a href="<?php echo base_url() ?>calonsiswa/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                <i class="glyphicon glyphicon-trash"></i> Hapus Semua Data</a> 
                <br><br>

            <table class="table table-striped myTable"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th> 
                        <th>JK</th>
                        <th>Tanggal Lahir</th>
                        <th>IQ</th>
                        <th>PS</th>
                        <th>NT</th>
                        <th>MK</th>
                        <th>BS</th>
                        <th>AR</th>
                        <th>SN</th>
                        <th>Aksi</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($data)) { ?>
                        <tr> 
                            <td colspan="8">Data tidak ditemukan</td> 
                        </tr> 
                    <?php
                    } else {
                        $no = 0;
                        foreach ($data as $row) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->nama ?></td> 
                                <td><?php echo $row->jk ?></td>
                                <td><?php echo $row->tgl ?></td>
                                <td><?php echo $row->iq ?></td>
                                <td><?php echo $row->ps ?></td>
                                <td><?php echo $row->nt ?></td>
                                <td><?php echo $row->mk ?></td>
                                <td><?php echo $row->bs ?></td>
                                <td><?php echo $row->ar ?></td>
                                <td><?php echo $row->sn ?></td>
                                <td><a href="<?php echo base_url() ?>calonsiswa/form/edit/<?php echo $row->id ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                                <a href="<?php echo base_url() ?>calonsiswa/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                   
                                </td> 
                            </tr> 
                            <?php
                        }
                    }
                    ?> 
                </tbody> 
            </table> 
        </div> 
    </div> <!-- /panel --> 
</div> <!-- /container --> 
<?php $this->load->view('footer'); ?> 