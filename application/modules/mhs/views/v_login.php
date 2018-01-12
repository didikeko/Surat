
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" />
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistem Informasi Surat UIN Sunan Kalijaga</title>
        
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">		
		<link href="http://static.uin-suka.ac.id/images/favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="http://static.uin-suka.ac.id/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/style_global.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/style_layout.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/docs.css" rel="stylesheet" type="text/css"/>
		<link href="http://surat.uin-suka.ac.id/asset/css/tnde.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro">
		<!--<link href="http://akademik.uin-suka.ac.id/asset/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>-->
		
		<link href="http://static.uin-suka.ac.id/css/breadcrumb.css" rel="stylesheet" type="text/css"/>
		<script>!window.jQuery && document.write(unescape('%3Cscript src="http://surat.uin-suka.ac.id/asset/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
		<!-- custom scrollbars plugin -->
		<script src="http://surat.uin-suka.ac.id/asset/js/jquery.mCustomScrollbar.concat.min.js"></script>
    </head>
    <body>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41754364-2', 'auto');
	  ga('send', 'pageview');

	</script>
	<div class="app_header-top"></div>
	<div class="app_main">
		<div class="app_header">
			<div class="center">
				<div class="app_uin_id">
					<a href="http://surat.uin-suka.ac.id/" ></a>
				</div>
				<div class="app_header_right">
									<style type="text/css">
.searchform {
	display: inline-block;
	zoom: 1; /* ie7 hack for display:inline-block */
	*display: inline;
	padding: 0px 0 0px 3px;
}
.searchform input {
	font: normal 12px/100% Arial, Helvetica, sans-serif;
}
.searchform .searchfield {
	background: #fff;
	padding: 4px 6px 4px 8px;
	width: 202px;
	border: solid 1px #bcbbbb;
	outline: none;
	margin-top:8px;
	height:30px;
	-webkit-border-radius: .3em;
	-moz-border-radius: .3em;
	border-radius: .3em;

	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 30px;
	width: 30px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);
	margin-top:-8px;
	cursor:pointer;	
	-webkit-border-radius: .3em;
	-moz-border-radius: .3em;
	border-radius: .3em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#8fc800), to(#438c00));
	background: -moz-linear-gradient(top,  #8fc800,  #438c00);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#8fc800', endColorstr='#438c00'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#8fc800', endColorstr='#438c00'); /* ie8 */
}
					</style>
					<div style="text-align:right; margin-top:-15px;">
						<div class="app_system_id">Sistem Informasi Surat</div>
						<div>
							<div class="clear5"></div>
							<form class="searchform" action="http://surat.uin-suka.ac.id/page/page/search" method="post">
								<input class="searchfield" type="text" name="cari" value="Kata kunci..." onfocus="if (this.value == 'Kata kunci...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Kata kunci...';}" />
								<button class="searchbutton">Cari</button>
							</form>
						</div>	
					</div>
								</div>
			<div class="clear"></div>
			</div>
		</div>
		<div id="app_content">
			<div class="app-row">		<div class="col-med-3">
			<h2>Login</h2>
			<br>
			<div class="login-form">
				<form method="post" action="<?php echo base_url(); ?>login/aksi_login">		
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus >
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password" >
					</div>
					<button type="submit" class="btn-uin btn btn-inverse btn btn-small" style="float:right;">Login</button><br>
				</form>
			</div>
			<br>
			<div class="login-links">
				<div class="login-link">
				</div>
				<div class="login-link">
					<a class="link-icon monitoring-surat" href="http://surat.uin-suka.ac.id/surat/cek_surat" title="">
					Cek Surat
					</a>
				</div>
			</div>  
		</div>
		<div class="col-med-9">
			<div class="app-blog">
										<h3 class="judul-02" style="margin:0;"><b>
				<a href="http://surat.uin-suka.ac.id/page/liputan/detail/1/tahun-baru-hijriyah" title="Tahun Baru Hijriyah">Tahun Baru Hijriyah</a>
				</b></h3>
				<span class="tgl-post">Selasa, 5 September 2017 06:15:48 WIB <span class="page_counter">Dilihat :  77 kali</span></span>
				<div class="clear5"></div>
									<div style="float:left; width: 320px; margin-top:7px;  margin-right:20px;">
						<img src="http://surat.uin-suka.ac.id/page/liputan/picture/1"  style="width: 320px;">
					</div>
								<div>
					<p>
					Lorem Ipsum Dolor sit Amet
....
						<a href="http://surat.uin-suka.ac.id/page/liputan/detail/1/tahun-baru-hijriyah"><b>(Selengkapnya)</b></a>
					</p>
					<div style="clear:both"></div><br>
				</div>
									  </div>
			  <a class="btn-uin btn btn-inverse btn btn-small" style="float:right" href="http://surat.uin-suka.ac.id/page/liputan"><i class="btn-uin"></i>Lainnya >></a> 
		</div>
	</div>
	<div class="clear20"></div>
	<div class="app-row">
		<div class="col-med-3">
			<div class="dis">
			
				<div class="judul-kolom">
					<a class="rss" href="http://surat.uin-suka.ac.id/page/pengumuman/feed" target="_blank">&nbsp;</a>
					Pengumuman
				</div>
										<div class="list-artikel">
							<ul>
																<li>
									<a href="http://surat.uin-suka.ac.id/page/pengumuman/detail/1/tahun-baru-hijriyah">
										Tahun Baru Hijriyah									</a>		
								</li>		
															</ul>
						</div>
						

						
			</div>	
			<a class="btn-uin btn btn-inverse btn btn-small" style="float:right" href="http://surat.uin-suka.ac.id/page/pengumuman"><i class="btn-uin"></i>Lainnya >></a> 
		</div>
		<div class="col-med-3">
			<div class="dis">
				<div class="judul-kolom">
					<a class="rss" href="http://surat.uin-suka.ac.id/page/berita/feed" target="_blank">&nbsp;</a>
					Berita
				</div>
										<div class="judul-artikel">
							<a href="http://surat.uin-suka.ac.id/page/berita/detail/1/tahun-baru-hijriyah">Tahun Baru Hijriyah</a>
						</div>
						<span class="tgl-post">Selasa, 5 September 2017 06:23:21 WIB</span>
										<img style="width:90px;float:left;margin:15px 7px 7px 0;" src="http://surat.uin-suka.ac.id/page/berita/picture/1" />
									<p class="isi">
						Lorem Ipsum Dolor sit Amet
.... 
						<a href="http://surat.uin-suka.ac.id/page/berita/detail/1/tahun-baru-hijriyah"><b>(Selengkapnya)</b></a>
					</p>	
									
			</div>
			<a class="btn-uin btn btn-inverse btn btn-small" style="float:right" href="http://surat.uin-suka.ac.id/page/berita"><i class="btn-uin"></i>Lainnya >></a> 
		</div>
		<div class="col-med-3">
			<div class="dis">	
				<div class="judul-kolom">
					<a class="rss" href="http://surat.uin-suka.ac.id/page/agenda/feed" target="_blank">&nbsp;</a>
					Agenda
				</div>
				<div id="daftar-event">
					<span class='tgl-post'>Belum ada agenda.</span>	
				
				</div>
			</div>	
			<a class="btn-uin btn btn-inverse btn btn-small" style="float:right" href="http://surat.uin-suka.ac.id/page/agenda"><i class="btn-uin"></i>Lainnya >></a> 
		</div>
		<div class="col-med-3">
			<div class="dis">
				<div class="judul-kolom">
					<a class="rss" href="http://surat.uin-suka.ac.id/page/kolom/feed" target="_blank">&nbsp;</a>
					Kolom
				</div>	
										<div class="judul-artikel">
							<a href="http://surat.uin-suka.ac.id/page/kolom/detail/3/tahun-baru-hijriyah">Tahun Baru Hijriyah</a>
						</div>
						<span class="tgl-post">Selasa, 5 September 2017 06:24:50 WIB</span>
										<img style="width:90px;float:left;margin:15px 7px 7px 0;" src="http://surat.uin-suka.ac.id/page/kolom/picture/3" />
									<p class="isi">
						Lorem Ipsum Dolor sit Amet
.... 
						<a href="http://surat.uin-suka.ac.id/page/kolom/detail/3/tahun-baru-hijriyah"><b>(Selengkapnya)</b></a>
					</p>	
															
			</div>
			<a class="btn-uin btn btn-inverse btn btn-small" style="float:right" href="http://surat.uin-suka.ac.id/page/kolom"><i class="btn-uin"></i>Lainnya >></a> 
		
		</div>
		</div>
	</div>
</div>

			<div class="clear5"></div>
			<div class="footer-underline">
				<div class="center">
					<div class="app-row">
						<div class="col-med-3">
							<a href="http://www.uin-suka.ac.id" target="_blank"><img src="http://static.uin-suka.ac.id/images/logo-white.png" width="210" height="44"/></a>
						</div>
						<div class="col-med-3">
							<div style="float:left" class="alamat">
								Jl. Marsda Adisucipto Yogyakarta 55281<br>
								 Telp. +62-274-512474, +62-274-589621<br>
								 Fax. +62-274-586117 <br>
								 Email. humas@uin-suka.ac.id
							</div>
						</div>
						<div class="col-med-3">
							<div class="sitemap" >
								<a href="">Peta Situs</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">Privasi & Kebijakan</a>
							</div>
						</div>
						<div class="col-med-3">	
							<div class="social-media">
								<a style="margin-left:6px; display:inline;" title="Google Plus"  href="http://gplus.to/uinsk" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/gplus.png" width="30" height="30"/></a>
								<a style="margin-left:7px; display:inline;" title="Facebook"  href="https://www.facebook.com/UINSK" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/facebook.png" width="30" height="30"/></a>
								<a style="margin-left:6px; display:inline;" title="Twitter" href="https://twitter.com/uinsk" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/twitter.png" width="30" height="30"/></a>
								<a style="margin-left:6px; display:inline;" title="Youtube" href="http://www.youtube.com/user/UINSK" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/youtube.png" width="30" height="30"/></a>
								<a style="margin-left:6px; display:inline;" title="Instagram" href="http://www.instagram.com/uinsk" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/instagram.png" width="30" height="30"/></a>
								<a style="margin-left:6px; display:inline;" title="Foursquare" href="http://foursquare.com/uinsk" target="_blank"><img src="http://static.uin-suka.ac.id/images/icons/foursquare.png" width="30" height="30"/></a>
							</div>
						</div>
					</div>	
					<div class="clear20"></div>
					<div class="app-row">
						<div class="col-med-3">
							<div class="suka-links">
								<span>SUKAnet</span>
								<ul>
									<li><a href="http://auth.uin-suka.ac.id" target="_blank">Internet (Intranet)</a></li>
									<li><a href="http://akun.uin-suka.ac.id" target="_blank">Akun (Intranet)</a></li>
									<li><a href="http://password.uin-suka.ac.id" target="_blank">Password</a></li>
									<li><a href="http://it.uin-suka.ac.id/internet" target="_blank">Internet Eksternal</a></li>
								</ul>
							</div>
							<div class="suka-links">
								<span>SUKAmail</span>
								<ul>
									<li style="text-align: justify;"><a href="http://mail.uin-suka.ac.id" target="_blank">E-Mail</a></li>
									<li style="text-align: justify;"><a href="http://akun.uin-suka.ac.id" target="_blank">Cek Akun E-mail</a></li>
								</ul>			
							</div>	
							<div class="suka-links">
								<span>SUKAphone</span>
								<ul>
									<li style="text-align: justify;"><a href="http://phone.uin-suka.ac.id" target="_blank">IP Telephony</a></li>
								</ul>			
							</div>
						</div>
						<div class="col-med-3">
							<div class="suka-links">
								<span>SUKAdministrativa</span>
								<ul>
									<li style="text-align: justify;">
										<a href="http://surat.uin-suka.ac.id" target="_blank">Persuratan</a></li>
									<li style="text-align: justify;">
										<a href="http://aset.uin-suka.ac.id" target="_blank">Aset dan Ruangan</a></li>
									<li style="text-align: justify;">
										<a href="http://pegawai.uin-suka.ac.id" target="_blank">Kepegawaian</a></li>
									<li style="text-align: justify;">
										<a href="http://uang.uin-suka.ac.id" target="_blank">Keuangan</a></li>
									<li style="text-align: justify;">
										<a href="http://rencana.uin-suka.ac.id" target="_blank">Perencanaan</a></li>
									<li style="text-align: justify;">
										<a href="http://kerjasama.uin-suka.ac.id" target="_blank">Kerjasama</a></li>
									<li style="text-align: justify;">
										<a href="http://uc.uin-suka.ac.id" target="_blank">Unit Cost &amp; Uang Kuliah</a></li>
									<li style="text-align: justify;"><a href="http://medis.uin-suka.ac.id" target="_blank">
										Rekam Medis</a></li>
									<li style="text-align: justify;">
										<a href="http://mutu.uin-suka.ac.id" target="_blank">Dashboard Sistem Mutu</a></li>
									<li style="text-align: justify;">
										<a href="http://digit.lpm.uin-suka.ac.id" target="_blank">Digitalisasi Sistem Mutu</a></li>
								</ul>
							</div>
							<div class="suka-links">
								<span>SUKAexecutiva</span>
								<ul>
									<li><a href="http://executive.uin-suka.ac.id/" target="_blank">Executive Information System (Intranet)</a></li>
									<li><a href="http://resource.uin-suka.ac.id/" target="_blank">Enterprise Resource Planning (Intranet)</a></li>
									<li><a href="http://intelligence.uin-suka.ac.id/" target="_blank">Business Intelligence (Intranet)</a></li>
								</ul>
							</div>
							<div class="suka-links">
								<span><a href="http://tv.uin-suka.ac.id" target="_blank" style="color:#fff"> SUKA TV Channel</a></span>
								<!--<iframe width="220" height="165" src="https://www.youtube.com/watch?v=bgRXRxtZxPY&feature=youtu.be" frameborder="0" allowfullscreen></iframe>-->
							</div>	
							<div class="suka-links">
								<span><a href="http://rasida.uin-suka.ac.id" target="_blank" style="color:#fff">Rasida FM</a></span>
								<!--	<audio style="width:100%" controls>
										<source src="http://103.25.54.172:8000/rasida.mp3"type="audio/mpeg">
									</audio>-->
							</div>
						</div>
						<div class="col-med-3">
							<div class="suka-links">
								<span>SUKApustaka</span>
								<ul>
									<li><a href="http://siprus.uin-suka.ac.id/" target="_blank">Informasi Perpustakaan (Intranet)</a></li>
									<li><a href="http://opac.uin-suka.ac.id/" target="_blank">Online Public Access Catalogue</a></li>
									<li><a href="http://digilib.uin-suka.ac.id/" target="_blank">Digital Library</a></li>
									<li><a href="http://rc.syariah.uin-suka.ac.id/" target="_blank">Resource Center Syariah</a></li>
									<li><a href="http://lib.pps.uin-suka.ac.id/" target="_blank">Perpustakaan Pascasarjana</a></li>
									<li><a href="http://pustaka.uin-suka.ac.id" target="_blank">Interkoneksi Perpustakaan</a></li>
								</ul>
							</div>
							<div class="suka-links">
								<span>SUKAmedia</span>
								
				<ul>
					<li><a href="http://onta.uin-suka.ac.id" target="_blank">E-Repository (Intranet)</a></li>
					<li><a href="http://book.uin-suka.ac.id" target="_blank">E-Book (Intranet)</a></li>
					<li><a href="http://journal.uin-suka.ac.id" target="_blank">E-Journal</a>/<a href="http://ejournal.uin-suka.ac.id" target="_blank">OJS</a></li>
					<li><a href="http://conference.uin-suka.ac.id" target="_blank">E-Conference</a>/<a href="http://econference.uin-suka.ac.id" target="_blank">OCS</a></li>
					<li><a href="http://event.uin-suka.ac.id" target="_blank">E-Event</a></li>
					<li><a href="http://reservation.uin-suka.ac.id" target="_blank">E-Reservation/Booking/Appointment</a></li>
					<li><a href="http://polling.uin-suka.ac.id" target="_blank">E-Polling/E-Survey</a></li>
					<li><a href="http://quiz.uin-suka.ac.id" target="_blank">E-Quiz</a></li>
					<li><a href="http://calendar.uin-suka.ac.id" target="_blank">E-Calendar</a></li>
					<li><a href="http://agenda.uin-suka.ac.id" target="_blank">E-Agenda</a></li>
					<li><a href="http://video.uin-suka.ac.id" target="_blank">E-Video</a></li>
					<li><a href="http://streaming.uin-suka.ac.id" target="_blank">E-Streaming</a></li>
					<li><a href="http://aspirasi.uin-suka.ac.id" target="_blank">E-Aspirasi/Keluhan</a></li>
					<li><a href="http://layanan.uin-suka.ac.id" target="_blank">E-Layanan</a></li>
					<li><a href="http://sms.uin-suka.ac.id" target="_blank">SMS Gateway</a></li>
					<li><a href="http://materi.uin-suka.ac.id" target="_blank">Materi</a></li>
					<li><a href="http://alamat.uin-suka.ac.id/email" target="_blank">Alamat Email Staff (Intranet)</a></li>
					<li><a href="http://alamat.uin-suka.ac.id/admhs" target="_blank">Alamat Email Mahasiswa (Intranet)</a></li>
					<li><a href="http://alamat.uin-suka.ac.id/ipphone" target="_blank">Nomor IP-Phone (Intranet)</a></li>
				</ul>
							</div>
							<div class="suka-links">
							<span>SUKAstudia</span>
							<ul>
								<li><a href="http://learning.uin-suka.ac.id/" target="_blank">E-learning</a></li>
								<li><a href="http://test.uin-suka.ac.id/" target="_blank">Computer-Based Test (Intranet)</a></li>
							</ul>	
							</div>
						</div>
						<div class="col-med-3">	
							<div class="suka-links">
								<span>SUKAdemia</span>
									<ul>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Penerimaan Mahasiswa Baru</a></li>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Yudisium Mahasiswa Baru</a></li>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Rekap Data Mahasiswa Baru</a></li>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Data Profil Mahasiswa</a></li>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Registrasi</a> </li>
										<li style="text-align: justify;">
											<a href="http://admisi.uin-suka.ac.id" target="_blank">Cek Berkas Registrasi</a> </li>
										<li style="text-align: justify;">
											<a href="http://tagih.uin-suka.ac.id" target="_blank">Penagihan Pembayaran (Intranet)</a> </li>
										<li style="text-align: justify;">
											<a href="http://bayar.uin-suka.ac.id" target="_blank">Pembayaran/Penarikan/Perpanjangan /Penghapusan (Intranet)</a> </li>
										<li style="text-align: justify;">
											<a href="http://kartu.uin-suka.ac.id" target="_blank">Cetak Kartu Tanda Mahasiswa</a></li>
										<li style="text-align: justify;">
											<a href="http://kartu.uin-suka.ac.id" target="_blank">Cetak Kartu Alumni</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Data Pribadi Mahasiswa</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Informasi Akademik</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Presensi Kuliah</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Kuliah Praktik</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Kuliah Kerja Nyata</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Tugas Akhir &amp; Munaqasyah</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Indeks Kinerja Dosen </a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Kinerja Dosen </a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Rencana Beban Kerja Dosen </a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Beban Kerja Dosen</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Beasiswa &amp; Kegiatan</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Yudisium Beasiswa &amp; Kegiatan</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Pendidikan Pemakai Perpustakaan</a> </li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Training dan Sertifikasi ICT</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Training dan Sertifikasi Bahasa</a></li>
										<li style="text-align: justify;">
											<a href="http://praktikum.uin-suka.ac.id" target="_blank">Manajemen Praktikum</a></li>
										<li style="text-align: justify;">
											<a href="http://praktikum.uin-suka.ac.id/" target="_blank">Manajemen Laboratorium</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Wisuda</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Yudisium Wisuda</a></li>
										<li style="text-align: justify;">
											<a href="http://alumni.uin-suka.ac.id" target="_blank">Alumni/Tracer Study/Legalisir</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Penelitian</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Pengabdian Masyarakat</a></li>
										<li style="text-align: justify;">
											<a href="http://akademik.uin-suka.ac.id" target="_blank">Penjaminan Mutu</a></li>
									</ul>
							</div>
						</div>
					</div>	
					<div style="clear:both;"></div>
				</div>
			<div class="copyright">&copy; 2014 - Pusat Teknologi Informasi dan Pangkalan Data, UIN Sunan Kalijaga, Yogyakarta</div>	
		</div>
	</body>
</html></body>
</html>