<?php $this->load->view('header_bk'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>DAFTAR KRITERIA</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
           

            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Kode</th>
                        <th>Nama</th> 
                        <th>Jenis</th>
                        
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
                                <td><?php echo $row->kode ?></td> 
                                 <td><?php echo $row->nama ?></td> 
                                <td><?php echo $row->jenis ?></td>
                                 
                                   
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