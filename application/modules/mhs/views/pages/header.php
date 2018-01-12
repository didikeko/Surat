<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistem Informasi Surat UIN Sunan Kalijaga</title>
        
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
        <link href="http://static.uin-suka.ac.id/images/favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="http://surat.uin-suka.ac.id/asset/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/style_global.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/style_layout.css" rel="stylesheet" type="text/css"/>
		<link href="http://surat.uin-suka.ac.id/asset/css/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css"/>
		<link href="http://surat.uin-suka.ac.id/asset/css/tnde.css" rel="stylesheet" type="text/css"/>
		<link href="http://surat.uin-suka.ac.id/asset/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css"/>
		<link type="text/css" href="http://surat.uin-suka.ac.id/asset/css/ui.multiselect.css" rel="stylesheet" />
		<link href="http://static.uin-suka.ac.id/css/docs.css" rel="stylesheet" type="text/css"/>
		<link href="http://static.uin-suka.ac.id/css/breadcrumb.css" rel="stylesheet" type="text/css"/>
		<script src="http://surat.uin-suka.ac.id/asset/js/jquery-1.7.2.min.js"></script>
		<!-- jQuery UI -->
		<script src="http://surat.uin-suka.ac.id/asset/js/jquery-ui-1.8.21.custom.min.js"></script>
		<script>!window.jQuery && document.write(unescape('%3Cscript src="http://surat.uin-suka.ac.id/asset/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
		
		<!-- multiselect -->
		<script type="text/javascript" src="http://surat.uin-suka.ac.id/asset/js/localisation/jquery.localisation-min.js"></script>
		<script type="text/javascript" src="http://surat.uin-suka.ac.id/asset/js/scrollTo/jquery.scrollTo-min.js"></script>
		<script type="text/javascript" src="http://surat.uin-suka.ac.id/asset/js/ui.multiselect.js"></script>
	
		<script type="text/javascript" src="http://surat.uin-suka.ac.id/asset/js/bootstrap-timepicker.js"></script>
		<script src="http://surat.uin-suka.ac.id/asset/js/bootstrap-transition.js"></script>
		<script src="http://surat.uin-suka.ac.id/asset/js/bootstrap-modal.js"></script>
		<script src="http://surat.uin-suka.ac.id/asset/js/nod.min.js"></script>
		
		<script type="text/javascript" src="http://surat.uin-suka.ac.id/asset/js/jquery.multirotation-1.0.js"></script>

		<style type="text/css">
			.ui-autocomplete{
				max-height: 180px;
				max-width: 440px;
				overflow: auto;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$( ".datepicker" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "dd/mm/yy",
					showOn: "button",
					buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
					buttonImageOnly: true
				});
				$( ".datepicker_max" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "dd/mm/yy",
					maxDate: "+0D",
					showOn: "button",
					buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
					buttonImageOnly: true
				});	
				$( ".datepicker_min" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "dd/mm/yy",
					minDate: new Date(2014, 01 - 1, 01),
					maxDate: "+0D",
					showOn: "button",
					buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
					buttonImageOnly: true
				});
				$( ".datepicker_sk" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "dd/mm/yy",
					minDate: new Date(2014, 01 - 1, 10),
					maxDate: "+0D",
					showOn: "button",
					buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
					buttonImageOnly: true
				});
				$('#jam_mulai').timepicker({showMeridian: false, minuteStep: 1});
				$('#jam_selesai').timepicker({showMeridian: false, minuteStep: 1});
			});
		</script>	
		<script type="text/javascript">
			function get_datepicker(){
				$( ".multiple_datepicker" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "dd/mm/yy",
					showOn: "button",
					buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
					buttonImageOnly: true
				});
			}
		</script>
		<script type="text/javascript">
			function get_ckeditor(){
				var config =
					{
						height: 100,
						width: 188,
						fullPage: true,
						allowedContent: true,
						toolbar: []
					};
				$('.multiple_ckeditor').ckeditor(config);
				var config2 =
					{
						height: 100,
						width: 140,
						fullPage: true,
						allowedContent: true,
						toolbar: []
					};
				$('.multiple_ckeditor2').ckeditor(config2);
				var config3 =
					{
						height: 100,
						width: 152,
						fullPage: true,
						allowedContent: true,
						toolbar: []
					};
				$('.multiple_ckeditor3').ckeditor(config3);
			}
		</script>
		<script type="text/javascript">
                           $(function() {
                                    $( ".datepicker_mulai" ).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: "dd/mm/yy",
                                            showOn: "button",
											beforeShow: cekTanggal,
                                            buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
                                            buttonImageOnly: true
                                    });
                                    $( ".datepicker_selesai" ).datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: "dd/mm/yy",
                                            showOn: "button",
                                            beforeShow: cekTanggal,
                                            buttonImage: "http://surat.uin-suka.ac.id/asset/img/calendar-icon.gif",
                                            buttonImageOnly: true
                                    });
                            });
                           
                            function cekTanggal(input) {
                                    var dateMin = '0';
                                    var dateMax = null;
                                    var fromDate = $(".datepicker_mulai").datepicker('getDate');
                                    var toDate = $(".datepicker_selesai").datepicker('getDate');
     
                                    if (input.id === "datepicker_selesai") {
                                            if ($(".datepicker_mulai").datepicker("getDate") != null) {
                                                    dateMin = $(".datepicker_mulai").datepicker("getDate");
                                            }
                                    }
                                   
                                    if (input.id === "datepicker_mulai") {
                                            if ($(".datepicker_selesai").datepicker("getDate") != null) {
                                                    dateMax = $(".datepicker_selesai").datepicker("getDate");
                                            }
                                    }
                                    return {
                                            minDate: dateMin,
                                            maxDate: dateMax
                                    };
                            }
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				// Support for AJAX loaded modal window.
				// Focuses on first input textbox after it loads the window.
				$('[data-toggle="modal-detail"]').click(function(e) {
					e.preventDefault();
					var url = $(this).attr('href');
					if (url.indexOf('#') == 0) {
						$(url).modal('open');
					}else{
						$.get(url, function(data) {
							$('<div class="modal mdokumen hide fade">' + data + '</div>').modal();
						}).success(function() { $('input:text:visible:first').focus(); });
					}
				});
			});
		</script>
		<script language="javascript" type="text/javascript">
			function opendok(url) {
				newwindow=window.open(url,'name','fullscreen=yes');
				if (window.focus) {newwindow.focus()}
				return false;
			}
		</script>
		<script type="text/javascript">
		  function plus(id) {
			$(id).rotate({ angle: 90 });
			get(id);
			return false;
		  }
		 
		  function minus(id) {
			$(id).rotate({ angle: 90, direction: false });
			get(id);
			return false;
		  }
		 
		  function reset(id) {
			$(id).clearRotation();
			get(id);
			return false;
		  }
		 
		</script>
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
					<div class="app_system_id">Sistem Informasi Surat</div>
					<div class="app_univ_id">UIN Sunan Kalijaga</div>
				</div>
			<div class="clear"></div>
			</div>
		</div>