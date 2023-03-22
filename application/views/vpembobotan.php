<?php $this->load->view('header'); ?> 

<div class="container"> 
<br><br>
     <div class="panel panel-default">
        <div class="panel-heading">
            <b>HASIL PEMBOBOTAN</b>
        </div> 
        <div class="panel-body"> 
        <p><?php echo $this->session->flashdata('pesan') ?> </p> 
             <a href="<?php echo base_url() ?>pembobotan/proses" class="btn btn-sm btn-success">
                <i class="glyphicon"></i> Proses</a><br> <br>
            <table class="table table-striped"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Kriteria</th>
                        <th>PS/SN</th> 
                        <th>BS/MK</th> 
                        <th>AR/NT</th> 
                        <th>IQ</th>
                        <th>Jumlah</th> 
                        <th>Bobot</th>
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($eigen)) { ?>
                        <tr> 
                            <td colspan="8">Data tidak ditemukan</td> 
                        </tr> 
                    <?php
                    } else {
                        $no = 0;
                        foreach ($eigen as $row) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->kriteria ?></td> 
                                <td><?php echo number_format($row->ps_sn,3) ?></td> 
                                <td><?php echo number_format($row->bs_mk,3) ?></td>
                                <td><?php echo number_format($row->ar_nt,3) ?></td> 
                                <td><?php echo number_format($row->iq,3) ?></td>
                                
                                <td><b><?php echo number_format($row->jumlah,3) ?></b></td>
                                <td><b><?php echo number_format($row->bobot,3) ?></b></td>
                            </tr> 
                            <?php
                        }
                    }
                    ?> 

                </tbody> 
            </table> 

            <div class="mx-auto">
            <table class="table" style="width: 230px;">
            <tr>
            <td><b>CI</b></td>

            <?php
            foreach ($lamda as $row) {
            ?> 
            <td><b><?php echo $row->ci ?></b></td> 
            <?php
             }
            ?>
            </tr>


            <tr>
            <td><b>CR</b></td>
            <?php
            foreach ($lamda as $row) {
            ?> 
            <td><b><?php echo $row->cr ?></b></td> 
            <?php
             }
            ?>
            </tr>
            </table>
            </div>
          
        </div> 
    </div> <!-- /panel --> 

</div> <!-- /container --> 
<?php $this->load->view('footer'); ?> 