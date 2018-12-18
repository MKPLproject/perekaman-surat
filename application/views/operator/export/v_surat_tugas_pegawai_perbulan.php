<?php
header('Content-Transfer-Encoding: binary');
header("Content-Type: application/octet-stream"); 
header("Content-Transfer-Encoding: binary"); 
header('Expires: '.gmdate('D, d M Y H:i:s').' GMT'); 
header('Content-Disposition: attachment; filename = "Export Rincian Rekap Surat Pegawai.xls"'); 
header('Pragma: no-cache'); 


?>
<!doctype html>
<html lang="en">

<head>
	<title>FEB</title>
	<meta charset="utf-8">
	
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	
</head>

<body>
<style>

body{
	
	font-family: 'Roboto', sans-serif;
}
#header{
 text-align: center;
}

table {
    border-collapse: collapse;
}

table, th, td {
}


#t {
    border: 0.5px solid black;
}

#tr {
	text-align:center;
}

#bio{
    border: 0px;
}
</style>

 <!-- ============ MODAL EDIT BARANG =============== -->
 <?php 
                                         

	foreach($detail_st as $i):
            $NIP=$i->NIP;
            $Nama=$i->Nama;
            $bulan = substr($i->Tanggal_Surat,5,-3);
			$tanggal = substr($i->Tanggal_Surat,0,4);
            if ($bulan == 01){
                $periode = "Januari - ".$tanggal;
                
            } else if ($bulan == 02){
                
                $periode = "Februari - ".$tanggal;
            } else if ($bulan == 03){
                
                $periode = "Maret - ".$tanggal;
            } else if ($bulan == 04){
                
                $periode = "April - ".$tanggal;
            } else if ($bulan == 05){
                
                $periode = "Mei - ".$tanggal;
            } else if ($bulan == 06){
                
                $periode = "Juni - ".$tanggal;
            } else if ($bulan == 07){
                
                $periode = "Juli - ".$tanggal;
            } else if ($bulan == 08){
                
                $periode = "Agustus - ".$tanggal;
            } else if ($bulan == 09){
                
                $periode = "September - ".$tanggal;
            } else if ($bulan == 10){
                
                $periode = "Oktober - ".$tanggal;
            } else if ($bulan == 11){
                
                $periode = "November - ".$tanggal;
            } else if ($bulan == 12){
                
                $periode = "Desember - ".$tanggal;
            } else {
                $periode = "Bulan Tidak ditemukan!!!";
            }
        ?>


    <?php endforeach;?>
        
	<h3 id="header">Rincian Rekap Surat Tugas [<?php echo $periode;?>]</h3><br>
	<table id="bio" class="">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>: <?php echo $Nama?></td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>: <?php echo $NIP?></td>
                    </tr>
                    <tr>
                        <td>Status </td>
                        <td >: <?php echo $i->Status ?> </td>
                    </tr>
                    
                    <tr>
                        <td>Pangkat </td>
                        <td >: <?php echo $i->Pangkat?></td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td >: <?php echo $i->Bagian ?> </td>
                    </tr>
                    <tr>
                        <td>Sub Bagian </td>
                        <td >: <?php echo $i->Sub_Bagian ?> </td>
                    </tr>
                    
                    <tr>
                        <td>Urusan </td>
                        <td >: <?php echo $i->Urusan ?> </td>
                    </tr>
                </tbody>
            </table><br>
            <table id="tablesurat" >
							<thead id="tablesurat">
								<tr id="t" id="tr">
								<th id="t">No</th>
                                <th id="t">Nomor Surat</th>
                                <th id="t">Perihal</th>
                                <th id="t">Tanggal Surat</th>
                                <th id="t">Jabatan</th>
								</tr>
							</thead>
							<tbody id="tablesurat">
                            <?php 
                            $no = 1;
                            foreach ($detail_st as $s){
                                $date =  $s->Tanggal_Surat;
                                $bln=substr($date,5,-3);
                                if($bulan == $bln){
                                    
                            ?>
                            <tr id="t">
                                <td id="t"><?php echo $no++?></td>
                                <td id="t"><?php echo $s->Nomor_Surat ?></td>
                                <td id="t"><?php echo $s->Perihal ?></td>
                                <td id="t"><?php echo date("d/m/Y", strtotime($date));?></td>
                                <td id="t"><?php echo $s->Jabatan ?></td>
                            </tr>
								
                            <?php }} ?>
							</tbody>
							<tfoot id="tablesurat">
								<tr id="t">
                                <th id="t" colspan="4">Total Surat Tugas</th>
                                <th id="t"><?php echo $no-1?></th>
								</tr>
							</tfoot>
						</table>
    <!--END MODAL ADD BARANG-->
   


</body>

</html>
