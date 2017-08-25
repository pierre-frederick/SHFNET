<?php
$pageArray = array();
$pageArray['title'] = "Introduction à Domoticz";
$pageArray['description'] = "Découvrez la domotique facile avec domoticz.";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-dedent"></i> <?php echo $pageArray['title'] ?></h1>
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
                <li><a href="#rfxcom">Solution Rfxcom</a></li>
                <li><a href="#rflink_nodo">Solution RFLink Nodo</a></li>
                <li><a href="#rflink_diy">Solution RFLink DIY</a></li>
            </ul>
        </div>

        <hr/>
        <!-- RFXCOM -->
        <div class="row paragraph">
            <div class="col-md-6 ptext">
                <h3 id="rfxcom">RFXCOM </h3>

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


        <p>Il faut ensuite télécharger la <a href="http://www.rflink.nl/blog2/download">Dernière version de RFLink</a>
            et
            décompresser le zip.</p>
        <ol>
            <li>Connecter via USB l'arduino du RFLink à l'ordinateur.</li>
            <li>Lancer ensuite l'application <b>RFLinkLoader.exe</b></li>
            <li>Cliquer sur <b>Select File</b> et choisir le fichier <b>rflink.ino.hex</b></li>
            <li>Cliquer sur <b>Scan Available Ports</b> puis choisir le port série de l'arduino.</li>
            <li>Cliquer sur <b>Upload Firmware to device</b> et le téléchargement commence (environ 1 minute).</li>
        </ol>
        <p>Si le programme ne rencontre pas d'erreur, <b>Programming successful</b> devrait s'afficher.</p>
        <p>En cliquant sur <b>Serial Port Logging</b> le RFlink commence a reçevoir et décoder les signaux RF a
            proximité.
            Si rien ne s'affiche, il y a probablement un problème au niveau du récepteur RF, et de sa connexion.</p>
        <p>Voici un exemple de message envoyé par le RFLink :</p>
        <pre><code class="language-bash">10;NewKaku;0cac142;3;ON;</code></pre>


        <h2>Détails sur le protocole RFLink</h2>

        <p>Les données sont envoyées par liaison série à l'ordinateur (via USB) sous forme de texte, à 57600 bauds. </p>
        <p><b>Structure des paquets reçus via RF :</b></p>
        <ul>
            <li><b>20 :</b> 20 est siginifie réception, 10 signifie émission, et 11 entre deux devices.</li>
            <li><b>; :</b> séparateur.</li>
            <li><b>02 :</b> compteur de paquet de 00 à FF.</li>
            <li><b>NAME :</b> Nom du protocole .</li>
            <li><b>ID=9999 :</b> ID du device (hexadécimal).</li>
            <li><b>LABEL=data :</b> champs de commandes pouvant être multiple. Par exemple : SWITCH =1</li>
        </ul>

        <p><b>Structure des paquets émis (du RFLink) via RF :</b> les messages sont envoyés sans libellé
            (10;X10;000045;1;OFF)</p>
        <ul>
            <li><b>10 :</b>10 signifie émission</li>
            <li><b>X10 :</b>protocole</li>
            <li><b>000045 :</b>ID de l'appareil</li>
            <li><b>1 :</b>bouton 1</li>
            <li><b>OFF :</b>action à effectuer</li>
        </ul>

        <p> Il existe également des commandes utilisées pour des opérations de maintenance et qui peuvent être envoyées
            depuis
            l'ordinateur ou domoticz :</p>

        <ul>
            <li><b>10;REBOOT; :</b>redémarre la plate-forme</li>
            <li><b>10;PING; :</b>vérifier l'état de la plateforme, réponse <b>20;99;PONG;</b></li>
            <li><b>10;VERSION; :</b>renvoie la version et le numéro de build, réponse <b>20;99;"version";</b></li>
            <li><b>10;RFDEBUG=ON; :</b>active ou désactive (OFF) l'affichage des paquets RF, réponse <b>20;99;RFDEBUG="state";</b>
            </li>
            <li><b>10;RFUDEBUG=ON; :</b>active ou désactive (OFF) le décodage des paquets RF, réponse <b>20;99;RFUDEBUG="state";</b>
            </li>
            <li><b>10;QRFDEBUG=ON; :</b>active ou désactive (OFF) le décodage rapide des paquets RF, réponse <b>20;99;QRFDEBUG="state";</b>
            </li>
            <li><b>10;RTSCLEAN; :</b>réinitialise la table des codes stockés sur l'EEPROM interne</li>
            <li><b>10;RTSCLEAN; :</b>réinitialise la table des codes stockés sur l'EEPROM interne</li>
            <li><b>10;RTSRECLEAN=x; :</b>efface le code x (de 0 à 15) stocké sur l'EEPROM interne</li>
            <li><b>10;RTSSHOW; :</b>affiche les codes stockés sur l'EEPROM interne</li>
        </ul>
        <p>des informations supplémentaires sont disponible sur le <a href="http://www.rflink.nl/blog2/protref">site du
                projet</a></p>


        <h2>Connexion d'un RFLink à Domoticz sur Raspberry Pi</h2>

        <div class="alert alert-warning">
            <strong>Attention</strong> Si vous souhaitez alimenter le RFLink via son port USB connecté au Raspi, il
            faudra
            utiliser une alimentation pour le Raspi délivrant au moins 3A, sinon utiliser un bloc secteur pour alimenter
            l'arduino.
        </div>

        <p>

        </p>
        <div class="alert alert-danger">
            <strong>Attention</strong> Une erreur dans la déclaration du port USB du RFLink pourra entraîner un blocage
            du
            Raspberry Pi et le rendre inutilisable. Seul un formatage permet de le récupérer facielement. <br>
            Pour ne pas en arriver là, sauvegarder l'installation de domoticz avant de configurer le RFLink, et assurez
            vous de bien choisir le bon port.
        </div>

        Afin que le raspberry pi détecte bien le RFLink, exécuter les commandes suivantes :
        <pre><code class="language-bash">sudo service domoticz.sh stop
dmesg -s 1024
sudo service domoticz.sh start</code></pre>
        <p> La commande <code class="language-bash">dmesg -s 1024</code> permet de lister les périphériques USB
            connectés au Raspi. Le RFLink devrait avoir comme nom <code class="language-bash">ttyACM0</code>.</p>
        <p>Redémarrer ensuite le service domoticz.</p>
        <pre><code class="language-bash">sudo service domoticz.sh start</code></pre>


    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>