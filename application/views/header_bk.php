<!DOCTYPE html> 
<html lang="en"> 
    <head> <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=""> <meta name="author" content="FaberNainggolan"> 
        <title><?php  echo $title; ?></title> 
        <!-- Bootstrap core CSS --> 
        <link href="<?php echo base_url()?>Asset/Css/bootstrap.css" rel="stylesheet"> 
        <!-- Custom styles for this template --> 
        <link href="<?php echo base_url()?>Asset/Css/top-fixed-navbar.css" rel="stylesheet"> 
        <script src="<?php echo base_url()?>Asset/Js/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="<?php echo base_url()?>Asset/Css/jquery.dataTables.min.css">
        <script src="<?php echo base_url()?>Asset/Js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="<?php echo base_url()?>Asset/Js/global.js" type="text/javascript"></script>
        <script>
            $(document).ready( function () {
                $('.myTable').DataTable();
            } );
        </script>
    </head> 

    <body>
        
        <!-- Static navbar --> 
        <nav class="navbar navbar-default navbar-fixed-top navbar-dark bg-primary"> 
            <div class="container">
                <!-- <div class="navbar-header">  -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                    </span> <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
                    <a style="margin-left: 350px; color: black; font-weight:bold;" class= "navbar-brand">SPK PENENTUAN JURUSAN SMA 3 SELONG</a> 
        </div> 
        <div id="navbar" class="navbar-collapse collapse  bg-info"> 
            <ul class="nav navbar-nav"> 

                <li style="margin-left: 50px;"><a href="<?php echo base_url() ?>home"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>  </a></li> 


<li><a href="<?php echo base_url() ?>calonsiswa">Data Siswa</a></li>

<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perhitungan Bobot<span class="caret"></span></a> <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url() ?>kriteria">Kriteria</a></li>
                        <li><a href="<?php echo base_url() ?>nilaikriteria">Nilai Kriteria</a></li>
                        <li><a href="<?php echo base_url() ?>kriteria/perbandingan">Perbandingan Kriteria</a></li> 
                        <li><a href="<?php echo base_url() ?>pembobotan">Pembobotan Kriteria</a></li> 
                    </ul> 
                </li>


                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Perhitungan Alternatif<span class="caret"></span></a> <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url() ?>normalisasidata">Normalisasi</a></li>
                        <li><a href="<?php echo base_url() ?>penentuan">Perkalian Dengan Bobot</a></li>
                        <li><a href="<?php echo base_url() ?>rekomendasi">Rekomendasi Kelas</a></li>
                    </ul> 

                    <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cetak Laporan<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
  <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
  <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
</svg> <span class="caret"></span></a> <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url() ?>laporan">Ipa </a></li>
                <li><a href="<?php echo base_url() ?>laporan/indexips">Ips </a></li>
                    </ul> 
                    


                <li style="margin-left: 450px;"><a href="<?php echo base_url() ?>login/keluar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16"><path d="M7.5 1v7h1V1h-1z"/><path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/></svg></a></li>
        </li>
                
            </ul>
           
        </div>
        <!--/.nav-collapse --> 
    </div> 
</nav> 