<?php $this->load->view('header'); ?> 

<?php
if ($aksi == 'aksi_add') {
    $id = "";
    $nama = "";
    $peran = "";
    $username="";
    $password="";

} else {
    foreach ($qdata as $rowdata) {
        $id = $rowdata->id;
        $nama = $rowdata->nama;
        $peran = $rowdata->peran;
        $username = $rowdata->username;
        $password = $rowdata->password;
    }
}
?> 
<div class="container"> 
    <!-- Main component for a primary marketing message or call to action --> 
    <div class="panel panel-default"> 
        <div class="panel-heading">
            <b>Form User Aplikasi</b>
        </div> 
        <div class="panel-body"> 
            <?php echo $this->session->flashdata('Pesan'); ?> 
            <form action="<?php echo base_url() ?>user/form/<?php echo $aksi ?>" method="post">
                <table class="table table-striped">
                   
                    <tr> 
                        <td style="width:15%;">Nama </td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>"> 
                            </div> 
                        </td> 
                    </tr> 
                          <td style="width:15%;">Peran</td> 
                        <td> 
                        <div class="col-sm-5"> 
                                <select name="peran" required="requreid" class="form-control"> 
                                    <option></option> 
                                    <option value="Admin" <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($peran == 'Admin') {
                                            echo "selected=selected";
                                        }
                                    }
                                    ?>>Admin</option> 
                                    <option value="bk"  <?php
                                    if ($aksi == "aksi_edit") {
                                        if ($peran == 'bk') {
                                            echo"selected";
                                        }
                                    }
                                    ?>>BK</option>
                                   
                                </select>
                            </div>

                        </td> 
                    </tr> 

                    <tr> 
                        <td style="width:15%;">Username</td> 
                        <td> 
                            <div class="col-sm-2"> 
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>"> 
                                <input type="text"  name="username" class="form-control" value="<?php echo $username; ?>"> 
                            </div> 
                        </td> 
                    </tr> 
                     
                    <tr>
                        <td>Password</td> 
                        <td> 
                            <div class="col-sm-5"> 
                                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
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