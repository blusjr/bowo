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
                <?php 
                $sql = "SELECT * FROM nama_profesi";
                $result = mysql_query($sql);
                echo '<ul class="nav nav-list bs-docs-sidenav affix">';
                while($data = mysql_fetch_assoc($result)){
                    echo '<li><a href="profesi.php?profesi='.$data['nama_profesi'].'">'.$data['nama_profesi'].'</a></li>';
                }
                echo '</ul>'
                ?>
            </div>
            <?php
            $result = mysql_query("SELECT `ID`,`nama_perusahaan` FROM `spesifikasi`");
            $nama_perusahaan='[';
while ($rawdata = mysql_fetch_assoc($result)){
    $nama_perusahaan.="'".$rawdata['nama_perusahaan']."',";
}
$nama_perusahaan .=']';
?>
<div class="span10">
<?php 
        
/*-------------- Penejelasan Informasi ketika merek hp belum dipilih -----------------------------------------*/
        echo '<h4>PANDUAN MENGGUNAKAN SISTEM : </h4>
              <ul>
              <li>User terlebih dahulu memilih menu Pemilihan</li>
              <li>Selanjutnya user akan dialihkan ke form Pemilihan Profesi Kerja</li>
              <li>Selanjutnya user akan melihat hasil rekomendasi yang dikeluarkan sistem</li>
              <li>Selanjutnya user melakukan perbandingan antar Profesi Kerja</li>
              <li>User menarik kesimpulan terkait Profesi Kerja yang dipilih</li>
              </ul>';
    

?>
 <?php include_once 'footer.php';?>