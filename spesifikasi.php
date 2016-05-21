<?php
include_once 'header.php';
$id = $_GET['spesifikasi'];
$sql = "SELECT * FROM `spesifikasi` WHERE `id` = '$id'";
$result = mysql_query($sql);
$data = mysql_fetch_assoc($result);
$result = mysql_query("SELECT `ID`,`nama_perusahaan` FROM `spesifikasi`");
$nama_perusahaan='[';
while ($rawdata = mysql_fetch_assoc($result)){
    $nama_perusahaan.="'".$rawdata['nama_perusahaan']."',";
}
$nama_perusahaan .=']';
?>
<div class="span10">
 <div class="clearfix"></div>

 <!--tampilan detail hp pertama-->
 
<?php
if (isset($_POST)){
    echo '<div class="span10">';
    echo '';
    echo '<table class="table table-bordered">';
    echo '<tr><td colspan="2"><h3>'.$data['nama_profesi'].'</td></h3></tr>';
    echo '<tr><td colspan="2"><img src="img/upload/'. $data['gambar'].'"></td></tr>';
}
?>
    
<?php 

echo '<tr><td>'.'Nama Perusahaan  </td><td>'.($data['nama_perusahaan']).'</td></tr>';
echo '<tr><td>'.'Lokasi  </td><td>'.($data['lokasi']).'</td></tr>';
echo '<tr><td>'.'Alamat  </td><td>'.($data['alamat']).'</td></tr>';
echo '<tr><td>'.'Gaji  </td><td>'.($data['gaji']).'</td></tr>';
echo '<tr><td>'.'Tipe Pekerjaan  </td><td>'.($data['tipe_pekerjaan']).'</td></tr>';
echo '<tr><td>'.'Jenis Pegawai  </td><td>'.($data['tipe_pegawai']).'</td></tr>';
echo '<tr><td>'.'Level Karier  </td><td>'.($data['level_karier']).'</td></tr>';
echo '<tr><td>'.'Kualifikasi  </td><td>'.($data['kualifikasi']).'</td></tr>';
echo '<tr><td>'.'IPK  </td><td>'.($data['ipk']).'</td></tr>';
echo '<tr><td>'.'Usia  </td><td>'.($data['usia']).'</td></tr>';
echo '<tr><td> Persyaratan :</td><td>';
    echo '<p>'.$data['syarat_1'].'</p>';
    echo '<p>'.$data['syarat_2'].'</p>';
    echo '<p>'.$data['syarat_3'].'</p>';
    echo '<p>'.$data['syarat_4'].'</p>';
    echo '<p>'.$data['syarat_5'].'</p>';
    echo '<p>'.$data['syarat_6'].'</p>';
    echo '<p>'.$data['syarat_7'].'</p>';
    echo '<p>'.$data['syarat_8'].'</p>';
    echo '<p>'.$data['syarat_9'].'</p>';


   
echo '</table>';

?>

</div>
<?php
include_once 'footer.php';
?>


