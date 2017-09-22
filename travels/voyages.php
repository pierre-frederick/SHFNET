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
        <!--=============== Conten holder  ===============-->
        <div class="content-holder elem scale-bg2 transition3" >
            <!--=============== Content  ===============-->
            <div class="content full-height">
                <div class="fixed-title"><span>Portfolio</span></div>
                <!-- Portfolio counter  -->
                <div class="count-folio">
                    <div class="num-album"></div>
                    <div class="all-album"></div>
                </div>
                <!-- Portfolio counter end -->
                <div class="filter-holder column-filter">
                    <div class="filter-button">Filter <i class="fa fa-long-arrow-down"></i></div>
                    <div class="gallery-filters hid-filter">
                        <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*">All Albums</a>
                        <a href="#" class="gallery-filter transition2" data-filter=".people">People</a>
                        <a href="#" class="gallery-filter transition2" data-filter=".nature">Nature</a>
                        <a href="#" class="gallery-filter transition2" data-filter=".comercial">Comercial</a>
                        <a href="#" class="gallery-filter transition2" data-filter=".travel">Travel</a>
                    </div>
                </div>
                <!--=============== portfolio holder ===============-->
                <div class="resize-carousel-holder">
                    <div class="p_horizontal_wrap">
                        <div id="portfolio_horizontal_container">
                            <!-- portfolio item -->
                            <div class="portfolio_item people comercial">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Quisque non augue</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Quisque non augue</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item travel nature">
                                <img  src="images/bg/2.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Curabitur bibendum</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Curabitur bibendum</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolioitem end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item travel">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Adipiscing elit</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Adipiscing elit</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item nature comercial">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Nam sagittis pretium</a></h3>
                                            <span>Nature</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Nam sagittis pretium</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Nature</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolioitem end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item travel comercial">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Nam gravida</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Nam gravida</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item travel comercial">
                                <img  src="images/bg/2.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Justo tortor</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Justo tortor</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item people nature">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Integer euismod</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Integer euismod</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item travel nature">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Donec nulla purus,</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Donec nulla purus</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item people nature">
                                <img  src="images/bg/2.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Maecenas vitae semper</a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Maecenas vitae semper</a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                            <!-- portfolio item -->
                            <div class="portfolio_item people comercial">
                                <img  src="images/bg/1.jpg"   alt="">
                                <div class="port-desc-holder">
                                    <div class="port-desc">
                                        <div class="overlay"></div>
                                        <div class="grid-item">
                                            <h3><a href="portfolio-single.html">Proin iaculis felis </a></h3>
                                            <span>Travel</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="port-subtitle-holder">
                                    <div class="port-subtitle">
                                        <h3><a href="portfolio-single.html">Proin iaculis felis </a></h3>
                                        <span><a href="#">Travel</a> / <a href="#">Photography</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio item end -->
                        </div>
                        <!--portfolio_horizontal_container  end-->
                    </div>
                    <!--p_horizontal_wrap  end-->
                </div>
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