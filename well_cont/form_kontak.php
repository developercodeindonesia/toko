<?php 
	include 'well_inc/captcha.php';
	// membuat obyek class
	$captcha1 = new mathcaptcha();
	// panggil method untuk mengenerate kode
	$captcha1->generatekode();
?>
<div class="row inner-bottom-sm">
	<div class="contact-page">
		<div class="col-md-12 contact-map outer-bottom-vs">
			<?php
				$sql1  = mysql_query("SELECT * FROM modul WHERE id_modul='2'");
				$rr    = mysql_fetch_array($sql1);
				
				echo "$rr[static_content]";
			?>
			
		</div>
		
		<div class="col-md-9 contact-form">
			<div class="col-md-12 contact-title">
				<h4>Contact Form</h4>
			</div>
			
			<form method="POST" action="well_cont/kontak.php">
				<div class="col-md-4">
					<label class="register-form" role="form">
						<div class="form-group">
							<label class="info-title" for="exampleInputName">Your Name <span>*</span></label> 
								<input class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Name" type="text" name="nama" required>
						</div>
					</label>
				</div>
				<div class="col-md-4">
					<label class="register-form" role="form">
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label> 
								<input class="form-control unicase-form-control text-input" id= "exampleInputEmail1" placeholder="namaemail@example.com" type="email" name="email" required>
						</div>
					</label>
				</div>
				<div class="col-md-4">
					<label class="register-form" role="form">
						<div class="form-group">
							<label class="info-title" for="exampleInputTitle">Subject <span>*</span></label> 
								<input class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Subject" type="text" name="subjek" required>
						</div>
					</label>
				</div>
				<div class="col-md-12">
					<label class="register-form" role="form">
						<div class="form-group">
							<label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label> 
								<textarea class="form-control unicase-form-control" id="exampleInputComments" placeholder="Message" name="pesan" required></textarea>
						</div>
					</label>
				</div>
				
				<div class="col-md-4">
					<label class="register-form" role="form">
						<div class="form-group">
							<label class="info-title" for="exampleInputCaptcha">Spam Protection <span>*</span><b> <?php $captcha1->showcaptcha(); ?> </b></label> 
								<input class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Answer" type="text" name="kode" required>
								<?php echo "<input type=hidden name=rahasia value='".$_SESSION['kode']."'>"; ?>
						</div>
					</label>
				</div>
				
				<div class="col-md-12 outer-bottom-small m-t-20">
					<button class="btn-upper btn btn-primary checkout-page-button" type="submit" value="Submit">Send Message</button>
				</div>
			</form>
			
		</div>
		
		<div class="col-md-3 contact-info">
			<div class="contact-title">
				<h4>INFORMATION</h4>
			</div>
			<div class="clearfix address">
				<span class="contact-i"><i class="fa fa-map-marker"></i></span> 
				<span class="contact-span">
				<?php
					$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='6'");
					$r    = mysql_fetch_array($sql);
						echo "$r[static_content]";
				?>
				</span>
			</div>
			<div class="clearfix phone-no">
				<span class="contact-i"><i class="fa fa-mobile"></i></span>
				<span class="contact-span">
				<?php
					$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='12'");
					$r    = mysql_fetch_array($sql);
						echo "$r[static_content]";
				?>
				</span>
			</div>
			<div class="clearfix email">
				<span class="contact-i"><i class="fa fa-envelope"></i></span> 
				<span class="contact-span">
				<?php
					$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='18'");
					$r    = mysql_fetch_array($sql);
						echo "$r[static_content]";
				?>
				</span>
			</div>
		</div>
	</div><!-- /.contact-page -->
</div><!-- /.row -->