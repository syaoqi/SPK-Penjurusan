<?php $this->load->view('header'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
        <h4><b >Nilai Kriteria</b></h4>

        </div> 
        <div class="panel-body"> 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
          
            <table class="table table-striped"> 
                <thead"> 
                    <tr> 
                        <th>No</th> 
                        <th>Kriteria 1</th>
                        <th>Perbandingan</th> 
                        <th>Nilai</th>
                        <th>Kriteria 2</th>
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
                                <td><?php echo $row->kriteria1 ?></td> 
                                 <td><?php echo $row->perbandingan ?></td> 
                                 <td><?php echo $row->nilai ?></td>
                                 <td><?php echo $row->kriteria2 ?></td> 
                                <td><a href="<?php echo base_url() ?>nilaikriteria/form/edit/<?php echo $row->id ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a> 
                                   
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