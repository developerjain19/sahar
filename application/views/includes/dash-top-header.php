<?php
$image = runQuery("SELECT * FROM company WHERE rgid = '" . sessionId('login_user_id') . "' ");
$cate = getRowById('company_category', 'cate_id', $image[0]['company_category']);


if ($image != '') {
	if ($image[0]['company_banner'] != '') {

?>
		<section class="bg-cover position-relative" style="background:red url(<?= base_url() ?>uploads/company/<?= $image[0]['company_banner']; ?>) no-repeat;" data-overlay="3">
		<?php

	}
} else {
		?>
		<section class="bg-cover position-relative" style="background:red url(<?= base_url() ?>assets/images/default-banner.png) no-repeat;" data-overlay="3">
		<?php
	}
		?>

		<?php
		if ($image[0]['company_web_title'] != '') {
		?>
			<div class="abs-list-sec right_pos <?= (($image[0]['company_web_title'] != '') ? "" : "d-ddnone"); ?>"><a href="<?= base_url() ?>sahar/<?= url_title($image[0]['company_city']) ?>/<?= url_title(strtolower($cate[0]['category'])); ?>/<?= $image[0]['company_web_title'] ?>" class="add-list-btn" target="_blank"><i class="fas fa-id-card me-2"></i>Visit your vcard/website</a></div>


			<div class="abs-list-sec <?= (($image[0]['company_web_title'] != '') ? "" : "d-dd"); ?>"><a href="<?= base_url('product-add') ?>" class="add-list-btn"><i class="fas fa-plus me-2"></i>Add Product</a></div>
			<div class="abs-list-sec <?= (($image[0]['company_web_title'] != '') ? "" : "d-dd"); ?>" style="top: 10px"><a href="" data-bs-toggle="modal" data-bs-target="#login" class="add-list-btn"><i class="fas fa-edit me-2"></i>Edit Banner</a></div>
		<?php
		}
		?>


		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

					<div class="author_card_wrapper">
						<div class="logo">
							<?php
							if ($image != '') {
								if ($image[0]['company_logo'] != '') {
							?>
									<img src="<?= base_url() ?>uploads/company/<?= $image[0]['company_logo']; ?>" alt="company-logo">
								<?php
								} else {
								?>
									<img src="<?php echo base_url() . 'assets/images/user_logo.png' ?>" class="img-fluid" alt="company-logo" />
							<?php
								}
							}
							?>
						</div>
						<div class="name">
							<i class="fas fa-user"></i>
							<h4><?= sessionId('login_user_name'); ?></h4>
						</div>
						<div class="contact_detials">
							<a class="call" href="tel:">
								<i class="fas fa-phone-alt"></i>
								<h5>+91 <?= substr(sessionId('login_user_contact'), 0, 5) . ' ' . substr(sessionId('login_user_contact'), 5); ?></h5>
							</a>
							<a class="whatsapp" href="https://api.whatsapp.com/send?phone=+91 <?= $image[0]['company_whatsapp'] ?> &text=Hello..." target="_blank">
								<i class="lni lni-whatsapp"></i>
								<h5>+91 <?= substr($image[0]['company_whatsapp'], 0, 5) . ' ' . substr($image[0]['company_whatsapp'], 5); ?></h5>
							</a>
							<?php
							if ($image[0]['company_email'] != '') {
							?>
								<a class="mail" href="mailto:<?= $image[0]['company_email'] ?>" target="_blank">
									<i class="fas fa-envelope"></i>
									<h5><?= $image[0]['company_email'] ?></h5>
								</a>
							<?php
							}
							?>

							<?php
							if ($image[0]['company_address'] != '') {
							?>
								<a class="mail" href="#">
									<i class="fas fa-map-marker"></i>
									<h5><?= $image[0]['company_address'] ?></h5>
								</a>
							<?php
							}
							?>
						</div>

						<div class="social_icon">
							<a href="<?= $image[0]['company_facebook'] ?>" target="_blank"><i class="lni lni-facebook-filled"></i></a>
							<a href="<?= $image[0]['company_instagram'] ?>" target="_blank"><i class="lni lni-instagram"></i></a>
							<a href="<?= $image[0]['company_twitter'] ?>" target="_blank"><i class="lni lni-twitter-filled"></i></a>
							<a href="<?= $image[0]['company_linkedin'] ?>" target="_blank"><i class="lni lni-linkedin"></i></a>
							<a href="<?= $image[0]['company_youtube'] ?>" target="_blank"><i class="lni lni-youtube"></i></a>
							<a href="<?= $image[0]['company_telegram'] ?>" target="_blank"><i class="lni lni-telegram"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		</section>


		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
			<div class="modal-dialog login-pop-form" role="document">
				<div class="modal-content" id="loginmodal">
					<div class="modal-headers">
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span class="ti-close"></span>
						</button>
					</div>

					<div class="modal-body p-5">
						<div class="text-center mb-4">
							<h4 class="m-0 ft-medium">Change your banner image</h4>
						</div>

						<form class="submit-form" method="POST" action="<?= base_url('Home/banner_update') ?>">
							<div class="form-group">
								<label class="mb-1">Upload Company Banner (Only: JPG PNG and JPEG)</label>
								<!--<input type="file" name="company_banner" class="form-control rounded bg-light" accept="image/x-png,image/jpg,image/jpeg">-->
								<input type="file" class="form-control rounded" name="company_banner" accept="image/x-png,image/jpg,image/jpeg" />
								<input type="hidden" class="form-control" value="<?= $image[0]['company_banner'] ?>" />
								<img src="<?= base_url() ?>uploads/company/<?= $image[0]['company_banner'] ?>" width="100px" />
								<label class="mb-1">Size: W - 1586px, H - 375px</label>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">Edit banner</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>