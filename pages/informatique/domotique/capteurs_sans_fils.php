<?php
$pageArray = array();
$pageArray['title'] = "Capteurs sans fils sur domoticz";
$pageArray['description'] = "Apprenez à configurer et utiliser des capteurs sans fils sur Domoticz";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-toggle-on"></i> <?php echo $pageArray['title'] ?></h1>
        <div class="row">
            <div class="col-md-10">
                <a href="index.php" class="btn btn-info">&larr; Retour au menu</a>
            </div>
            <div class="col-md-2">
                <a href="/" class="btn btn-info">Résumé en fiche</a>
            </div>
        </div>

        <div class="row introduction">
            <div class="col-md-12">
                <h2>Introduction</h2>
                <p>Le choix d'un commutateur peut être compliqué si il doit répondre à des exigences précises ou si la
                    configuration de contact est singulière. </p>
            </div>
        </div>
        <h2>Caractéristiques</h2>

        <p>RFLink est capable de gérer les protocoles 315, 433, 868, 915MHz et 2,4GHz en lui ajoutant différents modules
            récepteurs.</p>
        <p>La liste des périphériques compatibles est <a href="http://www.rflink.nl/blog2/devlist">ici</a>. La liste
            est vraiment importante et grandit au fil du développement du projet. Cela va du carillon de porte au
            détecteur
            de fumée en passant par un multitude d'interrupteurs et stations météo.</p>


        <div class="row menuarticle">
            <ul>
                <li><a href="#linky">Compteur EDF Linky</a></li>
            </ul>
        </div>

        <hr/>
        <!-- RFXCOM -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="linky">Compteur EDF Linky </h3>

                <p>La solution la plus simple, mais aussi la plus onéreuse est d'utiliser le module prêt à l'emploi de
                    RFXCOM.
                    Il suffit de le connecter pour qu'il fonctionne. Il est vendu au prix de 110 euros.
                    <br/><a href="http://www.rfxcom.com/epages/78165469.sf/en_GB/?ObjectPath=/Shops/78165469/Categories">Lien
                        vers le site</a></p>

                <ul>
                    <li><b>1</b></li>
                </ul>

            </div>
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/introduction/rfxcom.png" alt="module RFXCom">
            </div>
        </div>
        <hr/>

        <!-- RFLink Nodo -->
        <div class="row">
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/introduction/rflink_nodo.png" alt="RFLink Nodo">
            </div>
            <div class="col-md-6 ptext">
                <h3 id="rflink_nodo">RFLink </h3>
                <p>RFLink est l'alternative opensource qui fonctionne sur Arduino Mega. Développée par <a
                            href="http://www.nodo-domotica.nl/">Nodo</a>,
                    il est compatible avec la plupart des périphériques 433Hz et Domoticz.</p>
                <p>La carte de transmission RF peut être fabriquée comme dans le paragraphe suivant ou achetée
                    <a href="https://www.nodo-shop.nl/en/rflink-gateway/148-rflink-gateway-components.html">ici</a>
                    pour environ 20 euros. Il faut également ajouter l'antenne a 8 euros <a
                            href="https://www.nodo-shop.nl/en/antennes/102-antenne-433mhz-3dbi-sma-male-met-magneetvoet.html">ici</a>
                </p>
                <p>Le pack complet avec l'arduino et l'antenne est également disponible <a
                            href="https://www.nodo-shop.nl/en/rflink-gateway/159-rflink-arduino-dipool.html">ici</a>
                </p>


            </div>
        </div>

        <hr/>
        <!-- RFLink DIY -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="rflink_diy">RFLink DIY </h3>
                <p>Vous pouvez également construire le RFLink avec un arduino
                    L'usage d'un arduino Méga est nécessaire car le programme à téléverser est très lourd</p>
                <p>L'auteur de <a
                            href="https://projetsdiy.fr/passerelle-radio-domotique-433mhz-rflink-rfxcom-domoticz/">cet
                        article</a>
                    a estimé le coût de fabrication minimal à environ 13€.</p>


            </div>
            <div class="col-md-6 pimage">
                <img class="img-responsive" src="img/commutateurs/type_commutation.png"
                     alt="type commutation interrupteur">
            </div>
        </div>
        <hr/>


    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>