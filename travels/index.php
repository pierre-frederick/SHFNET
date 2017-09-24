<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/head.php"); ?>

<body>
<!--Loader  -->
<div class="loader"><i class="fa fa-refresh fa-spin"></i></div>
<!--LOader end  -->
<!--================= main start ================-->
<div id="main">
    <!--=============== header ===============-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/header.php"); ?>


    <div id="wrapper">
        <!--=============== Content holder  ===============-->
        <div class="content-holder elem scale-bg2 transition3 slid-hol" >
            <!-- Fixed title  -->
            <div class="fixed-title"><span>Home</span></div>
            <!-- Fixed title end -->
            <!--=============== Content ===============-->
            <div class="content full-height">
                <!-- full-height-wrap end  -->
                <div class="full-height-wrap">
                    <div class="swiper-container" id="horizontal-slider" data-mwc="1" data-mwa="0">
                        <div class="swiper-wrapper">
                            <!--=============== 1 ===============-->
                            <div class="swiper-slide">
                                <div class="bg" style="background-image:url(https://farm5.staticflickr.com/4283/35373182621_236f4c3be2_h.jpg)"></div>
                                <div class="overlay"></div>
                                <div class="zoomimage"><img src="https://farm5.staticflickr.com/4283/35373182621_236f4c3be2_h.jpg" class="intense" alt=""><i class="fa fa-expand"></i></div>
                                <div class="slide-title-holder">
                                    <div class="slide-title">
                                        <span class="subtitle">At posuere sem accumsan </span>
                                        <div class="separator-image"><img src="images/separator.png" alt=""></div>
                                        <h3 class="transition">  <a href="portfolio-single.html">Blandit praesent</a></h3>
                                        <h4><a  href="portfolio-single.html">View</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- 1 end -->
                            <!--=============== 2 ===============-->
                            <div class="swiper-slide">
                                <div class="bg" style="background-image:url(https://farm5.staticflickr.com/4284/35336823852_107df81324_h.jpg)"></div>
                                <div class="overlay"></div>
                                <div class="zoomimage"><img src="images/bg/1.jpg" class="intense" alt=""><i class="fa fa-expand"></i></div>
                                <div class="slide-title-holder">
                                    <div class="slide-title">
                                        <span class="subtitle">At posuere sem accumsan </span>
                                        <div class="separator-image"><img src="images/separator.png" alt=""></div>
                                        <h3 class="transition">  <a href="portfolio-single.html">In tortor neque</a>  </h3>
                                        <h4><a  href="portfolio-single.html">View</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 end -->
                            <!--=============== 3 ===============-->
                            <div class="swiper-slide">
                                <div class="bg" style="background-image:url(images/bg/1.jpg)"></div>
                                <div class="overlay"></div>
                                <div class="zoomimage"><img src="images/bg/1.jpg" class="intense" alt=""><i class="fa fa-expand"></i></div>
                                <div class="slide-title-holder">
                                    <div class="slide-title">
                                        <span class="subtitle">At posuere sem accumsan </span>
                                        <div class="separator-image"><img src="images/separator.png" alt=""></div>
                                        <h3 class="transition">  <a  href="portfolio-single.html">Vestibulum tincidunt</a>  </h3>
                                        <h4><a  href="portfolio-single.html">View</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- 3 end -->
                            <!--=============== 4 ===============-->
                            <div class="swiper-slide">
                                <div class="bg" style="background-image:url(images/bg/1.jpg)"></div>
                                <div class="overlay"></div>
                                <div class="zoomimage"><img src="images/bg/1.jpg" class="intense" alt=""><i class="fa fa-expand"></i></div>
                                <div class="slide-title-holder">
                                    <div class="slide-title">
                                        <span class="subtitle">At posuere sem accumsan </span>
                                        <div class="separator-image"><img src="images/separator.png" alt=""></div>
                                        <h3 class="transition">  <a  href="portfolio-single.html">Libero bibendum</a>  </h3>
                                        <h4><a  href="portfolio-single.html">View</a></h4>
                                    </div>
                                </div>
                            </div>
                            <!-- 4 end -->
                        </div>
                    </div>
                    <!-- slider  pagination -->
                    <div class="pagination"></div>
                    <!-- pagination  end -->
                    <!-- slider navigation  -->
                    <div class="swiper-nav-holder hor hs">
                        <a class="swiper-nav arrow-left transition " href="#"><i class="fa fa-angle-left"></i></a>
                        <a class="swiper-nav  arrow-right transition" href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- slider navigation  end -->
                </div>
                <!-- full-height-wrap end  -->
            </div>
            <!-- Content end  -->
            <!-- Share container  -->
            <div class="share-container  isShare"  data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>
        </div>
        <!-- content holder end -->
    </div>




    <!--=============== footer ===============-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/footer.php"); ?>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/javascript.php"); ?>

</body>
</html>