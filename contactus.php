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
            <div class="span1">
              
            </div>

<?php
if(isset($_POST['kirim'])){
    $tanggal=date('Y-m-d H:i:s');
    $nama=$_POST['nama'];
    $email=$_POST['email'];
    $subjek=$_POST['subjek'];
    $pesan=$_POST['pesan'];
    $query=mysql_query("INSERT INTO `pesan_masuk` values('','$tanggal','$nama','$email','$subjek','$pesan','0')")or die (mysql_error());
  if ($query){
   echo '<p class="alert alert-success span10">Terima kasih atas pesan yang Anda kirimkan</p>';
}
else {
    echo '<p class="alert alert-error span10">Ada kesalahan</p>';
}

}

?>

<style>
    label{float:left;width:100px;}
</style>

<div class="span10">
    

    <h3> Kontak Kami </h3><hr>
    Jika ada pertanyaan, saran atau kritik dan infromasi lain silahkan menghubungi kami melalui form dibawah ini, Terima kasih.
<form action="contactus.php?contactus" method="POST" class="form-inline" style="margin-top:30px;">
    <label> Nama : </label> <input type="text" name="nama">
    <br><br>
    <label> Email : </label> <input type="text" name="email">
    <br><br>
    <label> Subjek : </label> <input type="text" name="subjek">
    <br><br>
    <label> Pesan : </label> <textarea name="pesan"></textarea>
    <br><br>
    <button type="submit" class="btn btn-primary" name="kirim">kirim</button>
</form>
</div>
    

     
<?php
include_once 'footer.php';
?>