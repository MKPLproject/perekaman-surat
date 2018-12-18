<?php
header('Content-Transfer-Encoding: binary');
header("Content-Type: application/octet-stream"); 
header("Content-Transfer-Encoding: binary"); 
header('Expires: '.gmdate('D, d M Y H:i:s').' GMT'); 
header('Content-Disposition: attachment; filename = "Export '.date("Y-m-d").'.xls"'); 
header('Pragma: no-cache'); 


?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<style>
table, th { border: 0.5px solid #000; 
    text-align: center;}  

</style>
<table class="ExcelTable2007">
							<thead>
                            <tr>
                                <td colspan="7"><h4>Data Surat Tugas</h4></td>
                            </tr>
								<tr>
									<th>No </th>
									<th>No Surat</th>
									<th>Tgl Surat</th>
									<th>Bulan Bayar</th>
									<th>Keterangan</th>
									<th>Perihal</th>
									<th>Ket</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$no = 1;
								foreach($surattugas as $u){ 
								$noSurat = $u->Nomor_Surat;
								?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $u->Nomor_Surat ?></td>
								<td id="date"><?php $date =  $u->Tanggal_Surat; 
										  echo date("d-m-Y", strtotime($date))?></td>
								<td><?php echo $u->Bulan_Bayar ?></td>
								<td><?php echo $u->Keterangan ?></td>
								<td><?php echo $u->Perihal?></td>
								<td><?php echo $u->Ket ?></td>
                               
							</tr>
							<?php } ?>
								
							</tbody>
                            <tfoot>
								<tr>
									<th>No </th>
									<th>No Surat</th>
									<th>Tgl Surat</th>
									<th>Bulan Bayar</th>
									<th>Keterangan</th>
									<th>Perihal</th>
									<th>Ket</th>
								</tr>
							</tfoot>
						</table>