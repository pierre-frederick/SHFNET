<?php
$pageArray = array();
$pageArray['title'] = "Bootstrap";
$pageArray['description'] = "Développez rapidement vos pages web avec bootstrap";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $pageArray['title'] ?></h1>
        <div class="row">
            <div class="col-md-10">
                <!--<a href="index.php" class="btn btn-info">&larr; Retour au menu</a>-->
            </div>
            <div class="col-md-2">
                <a href="/" class="btn btn-info">Résumé en fiche</a>
            </div>
        </div>


        <div class="row introduction">
            <div class="col-md-12 content">
                <div class="row">

                    <p><b>Icônes : </b> moteur de recherche d'icônes <a href="https://glyphsearch.com/" target="_blank">ici</a>

                    <hr/>

                    <!-- DROPDOWN -->
                    <p><b>Dropdown : </b> élément déroulant vers le bas pouvant être vers le haut avec <code
                                class="language-css">class="dropup"</code> au lieu de <code class="language-css">class="dropdown"</code>
                    </p>
                    <div class="row">
                        <div class="col-md-8">
                            <pre><code class="language-html">
&lt;div class="dropdown"&gt;
    &lt;button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"&gt;
        Dropdown
        &lt;span class="caret"&gt;&lt;/span&gt;
    &lt;/button&gt;
    &lt;ul class="dropdown-menu" aria-labelledby="dropdownMenu1"&gt;
        &lt;li class="dropdown-header"&gt;Dropdown header&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Action&lt;/a&gt;&lt;/li&gt;
        &lt;li class="disabled"&gt;&lt;a href="#"&gt;Another action&lt;/a&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Something else here&lt;/a&gt;&lt;/li&gt;
        &lt;li role="separator" class="divider"&gt;&lt;/li&gt;
        &lt;li&gt;&lt;a href="#"&gt;Separated link&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
&lt;/div&gt;
                                </code></pre>
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Dropdown
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li class="dropdown-header">Dropdown header</li>
                                    <li><a href="#">Action</a></li>
                                    <li class="disabled"><a href="#">Another action</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END DROPDOWN -->


                </div>

            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>
</body>
</html>