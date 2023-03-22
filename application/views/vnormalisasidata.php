<?php $this->load->view('header'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>NORMALISASI DATA SISWA</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
               <form action="<?php echo base_url() ?>normalisasidata/proses" method="post">
                     <input type="submit" class="btn btn-sm btn-success" value="NORMALISASI DATA SISWA"> 
                      <a href="<?php echo base_url() ?>normalisasidata/hapusall" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin ingin menghapus semua data ini?')">
                    <i class="glyphicon glyphicon-trash"></i> Hapus Semua Data</a> 
                
                    <br><br>

            </form>

            <table class="table table-striped myTable"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th>
                        <th>JK</th>
                        <th>IQ</th>
                        <th>PS</th>
                        <th>NT</th>
                        <th>MK</th>
                        <th>BS</th>
                        <th>AR</th>
                        <th>SN</th>
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
                                <td><?php echo $row->iq ?></td>
                                <td><?php echo $row->ps ?></td>
                                <td><?php echo $row->nt ?></td>
                                <td><?php echo $row->mk ?></td>
                                <td><?php echo $row->bs ?></td>
                                <td><?php echo $row->ar ?></td>
                                <td><?php echo $row->sn ?></td>
                              
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