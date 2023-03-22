<?php $this->load->view('header'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <!-- <div class="panel panel-default"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
        <h4><b style="margin-left: 280px;">DAFTAR SISWA / SISWI YANG DI REKOMENDASIKAN KE KELAS IPS</b></h4>

        </div> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
            <a href="<?php echo base_url() ?>rekomendasi" class="btn btn-sm btn-success">
                <i class="glyphicon"></i>REKOMENDASI IPA </a><br> <br>
                
            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th>
                        <th>JK</th>
                        <th>NILAI</th>
                        <th>PRINGKAT</th>
                        <th>KELAS</th>
                        
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
                                <td><b><?php echo $row->nama ?></b></td>
                                <td><b><?php echo $row->jk ?></b></td>  
                                <td><?php echo number_format($row->nilai,3) ?></td>
                                <td><b><?php echo $row->pringkat ?></b></td> 
                                <td><b><?php echo $row->kelas ?></b></td>  
                              
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