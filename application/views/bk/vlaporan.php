<?php $this->load->view('header_bk'); ?> 

<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">  
        <BR> <br> 
     
            <b>CETAK LAPORAN</b>
        </div> 
        <div class="panel-body" > 
            <p><?php echo $this->session->flashdata('Pesan') ?> </p> 
            <form action="<?php echo base_url() ?>laporan/laporanpenentuan" method="post">
            <button style="margin-left: 900px;" type="submit" class="btn btn-success btn-lg">CETAK LAPORAN</button>
            </form> 
            <h1 style='text-align:center;' ><b><?php echo strtoupper("PEMERINTAH KABUPATEN LOMBOK TIMUR") ?></b></h1>
            <h3 style='text-align:center;' ><?php echo strtoupper("DAFTAR CALON SISWA/I BARU SMA NEGERI 3 SELONG") ?></h3>
            <table class="zebra-table" border="1" style='margin-left:300px;'> 
        <thead style='text-align:center; '> 
            <tr style="background-color: #51ff57; text-align:center;"> 
                <th  style='text-align:center; padding: 8px;'>No</th> 
                <th  style='text-align:center; padding: 8px;'>Nama</th>
                <th  style='text-align:center; padding: 8px;'>JK</th> 
                <th  style='text-align:center; padding: 8px;'>Nilai</th>
                <th  style='text-align:center; padding: 8px;'>Peringkat</th>
                <th  style='text-align:center; padding: 8px;'>Kelas</th>
                
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
                        <td  style='text-align:center;'><?php echo $no ?></td>
                         <td style="padding: 8px;"><?php echo $row->nama ?></td> 
                         <td style="padding: 8px;"><?php echo $row->jk ?></td>
                         <td style="padding: 8px;"><?php echo number_format($row->nilai,3) ?></td> 
                         <td style="padding: 8px;"><?php echo $row->pringkat ?></td>
                         <td style="padding: 8px;"><?php echo $row->kelas ?></td>
                              
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