
		<div id="app_content">	<div class="app-row">
		<div class="col-med-3">
			<div id="sidebar-sia">
								<nav class="accordion">
					<ol>
						<li>
							<div class="sia-profile" style="margin-bottom:10px;width:223px">
								<img class="sia-profile-image" alt="" src="http://static.uin-suka.ac.id/foto/mhs/990/c529431279430136561188462484476703618179549179391394171612703212567734612391395701634466734617705495537736111398395.jpg">
								<h2><?php  echo $nama; ?></h2>
								<br>
								<p style="text-align:center; font-weight:bold;"><?php  echo $nim; ?></p>
							</div>
							<div id="separate"></div>
						</li>
							

							<li>
								<a class="item full" href="<?php site_url(); ?>cetak_surat">
									<span>
										Cetak Surat
										<span>
											<div class="underline-menu"></div>
										</span>
									</span>
								</a>

									<ol class="" style="display: block;">
										<li class="submenu">
											<a href="<?php base_url(); ?>masih_kul.php">
												<?php echo $submenu1; ?>
										</li>
										<li class="submenu">
											<a href="<?php base_url(); ?>tdk_men_bea.php">
												<?php echo $submenu2; ?>
										</li>
										<li class="submenu">
											<a href="<?php base_url(); ?>kel_baik.php">
												<?php echo $submenu3; ?>
										</li>
										<li class="submenu">
											<a href="<?php base_url(); ?>bbs_teori.php">
												<?php echo $submenu4; ?>
										</li>
										
										<li class="submenu">
											<a href="<?php base_url(); ?>ket_lulus.php">
												<?php echo $submenu6; ?>
										</li>
										<li class="submenu">
											<a href="<?php base_url(); ?>pndh_studi.php">
												<?php echo $submenu7; ?>
										</li>
										
										<li class="submenu">
											<a href="<?php base_url(); ?>ijin_pen.php">
												<?php echo $submenu9; ?>
										</li>
										<li class="submenu">
											<a href="<?php base_url(); ?>ijin_studi_pen.php">
												<?php echo $submenu10; ?>
										</li>
										
										<li class="submenu">
											<a href="<?php base_url(); ?>ijin_obs.php">
												<?php echo $submenu12; ?>
										</li>
										
										<li class="submenu">
											<a href="<?php base_url(); ?>perm_KP.php">
												<?php echo $submenu14; ?>
										</li>
										
										
										
									</ol>					

															</li>


												<li>
							<a class="item full" href="<?php echo base_url(); ?>/mhs/login/logout">
								<span>Logout</span>
								<div class="underline-menu"></div>
							</a>
						</li>
					</ol>
				</nav>

			</div>
		</div>
	</div>