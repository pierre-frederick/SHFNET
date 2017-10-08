<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php'; // fichier des fonctions
$center_lat = 0.000;
$center_long = 0.000;
$zoom = 3;
?>

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
        <div class="content-holder elem scale-bg2 transition3">
            <?php $idVoyage = filter_input(INPUT_GET, 'voyage', FILTER_VALIDATE_INT);
            echo $idVoyage;
            if (!is_int($idVoyage)) { ?>
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
                        <div class="filter-button">Catégories <i class="fa fa-long-arrow-down"></i></div>
                        <div class="gallery-filters hid-filter">
                            <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*">All
                                Albums</a>
                            <?php
                            setlocale(LC_ALL, 'fr_FR.UTF-8');
                            $bdd = connexionDB();
                            if (isset($bdd)) {
                                $categories = getAllVgCategorie($bdd);
                                if (!empty($categories)) {
                                    foreach ($categories as $categorie) { ?>
                                        <a href="#" class="gallery-filter transition2"
                                           data-filter=".<?php echo $categorie['name'] ?>"><?php echo $categorie['name'] ?></a>
                                    <?php }
                                }
                            } ?>
                        </div>
                    </div>
                    <!--=============== portfolio holder ===============-->
                    <div class="resize-carousel-holder">
                        <div class="p_horizontal_wrap">
                            <div id="portfolio_horizontal_container">
                                <?php
                                if (isset($bdd)) {
                                    $voyages = getAllVgVoyages($bdd);

                                    if (!empty($voyages)) {
                                        foreach ($voyages as $voyage) { ?>
                                            <!-- portfolio item -->
                                            <div class="portfolio_item <?php $categories = getAllVgCategorieVoyageById($bdd, $voyage['id']);
                                            if (!empty($categories)) {
                                                foreach ($categories as $categorie) {
                                                    $Cat = getVgCategorieById($bdd, $categorie['id_vg_categorie']);
                                                    echo $Cat['name'] . " ";
                                                }
                                            } ?>">
                                                <img src="<?php echo $voyage['picture_on_top'] ?>" alt="">
                                                <div class="port-desc-holder">
                                                    <div class="port-desc">
                                                        <div class="overlay"></div>
                                                        <div class="grid-item">
                                                            <h3>
                                                                <a href="./voyages.php?voyage=<?php echo $voyage['id'] ?>"><?php echo $voyage['name'] ?></a>
                                                            </h3>
                                                            <span><?php echo $voyage['place'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="port-subtitle-holder">
                                                    <div class="port-subtitle">
                                                        <h3>
                                                            <a href="./voyages.php?voyage=<?php echo $voyage['id'] ?>"><?php echo $voyage['name'] ?></a>
                                                        </h3>
                                                        <span><a href="#"><?php echo $voyage['country'] ?></a> / <?php echo $voyage['city'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- portfolio item end -->

                                        <?php }
                                    }
                                } else {
                                    echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
                                } ?>
                            </div>
                            <!--portfolio_horizontal_container  end-->
                        </div>
                        <!--p_horizontal_wrap  end-->
                    </div>
                </div>
                <!-- Content end  -->
                <!-- Share container  -->
                <div class="share-container  isShare"
                     data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>

            <?php } elseif (is_int($idVoyage)) { ?>
                <?php
                setlocale(LC_ALL, 'fr_FR.UTF-8');
                $bdd = connexionDB();
                if (isset($bdd)) {
                    $voyage = getVgVoyageById($bdd, $idVoyage);
                    if (!empty($voyage)) { ?>

                        <div class="fixed-title"><span><?php echo $voyage['name'] ?></span></div>
                        <!-- Page navigation-->
                        <!--=============== Content  ===============-->
                        <div class="content">
                            <!-- Page title section -->
                            <section class="parallax-section">
                                <div class="overlay"></div>
                                <div class="bg" style="background-image:url(<?php echo $voyage['picture_on_top'] ?>)"
                                     data-top-bottom="transform: translateY(200px);"
                                     data-bottom-top="transform: translateY(-200px);"></div>
                                <div class="container">
                                    <h2><?php echo $voyage['name'] ?></h2>
                                    <div class="separator-image"><img src="images/separator.png" alt=""></div>
                                    <h3 class="subtitle"><?php echo $voyage['place'] ?></h3>
                                </div>
                                <a class="custom-scroll-link sect-scroll" href="#sec1"><i
                                            class="fa fa-angle-double-down"></i></a>
                            </section>
                            <!-- Page title section end-->
                            <div class="sections-bg"></div>
                            <!--  project  -->
                            <section id="sec1">
                                <div class="container column-container">
                                    <div class="row">
                                        <!--  project images -->
                                        <div class="col-md-7">
                                            <div class="project-box">
                                                <!-- slider-->
                                                <div class="custom-slider-holder">
                                                    <div class="custom-slider owl-carousel">
                                                        <?php $idPhotos = getAllVgVoyagePhotoById($bdd, $voyage['id']);
                                                        if (!empty($idPhotos)) {
                                                            foreach ($idPhotos as $idPhoto) {

                                                                $photo = getVgPhotoById($bdd, $idPhoto['id']);?>
                                                                <!--1  -->
                                                                <div class="item">
                                                                    <div class="zoomimage"><img src="<?php echo $photo['link'] ?>"
                                                                                                class="intense" alt=""><i
                                                                                class="fa fa-expand"></i></div>
                                                                    <img src="<?php echo $photo['link'] ?>" class="respimg" alt="">
                                                                    <div class="show-info">
                                                                        <span>Info</span>
                                                                        <div class="tooltip-info">
                                                                            <h5><?php echo $photo['name'] ?></h5>
                                                                            <p><?php echo $photo['description'] ?> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--1  end-->

                                                            <?php }
                                                        } ?>
                                                    </div>
                                                    <div class="customNavigation">
                                                        <a class="prev-slide"><i class="fa fa-angle-left"></i></a>
                                                        <a class="next-slide"><i class="fa fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- slider end-->
                                                <p><?php echo $voyage['content'] ?></p>
                                            </div>

                                        </div>
                                        <!--  project images end -->
                                        <!--  project details  -->
                                        <div class="col-md-5">
                                            <div class="fix-box">
                                                <div class="project-box">
                                                    <h3>Carte</h3>
                                                    <p> <?php $map = getVgMapById($bdd, $voyage['id_vg_map'] );
                                                        $center_lat = $map['center_lat'];
                                                        $center_long = $map['center_long'];
                                                        $zoom = $map['zoom'];
                                                    ?></p>

                                                    <section class="no-padding" id="sec2">
                                                        <div class="map-box">
                                                            <div id="map" style="position: absolute; width: 100%; height: 100%; z-index: 4; "></div>
                                                        </div>
                                                    </section>
                                                    <p><?php echo $map['name']; ?></p>

                                                </div>
                                                <div class="project-box">
                                                    <h3>Info</h3>
                                                    <ul class="project-details">
                                                        <li>
                                                            <i class="fa fa-bicycle"></i>
                                                            <div class="pd-holder">
                                                                <h5>Catégorie : <?php $categories = getAllVgCategorieVoyageById($bdd, $voyage['id']);
                                                                    if (!empty($categories)) {
                                                                        foreach ($categories as $categorie) {
                                                                            $Cat = getVgCategorieById($bdd, $categorie['id_vg_categorie']);
                                                                            echo $Cat['name'] . ", ";
                                                                        }
                                                                    } ?>
                                                                </h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-calendar"></i>
                                                            <div class="pd-holder">
                                                                <h5>Date : <?php echo  date("d/m/Y", strtotime($voyage['date_debut']));  ?> <?php  if(isset($voyage['date_fin'])) {echo "au " . date("d/m/Y", strtotime($voyage['date_fin'])); } ?> </h5>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-map-o"></i>
                                                            <div class="pd-holder">
                                                                <h5>Location : <?php echo $voyage['country'] . " / " . $voyage['city'] ?></h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!-- <a href="#" class=" btn anim-button   trans-btn   transition  fl-l"
                                                       target="_blank"><span>View Project</span><i
                                                                class="fa fa-eye"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Content end  -->
                        <!-- Share container  -->
                        <div class="share-container  isShare"
                             data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>

                    <?php } else {
                        echo ' <div class="content full-height"><i class="fa fa-times-circle"></i> Pas de voyage correspondant à cette URL !</div>';
                    } ?>

                <?php } else {
                    echo '<div class="alert alert-danger" role="alert"><i class="fa fa-times-circle"></i> Erreur de connexion à la base de donnée</div>';
                } ?>
            <?php } else {
                echo "erreur";
            } ?>
        </div>
        <!-- content holder end -->
    </div>
    <!--=============== footer ===============-->
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/footer.php"); ?>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/travels/elements/javascript.php"); ?>


<script>
    var customLabel = {
        restaurant: {
            label: 'R'
        },
        bar: {
            label: 'B'
        }
    };

    function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(<?php echo $center_lat ?>, <?php echo $center_long ?>), zoom: <?php echo $zoom ?>});

        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('./connect.php', function (data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function (markerElem) {
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var lien = markerElem.getAttribute('link');

                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);

                infowincontent.appendChild(document.createElement('br'));
                var link = document.createElement('a');
                link.setAttribute('href',lien);
                link.setAttribute('target','_BLANK');
                link.innerHTML = "Découvrir"
                infowincontent.appendChild(link);


                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    label: icon.label
                });
                marker.addListener('click', function () {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            });
        });
    }


    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDca_YEHG52wujyMx3C_sAalf_5SOXqfY4&callback=initMap">
</script>


</body>
</html>