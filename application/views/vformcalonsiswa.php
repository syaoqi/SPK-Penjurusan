<?php $this->load->view('header'); ?> 

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $nama = "";
    $jk = "";
    $tgl = "";
    $ps = "";
    $sn = "";
    $bs = "";
    $mk = "";
    $ar = "";
    $nt = "";
    $iq = "";
    
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $nama = $rowdata->nama;
        $jk = $rowdata->jk;
        $tgl = $rowdata->tgl;
        $ps = $rowdata->ps;
        $sn = $rowdata->sn;
        $bs = $rowdata->bs;
        $mk = $rowdata->mk;
        $ar = $rowdata->ar;
        $nt = $rowdata->nt;
        $iq = $rowdata->iq;
    }
}
?> 
<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default">
        <div class="panel-heading">
        <BR> <br> 
           <b>MASUKKAN DATA SISWA</b>
        </div> 
        <div class="panel-body"> 
            <?php echo $this->session->flashdata('Pesan'); ?> 
            <form action="<?php echo base_url() ?>calonsiswa/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped"> 
                    <tr> 
                        <td style="width:15%;">Nama</td> 
                        <td> 
                            <div class="col-sm-6"> 
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
                                <input type="text" name="nama" required class="form-control" value="<?php echo $nama; ?>"> 
                            </div> 
                        </td> 
                    </tr> 
                   

                    <tr>
                        <td>Jenis Klamin</td> 
                        <td> 
                            <div class="col-sm-3"> 
                                <select name="jk" required="requreid" class="form-control"> 
                                    <option></option> 
                                    <option value="Laki-Laki" <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($jk == 'Laki-Laki') {
                                            echo "selected=selected";
                                        }
                                    }
                                    ?>>Laki-Laki</option> 
                                    <option value="Perempuan"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($jk == 'Perempuan') {
                                            echo"selected";
                                        }
                                    }
                                    ?>>Perempuan</option> 
                                   
                                </select>
                            </div> 
                        </td> 
                    </tr>   
                    <tr> 
                        <td>Tanggal Lahir</td> 
                        <td> 
                        <div class="col-sm-6"> 
                                <input type="date" name="tgl" required class="form-control" value="<?php echo $tgl ?>"> 
                            </div>
                        </td> 
                    </tr> 
                    <tr> 
                        <td>IQ</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="iq" required class="form-control" value="<?php echo $iq ?>"> 
                            </div> 
                        </td>
                    </tr> 

                    <tr> 
                        <td>Pribadi Sosial (PS)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="ps" required class="form-control" value="<?php echo $ps ?>"> 
                            </div> 
                        </td>
                    </tr> 
                    <tr> 
                        <td>Minat Natural (NT)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="nt" required class="form-control" value="<?php echo $nt ?>"> 
                            </div> 
                        </td>
                    </tr> 
                    <tr> 
                        <td>Minat Mekanik (MK)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="mk" required class="form-control" value="<?php echo $mk ?>"> 
                            </div> 
                        </td>
                    </tr> 
                    <tr> 
                        <td>Minat Bisnis (BS)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="bs" required class="form-control" value="<?php echo $bs ?>"> 
                            </div> 
                        </td>
                    </tr>
                    <tr> 
                        <td>Minat Seni (AR)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="ar" required class="form-control" value="<?php echo $ar ?>"> 
                            </div> 
                        </td>
                    </tr>  
                    <tr> 
                        <td>Minat Sain (SN)</td> 
                        <td> 
                        <div class="col-sm-2"> 
                               <input type="text" name="sn" required class="form-control" value="<?php echo $sn ?>"> 
                            </div> 
                        </td>
                    </tr> 
                    
     
                    <tr> 
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan"> 
                            <button type="reset" class="btn btn-default">Batal</button> 
                        </td> 
                    </tr> 
                </table> 
            </form> 
        </div> 
    </div> 
    <!-- /panel --> 
</div>
<!-- /container --> 

<?php $this->load->view('footer'); ?> 