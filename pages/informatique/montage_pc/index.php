<?php
$pageArray = array();
$pageArray['title'] = "Montage PC";
$pageArray['description'] = "Apprenez à monter un PC et choisir les différents composants";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="glyphicon glyphicon-wrench"></i> <?php echo $pageArray['title'] ?></h1>
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
                <p>Une configuration réussie commence par le bon choix des composants.
                    Il faut déterminer tout d’abord l’utilisation (bureautique, home-cinéma, jeu,
                    modélisation 3D) et le budget. </p>
            </div>
        </div>

        <div class="row menuarticle">

            <ul>
                <li><a href="">Constitution d'un PC</a></li>
                <li><a href="#composants">Choix des composants</a>
                    <ul>
                        <li><a href="#processeur">Le processeur</a></li>
                        <li><a href="#cartemere">La carte mère</a></li>
                        <li><a href="#memoire">La mémoire</a></li>
                        <li><a href="#disques">Les disques durs</a></li>
                        <li><a href="#alimentation">L'alimentation</a></li>
                        <li><a href="#boitier">Le boitier</a></li>
                        <li><a href="#autres">Les autres périphériques</a></li>
                    </ul>
                </li>
                <li><a href="#montage">Montage</a></li>
                <li><a href="#configuration">Exemples de Configurations </a></li>
            </ul>
        </div>
        <hr/>
        <h2 id="composants">Choix des composants</h2>
        <!-- Processeur -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3 id="processeur">Le processeur</h3>
                <p>Deux marques dominent dans la fonte de processeurs, AMD et Intel.</p>
                <p>Il existe plusieurs gammes de processeurs pour chaque constructeurs, qui correspondent à des
                    utilisations particulières : Chez Intel,</p>
                <ul>
                    <li><b>Celereon et pentium : </b>processeurs premier prix ; faibles performances.</li>
                    <li><b>I3 :</b> pour la bureautique, le multimédia et le home-cinéma (2 coeurs)</li>
                    <li><b>I5 : </b> pour le jeu, le multimédia (2 et 4 cœurs)</li>
                    <li><b>I7 : </b>pour le jeu avancé, le montage vidéo, la modélisation 3D (4 cœurs)</li>
                    <li><b>Xeon et Opteron :</b> sont destinés à un usage sur des serveurs uniquement.</li>
                </ul>
                <p>Chez AMD, </p>
                <ul>
                    <li><b>gamme : </b>.</li>
                </ul>
                <p>Pour comparer un processeur, dans une même gamme, il faut se référer aux benchmarks (tests des
                    processeurs dans des conditions équivalentes, afin d’en comparer leurs performances) et aux conseils
                    associés.
                    Il est parfois plus intéressant de prendre un i5 haut de gamme qu’un i7 d’entrée de gamme.</p>
                Le nombre de cœur conditionne également la vitesse du processeur, car c’est sa capacité à effectuer des
                opérations en parallèle.
                <p>Le socket correspond au type de connecteur utilisé pour connecter le processeur à la carte mère.
                    L’architecture des processeurs évolue au fil des années, et de nouveaux sockets apparaissent :</p>
                <ul>
                    <li><b>Socket 1151 :</b> pour l’architecture Kabylake et Skylake</li>
                    <li><b>Socket 1150 :</b> pour l’architecture Haswell ( Processeurs Intel 2013 )</li>
                    <li><b>Socket 1155 :</b> pour l’architecture IvyBridge / SandyBridge ( Processeurs Intel 2011/2012 )
                    </li>
                    <li><b>Socket 2011 :</b> pour l’architecture IvyBridge-E ( Processeurs haut de gamme Intel 2012/2013
                        )
                    </li>
                </ul>
                <p>On choisit donc un processeur suivant sa gamme et en fonction de l’utilisation finale du PC.</p>

                <p>Il existe deux types de conditionnement, en boîte, comme son nom l'indique livré dans un carton avec
                    un ventirad
                    et OEM, pour lequel le processeur est livré dans un blister sans ventirad. La garantie est égalemen
                    limitée pour les processeurs OEM.</p>


                <div class="alert alert-success" role="alert">
                    <div class="row">
                        <div class="col-md-1"><i class="glyphicon glyphicon-euro fa-4x"></i></div>
                        <div class="col-md-11">
                            <ul>
                                <li><b>Entrée de gamme :</b> moins de 100 euros</li>
                                <li><b>Milieu de gamme :</b> de 100 à 200 euros</li>
                                <li><b>Haut de gamme :</b> plus de 200 euros</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/processeur.png" alt="Processeur">
            </div>
        </div>
        <hr/>
        <!-- Carte mère -->
        <div class="row">
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/carte_mere.png" alt="Carte mère">
            </div>
            <div class="col-md-8 ptext">
                <h3 id="cartemere">La carte mère</h3>
                <p>Composant central d’un PC, sa qualité n’est pas à négliger. Il faut choisir sa carte mère en fonction
                    de l’utilisation finale de la machine. </p>
                <ul>
                    <li><b> Bureautique et home-cinéma :</b> (navigation web, traitement de texte…), une carte mère
                        d’entrée de gamme suffit amplement.
                        Pour le home-Cinéma, on privilégiera une carte mère de petite taille, afin de se loger dans un
                        boitier adapté à cette utilisation. Prêter attention à la qualité des sorties audio si vous ne
                        souhaitez pas utiliser de carte son dédiée.
                        Socket 1155 et FM2+ chez AMD.
                    <li><b>Besoins de performances et jeu :</b> Socket 1151 avec chipset Z97. Les interfaces sont
                        nombreuses, avec le support de l’USB3, plusieurs supports pour ajouter de la RAM, présence de 2
                        interface réseau…
                    <li><b>Pour le jeu avancé et performances accrues : </b> (montage vidéo, modélisation 3D…) Socket
                        1151 et 2011-3 (support de la DDR4) et AM3+ pour AMD.
                </ul>
                </p>
                <b>Formats :</b>
                <ul>
                    <li><b> ATX :</b> fait 305x244mm et accueille un connecteur AGP (pour les cartes graphiques) / 6
                        emplacements PCI
                    </li>
                    <li><b> micro-ATX :</b> fait 244x244mm et accueille un connecteur AGP + 3 emplacements PCI</li>
                    <li><b> FlexATX :</b> fait 229x191mm, un connecteur AGP + 2 emplacements PCI</li>
                    <li><b> mini-ATX :</b> fait 284x208mm, un connecteur AGP + 4 emplacements PCI</li>
                    <li><b>mini-ITX :</b> fait 170x170mm et propose un emplacement PCI</li>
                    <li><b> nano-ITX :</b> fait 120x120mm et un emplacement mini PCI</li>
                    <li><b> BTX :</b> fait 325x267mm et assure 7 connecteurs</li>
                    <li><b> micro-BTX :</b> fait 264x267mm et offre 4 connecteurs</li>
                    <li><b> pico-BTX :</b> fait 203x267mm pour un connecteur</li>
                </ul>
                </p>

                <div class="alert alert-success" role="alert">
                    <div class="row">
                        <div class="col-md-1"><i class="glyphicon glyphicon-euro fa-4x"></i></div>
                        <div class="col-md-11">
                            <ul>
                                <li><b>Entrée de gamme :</b> entre 50 et 80 euros</li>
                                <li><b>Milieu de gamme :</b> entre 80 et 150 euros</li>
                                <li><b>Haut de gamme :</b> plus de 150 euros</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <hr/>

        <!-- Mémoire -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3 id="memoire">La mémoire</h3>
                <p>Choisir la mémoire en fonction de la fréquence et du type supporté par la carte mère. Pour les PC
                    fixes le format est toujours Dimm et SoDimm pour les portables sauf rares exceptions.</p>
                <p> Les cartes mères travaillant en double canal, il est plus performant d’opter pour 2*2Go que pour une
                    seule barrette de 8Go.</p>
                <p><i class="fa fa-check"></i> <b>Le type de mémoire</b> est le critère essentiel, car les différents
                    types de DDR sont totalement incompatibles physiquement et électroniquement. Il est donc choisi en
                    fonction de la carte mère.
                <ul>
                    <li><b>DDR3 :</b>type le plus utilisé (DDR3L existe mais rare, utilise 1.35v au lieu de 1.5v pour
                        diminuer la consommation.)
                    </li>
                    <li><b>DDR4 :</b>nouveau type de mémoire encore coûteux</li>
                </ul>

                <p> Pour une configuration multimédia et bureautique, 8Go suffisent, alors que pour le jeu et le montage
                    vidéo ou encore la modélisation 3D, 16Go sont confortables, voire 32Go pour des performances
                    accrues.</p>

                <p><i class="fa fa-check"></i> <b>La fréquence :</b> De la PC 19200 (2400 MHz) est passe partout et
                    fonctionnera quel que soit le chipset de la carte mère. La fréquence ne doit pas être inférieure
                    celle de la carte mère, sinon il y a risque d’instabilité. En cas de fréquence supérieure, celle-ci
                    sera bornée par la fréquence de la carte mère.</p>

                <p><i class="fa fa-check"></i> <b>La quantité :</b>
                <ul>
                    <li><b>2*2 Go :</b> (il faut toujours un kit dual channel) pour les moins fortunés. Tous les jeux
                        passeront mais peut-être avec quelques petits ralentissement. En bureautique simple c'est aussi
                        suffisant.
                    </li>
                    <li><b>2*4 Go :</b> plus aucun problème dans les jeux, même les plus gourmands. Très bien en
                        multimédia classique et en bureautique avancée.
                    </li>
                    <li><b>2*8 Go :</b> est pour nous la quantité optimale. De la CAO au jeu en passant par le
                        multitâche intensif.
                    </li>
                    <li><b> 2*16 Go :</b> est souvent le maximum accepté par les cartes mères ne trouveront leur place
                        que pour la CAO 3D et traitement parallèle de plusieurs images ou retouche photographique
                        professionnelle par lot de plus de 25 images format RAW (situation peu probable).
                    </li>
                </ul>
                </p>

                <p><i class="fa fa-check"></i> <b>La certification :</b>
                <ul>
                    <li><b>Ecc :</b> fonctionnement sur 72 bits au lieu de 64bits, et possibilité de détection et
                        correction d’erreurs obtenu par l’ajout d’un chip mémoire.
                    </li>
                    <li><b> Registered :</b>Barrette mémoire sur laquelle a été ajoutée un PLL et des registres pour
                        gérer les signaux de commande et d’horloge à la place du north bridge et ainsi avoir la
                        possibilité d’utiliser des barrettes de plus grande capacité ou en plus grand nombre.
                    </li>
                    <li><a href="http://www.x86-secret.com/articles/ram/ddreccreg/ddreccreg-2.htm">Plus
                            d'informations</a></li>
                </ul>

                </p>


                <div class="alert alert-success" role="alert">
                    <div class="row">
                        <div class="col-md-1"><i class="glyphicon glyphicon-euro fa-4x"></i></div>
                        <div class="col-md-11">
                            <ul>
                                <li><b>Entrée de gamme :</b> moins de 100 euros</li>
                                <li><b>Milieu de gamme :</b> de 100 à 200 euros</li>
                                <li><b>Haut de gamme :</b> plus de 200 euros</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/memoire.png" alt="Mémoire PC">
            </div>
        </div>
        <hr/>

        <!-- Disques -->
        <div class="row">
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/disque_dur.png" alt="Disque dur stockage">
            </div>
            <div class="col-md-8 ptext">
                <h3 id="disques">Les disques</h3>
                <p><i class="fa fa-check"></i> <b>Le SSD :</b> un disque SSD se décline en plusieurs formats :</p>
                <ul>
                    <li><b>2,5 pouces :</b> format standard pour les PC fixes et portables (faire attention à
                        l’épaisseur dans le cas de remplacement d’un disque de portable).
                    </li>
                    <li><b>mSATA et M.2 :</b> format pour gain de place utilisé dans les PC portables, mais n’est pas
                        plus performant que le SATA. Pour le M.2, le débit maximal est de 550 Mo/s PCIe X2 (sur deux
                        voies) atteignait 1 Go/s de débit
                    </li>
                    <li><b>PCI Express :</b> disque au format carte d’extension, un SSD PCIe 3 X4 est un engin capable
                        d’encaisser quasiment 4 Go/s.
                    </li>
                </ul>

                <p><i class="fa fa-check"></i> <b>HDD :</b> Le HDD est actuellement préféré pour le stockage de données,
                    car le prix au Go est dérisoire, et les cycles de lecture/écriture infinis.</p>
                <p> Pour le choix d’un disque HDD, il faut calculer l’espace nécessaire au stockage des fichiers en
                    prévoyant une assez grande marge. Un disque d’un To est généralement suffisant
                    et peu couteux. <br/>
                    Dans ce cas, la différence de rapidité entre les modèles est négligeable, et il faut privilégier la
                    fiabilité. Généralement, les disques WD connaissent un taux de panne très faible.<br/>
                    Il faut bien choisir le modèle en fonction de son utilisation. En effet les disques d’un NAS ou d’un
                    média center doivent être prévus pour tourner 24/24h et 7/7j (WD RED). <br/>
                    Pour une utilisation classique, les WD blue sont un bon choix.
                </p>


                <p><i class="fa fa-check"></i> <b>Capacité :</b></p>
                <p> Généralement, un ssd est utile pour le système d’exploitation et améliorer sa rapidité d’exécution.
                    Il faut prendre en compte que sur un disque de 120Go par exemple on ne pourra exploiter
                    que 110Go après l’avoir formaté.<br/>
                    Le dossier d’installation de windows 10 prend environ 20 Go, le fichier de swap prend un espace égal
                    à la moitié de la RAM, plus le fichier servant à la mise en veille prolongée du pc
                    représentant 75% de la RAM.<br/>
                    <b>120Go est donc le minimum </b> (Il faudra tout de même ajouter un HDD pour les documents).<br/>
                    Il est peu recommandé d’utiliser un disque ssd pour stocker des fichiers recevant des modifications
                    et déplacement fréquents pour minimiser les cycles de lecture/écriture qui sont limités.
                    Cependant, dans le cas d’une utilisation normale, le disque peut durer largement 10ans.<br/>
                    Dans certains cas, notamment pour le traitement de fichier RAW très lourds, et si le budget le
                    permet, il est possible de prévoir un espace supplémentaire pour stocker ces fichiers. </p>

            </div>

        </div>
        <hr/>

        <!-- Alimentation -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3 id="alimentation">L'alimentation</h3>
                <p>L’alimentation est l’une des pièces les plus importantes d’un PC. Afin de garantir sa longévité, elle
                    doit être de bonne qualité et dotée d’une puissance adaptée.<br/>
                    Une alimentation bas de gamme, sera bruyante, consommera et chauffera plus, du fait de son faible
                    rendement, et fournira une tension dont la stabilité est approximative, ce qui pourra abîmer les
                    composants du PC.
                    Il faut également bannir les alimentations déjà intégrées aux boitiers qui sont généralement de
                    piètre qualité.</p>

                <p><i class="fa fa-check"></i> <b>Le SSD :</b> un disque SSD se décline en plusieurs formats :</p>
                <ul>
                    <li><b>Format ATX :</b> format le plus courant</li>
                    <li><b>Format SFX :</b> format pour les plus petits boitiers.</li>
                    <li><b>Format TFX :</b> pour les anciens PC professionnels dotés de petits boitiers.</li>
                </ul>

                <p><i class="fa fa-check"></i> <b>Puissance :</b> Il faut choisir la puissance en fonction de la
                    consommation de tous les composants du PC, en conservant une marge pour le upgrades,
                    et en ne sur dimensionnant pas trop pour ne pas perdre en rendement.
                    Voici un configurateur qui vous permettra de calculer la puissance nécessaire à votre configuration,
                    sachant que l’efficacité d’une alimentation se situe à 50-60% de sa charge maximale :<br/>
                    <a href="http://www.bequiet.com/fr/psucalculator" target="_blank"></a> Be Quiet</p>
                <ul>
                    <li><b>Format ATX :</b> format le plus courant</li>
                    <li><b>Format SFX :</b> format pour les plus petits boitiers.</li>
                    <li><b>Format TFX :</b> pour les anciens PC professionnels dotés de petits boitiers.</li>
                </ul>

                <p><i class="fa fa-check"></i> <b>Connectique :</b> Il convient de vérifier sur la fiche de
                    l’alimentation si elle est munie d’un nombre suffisant de connecteurs pour votre configuration
                    (cartes graphiques, disques durs…), ce qui est généralement le cas.
                    Certaines alimentations sont modulaires, ce qui permet d’éliminer les câbles inutiles et améliorer
                    la circulation de l’air dans le boîtier.</p>

                <p><i class="fa fa-check"></i> <b>Certification :</b> En général les alimentations des marques Be Quiet,
                    corsair ou seasonic sont un gage de qualité, avec un petit plus pour Be quiet.<br/>
                    La certification représente la qualité de l’alimentation, et surtout son rendement, c’est-à-dire sa
                    capacité à fournir l’énergie en composants du PC avec un minimum de pertes. Il existe 5 niveaux de
                    certifications :</p>
                <ul>
                    <li><b>Alimentation 80 Plus Bronze :</b> environ 85% de rendement à 50% de charge</li>
                    <li><b>Alimentation 80 Plus Argent :</b> environ 88% de rendement à 50% de charge</li>
                    <li><b>Alimentation 80 Plus Or :</b> environ 90% de rendement à 50% de charge</li>
                    <li><b>Alimentation 80 Plus Platinum :</b> environ 94% de rendement à 50% de charge</li>
                    <li><b>Alimentation 80 Plus Titanium :</b> environ 96% de rendement à 50% de charge</li>
                </ul>


            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/alimentation1.png" alt="Processeur">
                <img class="img-responsive" src="img/alimentation2.png" alt="Processeur">
            </div>
        </div>
        <hr/>

        <!-- Boitier -->
        <div class="row">
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/boitier.png" alt="Boitier">
            </div>
            <div class="col-md-8 ptext">
                <h3 id="boitier">Le boitier</h3>
                <p>Le premier critère de choix, est la taille du boitier, qui doit contenir tous les éléments. Il faut
                    vérifier :
                    que le format de la carte mère est supporté et que le nombre de baies pour les disques et lecteurs
                    est suffisant
                    Les boitiers avec alimentation intégrées sont à bannir car celle-ci est de piètre qualité.
                    On choisira ensuite le boitier en fonction de la place disponible, du budget et de son design.

                </p>
            </div>

        </div>
        <hr/>

        <!-- Refroidissement -->
        <div class="row paragraph">
            <div class="col-md-8 ptext">
                <h3 id="refroidissement">Refroidissement</h3>
                <p>Le principal élément chauffant dans un ordinateur est le processeur, il faut donc un élément capable
                    d’éliminer efficacement cette chaleur. C’est le ventirad.
                    Généralement, le ventirad fourni avec le processeur est bruyant et peu performant. Il est préférable
                    de le remplacer par un modèle plus efficace.
                    Be quiet et Noctua sont des références en terme de qualité, d’efficacité et de silence.


            </div>
            <div class="col-md-4 pimage">
                <img class="img-responsive" src="img/radiateur.png" alt="Radiateur PC">
            </div>
        </div>
        <hr/>


        <!--    Emplacement
            Il est recommandé de ne pas placer votre boitier au niveau du sol pour éviter la poussière, sauf si vous l’équipez de filtres et le dépoussiérez régulièrement.
            Eviter également les variations de températures et l’ensoleillement direct.
            Le minimum de protection est le branchement sur une prise dotée de protection contre les surtensions.
            Le must consiste à utiliser un onduleur, qui protègera contre les surtensions et coupures de courant.



            Montage dans le boitier
            Alimentation
            Une alimentation se place soit en haut ou en bas du boitier suivant la configuration du boitier.
            Si elle est en fond de boitier, Il est recommandé de placer l’alimentation de telle sorte qu’elle aspire l’air par le fond (il y a souvent une grille au fond du boitier), pour éviter d’aspirer l’air chaud des autres composants.
          -->

    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>
</body>
</html>