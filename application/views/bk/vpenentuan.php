<?php $this->load->view('header_bk'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <!-- <div class="panel panel-default"> -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>PENENTUAN JURUSAN SISWA/SISWI</b>
        </div> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
            <a href="<?php echo base_url() ?>penentuan/proses" class="btn btn-sm btn-success">
                <i class="glyphicon"></i> PROSES </a><br> <br>
                
               

            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th>
                        <th>IQ</th>
                        <th>PS</th>
                        <th>NT</th>
                        <th>MK</th>
                        <th>BS</th>
                        <th>AR</th>
                        <th>SN</th>
                        <th>TOTAL IPA</th>
                        <th>TOTAL IPS</th>
                        <th>REKOMENDASI</th>
                        
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
                                <td><?php echo number_format($row->iq,3) ?></td>
                                <td><?php echo number_format($row->ps,3) ?></td>
                                <td><?php echo number_format($row->nt,3) ?></td>
                                <td><?php echo number_format($row->mk,3) ?></td>
                                <td><?php echo number_format($row->bs,3) ?></td>
                                <td><?php echo number_format($row->ar,3) ?></td>
                                <td><?php echo number_format($row->sn,3) ?></td>
                                <td><?php echo number_format($row->total_ipa,3) ?></td> 
                                <td><?php echo number_format($row->total_ips,3) ?></b></td>
                                <td><b><?php echo $row->rekom ?></b></td>
                              
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