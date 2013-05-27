<?php
session_start();
if(!isset($_SESSION['username'],$_SESSION['password'])){
	echo "<script language='javascript'>document.location.href='error.php?error=1'</script>";
}
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$toDay=date('Y-m-d');
$firstMonth=date('Y-m-01');
$firstYear=date('Y-01-01');
$username=$_SESSION['username'];
$password=$_SESSION['password'];
if(!isset($_POST['laporan'])){
	$laporan='Harian';
} else{
	$laporan=$_POST['laporan'];
}
?>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Tab- Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel='stylesheet' id='prettyphoto-css'  href="css/prettyPhoto.css" type='text/css' media='all'>
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">  
        <![endif]-->
    <!-- Google Web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/faviconn.ico">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
        </script>
    </head>
	<body>
	
	<?php
	$queryId=mysql_query("SELECT id_user FROM user WHERE nama='$username' AND password='$password'");
	$rowId=mysql_fetch_array($queryId);
	$id_user=$rowId['id_user'];
	$queryTab=mysql_query("SELECT * FROM tabungan WHERE id_user='$id_user'");
	$cekJumlah=mysql_num_rows($queryTab);
	if($cekJumlah=='0'){
		$querySetTabZero=mysql_query("INSERT INTO tabungan (id_user, data, nominal, debit_kredit, total, tanggal) VALUE('$id_user','-','0','-','0','$toDay')");
		echo "<script language='javascript'>alert('Selamat bergabung dengan kami ^_^')</script>"; 
		echo "<script language='javascript'>document.location.href='home.php'</script>"; 
	} else{
		$queryTab2=mysql_query("SELECT * FROM tabungan WHERE id_user='$id_user' ORDER BY id_tab DESC LIMIT 0,1");
		$rowTab2=mysql_fetch_array($queryTab2);
	?>
	
			<?
			if($laporan=='Harian'){
				$queryLap=mysql_query("SELECT data, nominal, debit_kredit, total, tanggal FROM tabungan WHERE id_user='$id_user' AND tanggal='$toDay' ORDER BY id_tab DESC");
				echo "Harian <br>";
			} else if($laporan=='Bulanan'){
				$queryLap=mysql_query("SELECT data, nominal, debit_kredit, total, tanggal FROM tabungan WHERE id_user='$id_user' AND tanggal BETWEEN '$firstMonth' AND '$toDay' ORDER BY id_tab DESC");
				echo "Bulanan <br>";
			} else if($laporan=='Tahunan'){
				$queryLap=mysql_query("SELECT data, nominal, debit_kredit, total, tanggal FROM tabungan WHERE id_user='$id_user' AND tanggal BETWEEN '$firstYear' AND '$toDay' ORDER BY id_tab DESC");
				echo "Tahunan <br>";
			} else if($laporan=='Semua'){
				$queryLap=mysql_query("SELECT data, nominal, debit_kredit, total, tanggal FROM tabungan WHERE id_user='$id_user' ORDER BY id_tab DESC");
				echo "Semua <br>";
			} else{

			}
			?>
			
			
			
	<?php
	}
	?>

    
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand">
                <a href="#top"> Hai <?php print($username);?></a></h1>
           
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a title="portfolio" href="#portfolio">Notes</a></li>
                 <li><a title="team" href="#team">Profil</a></li>
                <li><a title="services" href="#services">Mulai</a></li>
                <li><a title="logout" href="logout.php">Logout</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->
    <div id="headerwrap">
      <header class="clearfix">
        <h1><span>TAB ONLINE</span></h1>
        <div class="container">
          <div class="row">
            <div class="span12">
              <h2>Selamat datang di Tab Online <br>pastikan catat uang Anda untuk segala keperluan</h2>
            </div>
          </div>
          <div class="row">
            <div class="span12">
              <ul class="icon">
                <li><a href="#" target="_blank"><i class="icon-pinterest-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-facebook-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-twitter-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-gplus-circled"></i></a></li>
                <li><a href="#" target="_blank"><i class="icon-skype-circled"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>
    </div>
    <!--******************** Feature ********************-->
  
    <hr>
    <!--******************** Portfolio Section ********************-->
    <section id="portfolio" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-desktop-circled"></i></div>
        <h1 id="folio-headline">Notes..</h1>
        <div class="row">
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-01.jpg" rel="prettyPhoto"><img src="img/transaksi-01.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Baju</h2>
               
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-02.jpg" rel="prettyPhoto"><img src="img/transaksi-02.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Mobil</h2>
               
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-03.jpg" rel="prettyPhoto"><img src="img/transaksi-03.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Handphone</h2>
                
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
        </div>
        <!-- /.row -->
        
        <div class="row">
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-04.jpg" rel="prettyPhoto"><img src="img/transaksi-04.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Motor</h2>
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-05.jpg" rel="prettyPhoto"><img src="img/transaksi-05.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Pusat Perbelanjaan</h2>
               
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
          <div class="span4">
            <div class="mask2"> <a href="img/transaksi-06.jpg" rel="prettyPhoto"><img src="img/transaksi-06.jpg" alt=""></a> </div>
            <div class="inside">
              <hgroup>
                <h2>Transaksi Pasar</h2>
              </hgroup>
              <div class="entry-content">
                <p></p>
                <a class="more-link" href="#"></a> </div>
            </div>
            <!-- /.inside -->
          </div>
          <!-- /.span4 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <hr>
    <!--******************** Team Section ********************-->
    <section id="team" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-group-circled"></i></div>
        <h1>Tujuan Tab Online</h1>
        <!-- Five columns -->
        <div class="row">
          <div class="span2 offset1">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/debit1.png" alt=""> </div>
            <h3>Debit</h3>
            <div class="job-position">uang masuk</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/credit2.png" alt=""> </div>
            <h3>Kredit</h3>
            <div class="job-position">uang keluar</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/saldo.png" alt=""> </div>
            <h3>Saldo</h3>
            <div class="job-position">total saldo</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/sim-icon.png" alt=""> </div>
            <h3>Laporan</h3>
            <div class="job-position">laporan</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/warning-icon.png" alt=""> </div>
            <h3>Warning</h3>
            <div class="job-position">data salah</div>
          </div>
          <!-- ./span2 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="span10 offset1">
            <hr class="featurette-divider">
            <div class="featurette">
              <h2 class="featurette-heading">Tab online<span class="muted">| Tabungan Online</span></h2>
              <p>Sistem yang memberikan kemudahan khususnya pecatatan data pemasukan atau pun pengeluaran Anda sehari-hari</p>
              <p>Target sistem untuk kehidupan rumah tangga, mahasiswa, dan perorangan yg selalu bertransaksi ketika sedang berpergian dan melaksanakan jual beli</p>
              <p>Pastikan catat keperluan Anda dengan benar, agar Anda mendapatkan data laporan secara akurat</p>
            </div>
            <!-- /.featurette -->
            <hr class="featurette-divider">
          </div>
          <!-- .span10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!--******************** Contact Section ********************-->
    
    <hr>
     <section id="services" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-cog-circled"></i></div>
        <h1>Mulai</h1>
        <!-- Four columns -->
        <div class="row">
         
          <!-- /.span3 -->
          <div class="span3">
            <div class="align"> <i class="icon-basket sev_icon"></i> </div>
            <h2>DEBIT</h2>
            <? $queryTabDebit=mysql_query("SELECT * FROM tabungan WHERE id_user='$id_user' AND debit_kredit='debit'");?>
			Jumlah Debit=<? echo mysql_num_rows($queryTabDebit);?>
			<form action="input_debit.php" method="post" align="center">
                            <input class="span3" type="text" name="jum_debit" placeholder="Nominal">
                            <input class="span3" type="text" name="ket_debit" placeholder="Keterangan">
				<input type="submit" value="PROSES" name="debit" class="cform-submit">	
			</form>
          </div>
          <!-- /.span3 -->
          <div class="span3">
            <div class="align"> <i class="icon-basket sev_icon"></i> </div>
            <h2>KREDIT</h2>
            <? $queryTabKredit=mysql_query("SELECT * FROM tabungan WHERE id_user='$id_user' AND debit_kredit='kredit'");?>
			Jumlah Kredit=<? echo mysql_num_rows($queryTabKredit);?>
			<form action="input_kredit.php" method="post" align="center">
                            <input class="span3" type="text" name="jum_kredit" placeholder="Nominal">
                            <input class="span3" type="text" name="ket_kredit" placeholder="Keterangan">
			<input type="submit" value="PROSES" name="kredit" class="cform-submit">	
			</form>
          </div>
          <!-- /.span3 -->
		   <div class="span6">
            <div class="align"> <i class="icon-desktop sev_icon"></i> </div>
            <h2>SALDO</h2>
             <form action="index.php" method="post">
				Opsi tampilan
				<select name="laporan">
					<option value="Harian">Harian</option>
					<option value="Bulanan">Bulanan</option>
					<option value="Tahunan">Tahunan</option>
					<option value="Semua">Semua</option>
				</select>
				<button type="submit" name="pilih">Pilih</button>
			</form>
            <table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td>No</td>
						<td>Tanggal</td>
						<td>Transaksi</td>
						<td>Nominal</td>
						<td>Keterangan</td>
						<td>Total</td>
					</tr>
				</thead>
				<tbody>
					<? $i=1;
					while($rowLap=mysql_fetch_array($queryLap)){ ?>
					<tr>
						<td><? echo $i;?></td>
						<td><? echo $rowLap['tanggal'];?></td>
						<td><? echo $rowLap['debit_kredit'];?></td>
						<td>Rp <? echo $rowLap['nominal'];?></td>
						<td><? echo $rowLap['data'];?></td>
						<td>Rp <? echo $rowLap['total'];?></td>
					</tr>
					<? 
					$i++;
					} ?>
				</tbody>
			</table>
            
			Total Saldo=<? echo $rowTab2['total'];?>
	
          </div>
        <!-- /.row -->
     </div>
      <!-- /.container -->
    </section>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
            <a href=""><small>&copy; 2013 R Yosi Nurrahman</small>
        </footer>
      </div>
      <!-- ./container -->
    </div>
    <!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    </body>
    </html>
