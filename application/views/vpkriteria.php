<?php $this->load->view('header'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>PERBANDINGAN NILAI KRITERIA BERPASANGAN</b>
        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
            <a href="<?php echo base_url() ?>nilaikriteria/proses_perbandingan" class="btn btn-sm btn-success">
                <i class="glyphicon"></i>PROSES ULANG</a> <br> <br>
            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Kriteria</th>
                        <th>Ps/Sn</th> 
                        <th>Bs/Mk</th> 
                        <th>Ar/Nt</th> 
                        <th>IQ</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($data2)) { ?>
                        <tr> 
                            <td colspan="8">Data tidak ditemukan</td> 
                        </tr> 
                    <?php
                    } else {
                        $no = 0;
                        foreach ($data2 as $row) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><?php echo $no ?></td>
                                <td><b><?php echo $row->kriteria ?></b></td> 
                                <td><?php echo $row->ps_sn ?></td> 
                                <td><?php echo $row->bs_mk ?></td>
                                <td><?php echo $row->ar_nt ?></td> 
                                <td><?php echo $row->iq ?></td>
                            </tr> 
                            <?php
                        }
                    }
                    ?> 
                </tbody> 
            </table> 
        </div> 
    </div> <!-- /panel --> 



    <div class="panel panel-default">
        <div class="panel-heading">
            <b>PERBANDINGAN NILAI KRITERIA BERPASANGAN</b>
        </div> 
        <div class="panel-body"> 
            

            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Kriteria</th>
                        <th>PS/SN</th> 
                        <th>BS/MK</th> 
                        <th>AR/NT</th>
                        <th>IQ</th>   
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
                                <td><b><?php echo $row->kriteria ?></b></td> 
                                <td><?php echo $row->ps_sn ?></td> 
                                <td><?php echo $row->bs_mk ?></td>
                                <td><?php echo $row->ar_nt ?></td> 
                                <td><?php echo $row->iq ?></td>
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