<?php $this->load->view('header'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
           <b>Daftar Data Pengguna</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
             <a href="<?php echo base_url() ?>user/form/add" class="btn btn-sm btn-success">
                <i class="glyphicon glyphicon-plus"></i> Tambah User Aplikasi</a>                
                <br><br>

            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Peran</th>
                        <th>Username</th>
                        <th>Password</th>
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
                                <td><?php echo $row->peran ?></td>
                                <td><?php echo $row->username ?></td> 
                                <td><?php echo $row->password ?></td> 
                                <td><a href="<?php echo base_url() ?>user/form/edit/<?php echo $row->id ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                                     <a href="<?php echo base_url() ?>user/hapus/<?php echo $row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                   
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