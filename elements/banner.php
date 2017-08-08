<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/includes/functions.php'; // fichier des fonctions
?>
    <!-- bannerSection -->
    <div class="bannerSection">
		<div class="slider-inner">
			<div id="da-slider" class="da-slider">


                <?php
                setlocale(LC_ALL, 'fr_FR.UTF-8');
                $bdd = ConnexionDB();
                if(isset($bdd)) {

                $banners = LastBanners($bdd);
                if(!empty($banners)) {
                    foreach($banners as $banner) {?>
                        <div class="da-slide">
                            <h2><?php echo $banner['title']?></h2>
                            <p><?php echo $banner['subtitle']?></p>
                            <div class="da-img">
                        <?php if($banner['mediatype'] == 'img') {
                            ?>
                            <img src="<?php echo $banner['urlmedia']?>" alt="Header_image" />

                        <?php } else if ($banner['mediatype'] == 'vid') {?>
                            <iframe src="<?php echo $banner['urlmedia']?>" width="100%" height="320" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen class="col-md-offset-4 col-md-6"></iframe>
                        <?php } ?>
                            </div>
                        </div>

                    <?php } }}
                else
                { ?>
                    <div class="da-slide">
                        <h2><i>SHFNET</i> <br> <i></i> <br> <i></i></h2>
                        <p><i>Désolé !</i> <br> <i>Nous rencontrons des</i> <br> <i>problèmes techniques</i></p>
                        <div class="da-img"><img src="/assets/custom/img/Responsive-Website-Design-Devices.png" alt="" /></div>
                    </div>
                <?php  } ?>

				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>		
				</nav>
			</div><!--/da-slider-->
		</div><!--/slider-->
		<!--=== End Slider ===-->
		</div>