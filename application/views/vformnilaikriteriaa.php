<?php $this->load->view('header'); ?> 

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $kriteria1 = "";
    $perbandingan = "";
    $nilai = "";
    $kriteria2 = "";
} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $kriteria1 = $rowdata->kriteria1;
        $perbandingan = $rowdata->perbandingan;
        $kriteria2 = $rowdata->kriteria2;
    }
}
?> 
<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <b>Form nilai perbandingan Kriteria</b>
        </div> 
        <div class="panel-body"> 
            <?php echo $this->session->flashdata('Pesan'); ?> 
            <form action="<?php echo base_url() ?>nilaikriteria/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                    <tr> 
                        <td style="width:15%;">Kriteria Pertama</td> 
                        <td> 
                            <div class="col-sm-2"> 
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                                <input type="text"  name="kriteria1" class="form-control" value="<?php echo $kriteria1; ?>"> 
                            </div> 
                        </td> 
                    </tr> 

                    <tr>
                        <td>Perbandingan</td> 
                        <td> 
                            <div class="col-sm-3"> 
                                <select name="perbandingan" required="requreid" class="form-control"> 
                                    <option></option> 
                                    <option value="1" <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1') {
                                            echo "selected";
                                            
                                            $nilai = 1;
                                        }
                                    }
                                    ?>>1</option> 
                                    <option value="2"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '2') {
                                            echo"selected";
                                            $nilai = 2;
                                        }
                                    }
                                    ?>>2</option> 
                                    <option value="3"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '3') {
                                            echo"selected";
                                            $nilai = 3;
                                        }
                                    }
                                    ?>>3</option>
                                    <option value="4"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '4') {
                                            echo"selected";
                                            $nilai = 4;
                                        }
                                    }
                                    ?>>4</option>
                                    <option value="5"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '5') {
                                            echo"selected";
                                            $nilai = 5;
                                        }
                                    }
                                    ?>>5</option>
                                    <option value="6"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '6') {
                                            echo"selected";
                                            $nilai = 6;
                                        }
                                    }
                                    ?>>6</option>
                                    <option value="7"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '7') {
                                            echo"selected";
                                            $nilai = 7;
                                        }
                                    }
                                    ?>>7</option>
                                    <option value="8"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '8') {
                                            echo"selected";
                                            $nilai = 8;
                                        }
                                    }
                                    ?>>8</option>
                                    <option value="9"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '9') {
                                            echo"selected";
                                            $nilai = 9;
                                        }
                                    }
                                    ?>>9</option>
                                    <option value="1/2"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/2') {
                                            echo"selected";
                                            $nilai = 0.5;
                                        }
                                    }
                                    ?>>1/2</option>
                                    <option value="1/3"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/3') {
                                            echo"selected";
                                            $nilai = 0.333333;
                                        }
                                    }
                                    ?>>1/3</option>
                                    <option value="1/4"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/4') {
                                            echo"selected";
                                            $nilai = 0.25;
                                        }
                                    }
                                    ?>>1/4</option>
                                    <option value="1/5"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/5') {
                                            echo"selected";
                                            $nilai = 0.2;
                                        }
                                    }
                                    ?>>1/5</option>
                                    <option value="1/6"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/6') {
                                            echo"selected";
                                            $nilai = 0.166667;
                                        }
                                    }
                                    ?>>1/6</option>
                                    <option value="1/7"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/7') {
                                            echo"selected";
                                            $nilai = 0.142857;
                                        }
                                    }
                                    ?>>1/7</option>
                                    <option value="1/8"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/8') {
                                            echo"selected";
                                            $nilai = 0.125;
                                        }
                                    }
                                    ?>>1/8</option>
                                    <option value="1/9"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($perbandingan == '1/9') {
                                            echo"selected";
                                            
                                            $nilai = 0.111111;
                                        }
                                    }
                                    ?>>1/9</option>
                                   
                                </select>
                               
                            </div> 
                        </td> 
                    </tr> 

                    <tr> 
                        <td style="width:15%;">Kriteria Kedua</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="text" name="kriteria2" class="form-control"  value="<?php echo $kriteria2; ?>"> 
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