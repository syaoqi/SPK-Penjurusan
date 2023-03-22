<html><head>
    <title>Laporan Penerimaan Bantuan</title>
    
    <style type="text/css">
        #tabel_ttd td{padding:0;}
        body {
            font-family: "Times New Roman" ;
            font-size: 12px;
            /* border: 1px solid; */
            padding: 0px 20px;
        }

        h2 {
            font-family: "Times New Roman" ;
            font-size: 12px;
            text-align: center;
            margin-bottom: 10px;
        }
        h3{
            text-align: left;
            margin-bottom: 10px;
        }

        td {
            height:25px;
            text-align: center;
        }

        .isi_form {
            width: 100%;
            font-size: 11px;
        }

        .isi_form td {
            text-align: left;
            vertical-align: top;
        }

        .tebal {
            font-weight: bold;
        }

        .atas {
            border: none;
            border-left: 1px solid;
            border-right: 1px solid;
            border-bottom: 1px solid;
        }

        .samping {
            border: none;
            border-left: 1px solid;
            border-right: 1px solid;
        }

        .bawah {
            border: none;
            border-left: 1px solid;
            border-right: 1px solid;
            border-top: 1px solid;
        }

        .semua {
            border: 1px solid;
        }

        table {
            margin-bottom: 15px;
            font-size: 10px;
        }
        .zebra-table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        }
        .zebra-table th,.zebra-table td{
        vertical-align: top;
        padding:6px 6px;
        text-align: left;
        margin:0;
        }
        


    </style>
    
    
</head><body>
    
<h2 style='text-align:center;' ><b><?php echo strtoupper("PEMERINTAH KABUPATEN LOMBOK TIMUR") ?></b></h2>
    <h4 style='text-align:center;' ><?php echo strtoupper("DAFTAR CALON SISWA/I BARU SMA NEGERI 3 SELONG") ?></h4>

    <table class="zebra-table" border="1"> 
        <thead> 
            <tr style="background-color: #FF4CE4;"> 
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
    
    <h4 style='text-align:center;' ><?php echo ("Mengetahui") ?></h4>
    <br><br><br>
    <h4 style='text-align:center; text-decoration: underline;' ><?php echo ("H. SAMSUL MUJTAHID, S.Pd") ?></h4>
    <h4 style='text-align:center;' ><?php echo ("(Kepala Sekolah SMA Negeri 3 Selong)") ?></h4>
 </body></html>