<?php

header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename='downloaded.pdf'");

// The PDF source is in original.pdf
readfile("original.pdf");
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
                                



            <table id="tablesurat" >
							<thead id="tablesurat">
                                <tr>
                                <th id="t" colspan="7">Surat Tugas</th>
                                </tr>
								<tr id="t" id="tr">
								<th id="t">No</th>
                                <th id="t">Nomor Surat</th>
                                <th id="t">Tanggal Surat</th>
                                <th id="t">Bulan Bayar</th>
                                <th id="t">Keterangant</th>
                                <th id="t">Perihal</th>
								</tr>
							</thead>
							<tbody id="tablesurat">
                            <?php 
                            $no = 1;
                            foreach ($surattugas as $s){
                            ?>
                            <tr id="t">
                                <td id="t"><?php echo $no++?></td>
                                <td id="t"><?php echo $s->Nomor_Surat ?></td>
                                <td id="t"><?php echo date("d/m/Y", strtotime($s->Tanggal_Surat));?></td>
                                <td id="t"><?php echo $s->Bulan_Bayar ?></td>
                                <td id="t"><?php echo $s->Keterangan ?></td>
                                <td id="t"><?php echo $s->Perihal ?></td>
                            </tr>
								
                            <?php }?>
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
