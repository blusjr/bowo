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
<script type="text/javascript" src="js/jquery.carouFredSel-5.5.0-packed.js"></script> 

<script>
$(document).ready(function(){
    $("#rp-carousel").carouFredSel({
	circular: false,
    infinite: false,
    auto    : false,
    width		: 480,
    height		: 213,
    scroll		: {
    	items		: 2,
    	duration    : 500
    },
	prev    : {
        button  : "#rp-carousel_prev",
        key     : "left"
    },
    next    : {
        button  : "#rp-carousel_next",
        key     : "right"
    }
	});
});
</script>

        <title>SPK Pemilihan Profesi Kerja</title>
    </head>
    <body>
        
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="navbar-inner">
            <div class="nav-collapse">
                <ul class="nav">
                <li><a  href="index.php" style="color: #99cc33;">Home</a></li>
                <li><a  href="spk.php" style="color: #99cc33;">Pemilihan</a></li>
                <!--<li><a  href="filter.php" style="color: #99cc33;">Filter</a></li>-->
                <li><a  href="artikel.php" style="color: #99cc33;">Headline News</a></li>
               <li><a  href="bantuan.php" style="color: #99cc33;">Bantuan</a></li>
                <li><a  href="contactus.php" style="color: #99cc33;">Pesan</a></li>
            </ul>
              
               
           
            </div>
            </div> <!-- navbar-inner -->
            </div><!-- navbar fixed top -->
            <div class="hero-unit">
            <h1> Selamat Datang </h1>
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

      <!---->  
        <div class="span10">
            <!-- START CAROUSEL -->
<div id="myCarousel" class="carousel slide span11" style="margin-left:50px" align="center">
     <ol class="carousel-indicators">
         <?php
         $query1 = "SELECT* FROM banners WHERE status='active'";
         $result1=  mysql_query($query1);
         $total = mysql_num_rows($result1);
         for($j=0;$j<$total;$j++){
             ?>
         
         <li data-target="#myCarousel" data-slide-to="<?php echo $j?>" <?php echo ($j==0)?'class="active"':'' ?>></li>
         <?php } ?>
     </ol>
    <div class="carousel-inner">
        <?php
        $query = "SELECT * FROM banners WHERE status='active'";
        $result = mysql_query($query);
        $i=0;
        while($data = mysql_fetch_assoc($result)){
        ?>
        <div class="item <?php echo (($i == 0 )? 'active':'') ?>">
            <img src="img/upload/<?php echo $data['image']?>" alt="" height="500px">
            <div class="carousel-caption">
                <h4><?php echo $data['title']?></h4>
                <p><?php echo $data['description']?></p>
            </div>
        </div>
            <?php $i++; } ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
            
<!-- END CAROUSEL-->

            <div class="clearfix"></div>
            
                     <!-- ****************************************************************************** -->
                  
              </div>
        </div>
   <?php
            $result = mysql_query("SELECT `ID`,`nama_profesi` FROM `spesifikasi`");
$hp='[';
while ($rawdata = mysql_fetch_assoc($result)){
    $hp.="'".$rawdata['nama_profesi']."',";
}
$hp .=']';
            ?>

            
        <?php include_once 'footer.php';?>
    
