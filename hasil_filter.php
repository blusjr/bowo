<?php
include_once 'koneksi.php';
include_once 'header.php';

$where = '';
if(isset($_POST['nama_profesi']) && ($_POST['nama_profesi'] != 'NULL')){
    $where .= "nama_profesi = '".$_POST['nama_profesi']."' AND ";
}
if(isset($_POST['nama_perusahaan']) && ($_POST['nama_perusahaan'] != 'NULL')){
    $where .= "nama_perusahaan = '".$_POST['nama_perusahaan']."' AND ";
}        
if(isset($_POST['sim']) && ($_POST['sim'] != 'NULL')){
    $where .= "sim = '".$_POST['sim']."' AND ";
}
if(isset($_POST['internal']) && ($_POST['internal'] != 'NULL')){
    $where .= "internal = '".$_POST['internal']."' AND ";
}
if(isset($_POST['ram']) && ($_POST['ram'] != 'NULL')){
    $where .= "ram = '".$_POST['ram']."' AND ";
}
if(isset($_POST['primer']) && ($_POST['primer'] != 'NULL')){
    $where .= "primer = '".$_POST['primer']."' AND ";
}
if(isset($_POST['sekunder']) && ($_POST['sekunder'] != 'NULL')){
    $where .= "sekunder = '".$_POST['sekunder']."' AND ";
}
if(isset($_POST['os_nama']) && ($_POST['os_nama'] != 'NULL')){
    $where .= "os_nama = '".$_POST['os_nama']."' AND ";
}
if(isset($_POST['cpu_core']) && ($_POST['cpu_core'] != 'NULL')){
    $where .= "cpu_core = '".$_POST['cpu_core']."' AND ";
}
if(isset($_POST['cpu_core']) && ($_POST['cpu_core'] != 'NULL')){
    $where .= "cpu_core = '".$_POST['cpu_core']."' AND ";
}
if(isset($_POST['kapasitas_cpu']) && ($_POST['kapasitas_cpu'] != 'NULL')){
    $where .= "kapasitas_cpu = '".$_POST['kapasitas_cpu']."' AND ";
}
if(isset($_POST['gpu']) && ($_POST['gpu'] != 'NULL')){
    $where .= "gpu = '".$_POST['gpu']."'AND ";
}
if(isset($_POST['kapasitas_baterai']) && ($_POST['kapasitas_baterai'] != 'NULL')){
    $where .= "kapasitas_baterai = '".$_POST['kapasitas_baterai']."' AND ";
}
if(isset($_POST['ukuran_layar']) && ($_POST['ukuran_layar'] != 'NULL')){
    $where .= "ukuran_layar = '".$_POST['ukuran_layar']."' AND ";
}

$where = trim($where, " AND ");

$sql1 = "SELECT * FROM hp WHERE $where";
$result = mysql_query($sql1);
$hasil = array();

?>

<div class="span10">
     <h3>Hasil Rekomendasi Pemilihan Profesi Kerja</h3><hr>
<form action="compare.php?compare" method="POST" class="form-inline pull-right">
<input type="text" name="compare1" id="compare1" autocomplete="off" placeholder="Profesi Kerja 1...">
<input type="text" name="compare2" id="compare2" autocomplete="off" placeholder="Profesi Kerja 2...">
<button class="btn btn primary" name="banding"> Bandingkan </button>
</form>
<table class="table table-bordered">
    <thead>
   
    <th>Nama</th>
    <th>Pilih untuk perbandingan</th>
    </thead>
    <tbody>
        
    
    <?php
    while ($data = mysql_fetch_assoc($result)){
           
            echo '<tr>
            <td><a href="spesifikasi.php?spesifikasi='.$data['id_profesi'].'">'.$data['nama_perusahaan'].'</a></td>
                <td><a class="btn" onclick="set_compare(\''.$data['nama_perusahaan'].'\')">Pilih</a>
                </td>
                
            </tr>';
        
    }
    ?>
    </tbody>
</table>
</div>
<script>
function set_compare(nama_perusahaan){
    var comp1 = $("#compare1").val();
    var comp2 = $("#compare2").val();
    
    if(comp1 == ''){
        $("#compare1").val(nama_perusahaan);
    }
    else{
        $("#compare2").val(nama_perusahaan);
    }
}
</script>
<?php
include_once 'footer.php';
?>
