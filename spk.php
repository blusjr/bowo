<?php 
//pemanggilan koneksi.php
include_once 'koneksi.php';
session_start();
?><!DOCTYPE html>
<html>
    <head>
       
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5-0.0.2.css">
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="css/docs.css">
        <link rel="stylesheet" type="text/css" href="css/caroufred.css">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/wysihtml5-0.3.0_rc2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-wysihtml5-0.0.2.min.js"></script>
        <?php
        if (!empty($js)){
            echo $js;
        }
        ?>
       
        <title>SPK Pemilihan Profesi Kerja</title>
    </head>
    <body>
        
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="nav-collapse">
                <ul class="nav">
                <li><a  href="index.php" style="color: #99cc33;">Home</a></li>
                <li><a  href="spk.php" style="color: #99cc33;">Pemilihan</a></li>
                <li><a  href="artikel.php" style="color: #99cc33;">Headline News</a></li>
                <li><a  href="bantuan.php" style="color: #99cc33;">Bantuan</a></li>
                <li><a  href="contactus.php" style="color: #99cc33;">Pesan</a></li>
            </ul>
            </div>
            </div> <!-- navbar-inner -->
            </div><!-- navbar fixed top -->
            <div class="hero-unit">
             <h2> Selamat Datang </h2>
            </div>
     <div class="container">
        <div class="row-fluid">
            <div class="span2">
            </div>

<div class="span10">    
      
<h3>Pemilihan Profesi Kerja</h3><hr>
<h6>Pilihlah kriteria profesi kerja yang kamu inginkan pada form dibawah ini.</h6>
<form action="hasil_spk.php" method="POST" class="form-inline">
    
    <br>
    <table class="table table-bordered">
        <thead> <th> Kategori </th>
        <th>Nilai</th>
       
    </thead>
    <tbody>
        <tr>
            <td>Profesi</td>
            <td>
                <select name="nama_profesi">
                    <option value="0">Pilih</option>
            <?php
            $resnama_profesi = mysql_query("SELECT * FROM nama_profesi WHERE id");
            while($datnama_profesi = mysql_fetch_assoc($resnama_profesi)){
                echo '<option value="'.$datnama_profesi['nama_profesi'].'">'.$datnama_profesi['nama_profesi'].'</option>';
            }
            ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Lokasi kerja</td>
            <td>
                <select name="lokasi">
                    <option value="0">Pilih</option>
            <?php
            $reslokasi = mysql_query("SELECT * FROM lokasi WHERE id_lokasi");
            while($datlokasi = mysql_fetch_assoc($reslokasi)){
                echo '<option value="'.$datlokasi['id_lokasi'].'">'.$datlokasi['lokasi'].'</option>';
            }
            ?>
                </select>
            </td>
        </tr>
        <?php 
        $res = mysql_query("SELECT * FROM kriteria");
        while($data1 = mysql_fetch_assoc($res)){
        ?>
        <tr> <td><?php echo $data1['kriteria']?> </td>
            <td> <select name="<?php echo $data1['field']?>"><option value="0">Pilih</option>
                 <?php 
        $res2 = mysql_query("SELECT * FROM kriteria_atribut WHERE id_kriteria = '".$data1['id_kriteria']."'");
        while($data2 = mysql_fetch_assoc($res2)){
                     echo '<option value="'.$data2['bobot'].'" '. (isset($skala[$data2['field']])?($skala[$data2['field']]==$data2['bobot']? 'selected':''):'').' >'.$data2['atribut'].'</option>';
                 }
                 ?>
                 </select></td>
                
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <button type="submit" name="submit" class="btn btn-primary"> Submit </button>
</form>
</div>
<?php
include_once 'footer.php';
?>