<?php
include_once 'header.php';
$result = mysql_query("SELECT `ID`,`nama_perusahaan` FROM `spesifikasi`");
$nama_perusahaan='[';
while ($rawdata = mysql_fetch_assoc($result)){
    $nama_perusahaan.="'".$rawdata['nama_perusahaan']."',";
}
$nama_perusahaan .=']';
?>


 <!--input banding-->
 <div class="span10">
     <h3> Membandingkan Profesi Kerja </h3><hr>
 <form action="compare.php?compare" method="POST" class="form-inline pull-right">
   
</form>
 <div class="clearfix"></div>

 
<!--tampilah hp yang di compare-->
<?php
if (isset ($_POST['banding'])){
    $versi_compare1 = $_POST['compare1'];
    $versi_compare2 = $_POST['compare2'];
    $sql1 = "SELECT * FROM `spesifikasi` WHERE `nama_perusahaan` = '$versi_compare1'";
    $sql2 = "SELECT * FROM `spesifikasi` WHERE `nama_perusahaan` = '$versi_compare2'";
    $result1 = mysql_query($sql1);
    $result2 = mysql_query($sql2);
    $data1 = mysql_fetch_assoc($result1);
    $data2 = mysql_fetch_assoc($result2);
?>
<!--   tampilan hp yang di compare-->

<div class="span12">
    
        <?php
        echo '<table class="table table-bordered">';
        echo '<tr><td width="20%"></td><td width="40%"><h5>'.$data1['nama_profesi'].'</h5></td>
            <td width="60%"><h5>'.$data2['nama_profesi'].'</h5></td></tr>';
        echo '<tr><td></td><td><img src="img/upload/'.$data1['gambar'].'" style="width:70px; height:110px;"></td>
                  <td><img src="img/upload/'.$data2['gambar'].'" style="width:70px; height:110px;"></td>';
        echo '</tr>';
        echo '<tr>
            <td>'.'Perusahaan  </td><td>'.($data1['nama_perusahaan']).'</td>
            <td>'.($data2['nama_perusahaan']).'</td></tr>';
        echo '<tr>
            <td>'.'Lokasi  </td><td>'.($data1['lokasi']).'</td>
            <td>'.($data2['lokasi']).'</td></tr>';
        echo '<tr>
            <td>'.'Alamat  </td><td>'.($data1['alamat']).'</td>
            <td>'.($data2['alamat']).'</td></tr>';
        echo '<tr>
            <td>'.'Gaji  </td><td>'.($data1['gaji']).'</td>
            <td>'.($data2['gaji']).'</td></tr>';
        echo '<tr>
            <td>'.'Tipe Pekerjaan  </td><td>'.($data1['tipe_pekerjaan']).'</td>
            <td>'.($data2['tipe_pekerjaan']).'</td></tr>';
        echo '<tr>
            <td>'.'Jenis Pegawai </td><td>'.($data1['tipe_pegawai']).'</td>
            <td>'.($data2['tipe_pegawai']).'</td></tr>';
        echo '<tr>
            <td>'.'Level Karier  </td><td>'.($data1['level_karier']).'</td>
            <td>'.($data2['level_karier']).'</td></tr>';
        echo '<tr>
            <td>'.'Kualifikasi  </td><td>'.($data1['kualifikasi']).'</td>
            <td>'.($data2['kualifikasi']).'</td></tr>';
        
        echo '<tr>
            <td>'.'Jumlah Peminat  </td><td>'.($data1['banyak_peminat']).'</td>
            <td>'.($data2['banyak_peminat']).'</td></tr>';
        echo '<tr>
            <td>'.'IPK  </td><td>'.($data1['ipk']).'</td>
            <td>'.($data2['ipk']).'</td></tr>';
        echo '<tr>
            <td>'.'Usia  </td><td>'.($data1['usia']).'</td>
            <td>'.($data2['usia']).'</td></tr>';
        echo '<tr><td> Persyaratan </td><td>';
    echo '<p>'.$data1['syarat_1'].'</p>';
    echo '<p>'.$data1['syarat_2'].'</p>';
    echo '<p>'.$data1['syarat_3'].'</p>';
    echo '</td><td>
            <p>'.$data2['syarat_1'].'</p>
            <p>'.$data2['syarat_2'].'</p>
            <p>'.$data2['syarat_3'].'</p>
    </td></tr>'; 
    echo '</table>';
        ?>
</div>

<?php
}
?>
 </div>

<script>
    var hp = <?php echo $hp;?>;
    $('#compare1').typeahead({source:hp});
    $('#compare2').typeahead({source:hp});
       
    function please_login(){
        var login=<?php echo isset($_SESSION['login'])?1:0;?>;
        if (login != 1){
            //alert('Silahkan Login Terlebih Dahulu');
            var confirmModal = $('<div class="modal hide fade">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
            '<h3>Konfirmasi Login</h3></div>'+
            '<div class="modal-body"><p>Silahkan Login Terlebih Dahulu</p></div>'+
            '<div class="modal-footer"><a href="#" class="btn" data-dismiss="modal">OK</a>'+
           '</div></div>');
        confirmModal.find("#okButton").click(function(event){
            confirmModal.modal('hide');
            
        });
        confirmModal.modal('show');  
        }
    }
</script>   
<?php
include_once 'footer.php';
?>

