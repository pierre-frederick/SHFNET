<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Montage PC shfnet">
    <meta name="author" content="Pierre-Frédérick DENYS">
    <title>Montage PC</title>
    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/custom/css/flexslider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/assets/custom/css/parallax-slider.css" type="text/css">
    <!-- CSS Template -->
    <link href="/assets/custom/css/business-plate.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans" >
    <link href="/assets/custom/css/shfnet.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <script src="https://use.fontawesome.com/da91765651.js"></script>
</head>

  <body>
      <?php include($_SERVER['DOCUMENT_ROOT']."/elements/header.php"); ?>


      <div class="container">
          <div class="article">
              <h1 class="title"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>  Montage PC</h1>

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
                  <li> <a href="#composants">Choix des composants</a>
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

              <h2 id="composants"></h2>
              <!-- Processeur -->
              <div class="row paragraph">
                  <div class="col-md-8 ptext">
                      <h3 id="processeur">Le processeur</h3>
                      <p>Deux marques dominent dans la fonte de processeurs, AMD et Intel. </p>
                      <p>Il existe plusieurs gammes de processeurs pour chaque constructeurs, qui correspondent à des utilisations particulières : Chez Intel,</p>
                          <ul>
                              <li> Celereon et pentium : processeurs premier prix ; faibles performances.</li>
                              <li>I3 : pour la bureautique, le multimédia et le home-cinéma (2 coeurs)</li>
                              <li>I5 pour le jeu, le multimédia (2 et 4 cœurs)</li>
                              <li>I7 pour le jeu avancé, le montage vidéo, la modélisation 3D  (4 cœurs)</li>
                              <li>Les processeurs Xeon et Opteron sont destinés à un usage sur des serveurs uniquement.</li>
                          </ul>

                      <p>Pour comparer un processeur, dans une même gamme, il faut se référer aux benchmarks (tests des processeurs dans des conditions équivalentes, afin d’en comparer leurs performances) et aux conseils associés.
                          Il est parfois plus intéressant de prendre un i5 haut de gamme qu’un i7 d’entrée de gamme.</p>
                          Le nombre de cœur conditionne également la vitesse du processeur, car c’est sa capacité à effectuer des opérations en parallèle.
                      <p>Le socket correspond au type de connecteur utilisé pour connecter le processeur à la carte mère. L’architecture des processeurs évolue au fil des années, et de nouveaux sockets apparaissent :</p>
                      <ul>
                          <li>socket 1151 pour l’architecture Kabylake et  Skylake</li>
                          <li>1150 = Haswell ( Processeurs Intel 2013 )</li>
                          <li>1155 = IvyBridge / SandyBridge ( Processeurs Intel 2011/2012 )</li>
                          <li>2011 = IvyBridge-E ( Processeurs haut de gamme Intel 2012/2013 )</li>
                      </ul>
                      <p>On choisit donc un processeur suivant sa gamme et en fonction de l’utilisation finale du PC.</p>

                      <p>Prix :</p> Il existe deux types de conditionnement, en boîte, comme son nom l'indique livré dans un carton avec un ventirad
                      et OEM, pour lequel le processeur est livré dans un blister sans ventirad. La garantie est égalemen limitée pour les processeurs OEM.


                      <div class="alert alert-success" role="alert">

                          <ul>
                              <li>Entrée de gamme : moins de 100 euros</li>
                              <li>Milieu de gamme : de 100 à 200 euros</li>
                              <li>Haut de gamme : plus de 200 euros</li>
                          </ul>
                      </div>

                  </div>
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/processeur1.jpg" alt="Processeur">
                      <img class="img-responsive" src="img/processeur2.jpg" alt="Processeur">
                  </div>
              </div>
              <hr />
              <!-- Carte mère -->
              <div class="row">
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/recup_condensateurs.jpg" alt="Récupération condensateurs">
                  </div>
                  <div class="col-md-8 ptext">
                      <h3 id="cartemere">Les condensateurs</h3>
                      <p>Composant central d’un PC, sa qualité n’est pas à négliger. Il faut choisir sa carte mère en fonction de l’utilisation finale de la machine.
                          Bureautique et home-cinéma Entrée de gamme entre 50€ et 100€
                          Pour la bureautique (navigation web, traitement de texte…), une carte mère d’entrée de gamme suffit amplement
                          Pour le home-Cinéma, on privilégiera une carte mère de petite taille, afin de se loger dans un boitier adapté à cette utilisation. Prêter attention à la qualité des sorties audio si vous ne souhaitez pas utiliser de carte son dédiée.
                          Socket 1155 et FM2+ chez AMD
                          Besoins de performances et jeu : Milieu de gamme Entre 80 et 100€
                          Socket 1151 avec chipset Z97
                          Les interfaces sont nombreuses, avec le support de l’USB3, plusieurs supports pour ajouter de la RAM, présence de2 interface réseau…
                          Pour le jeu avancé et performances accrues (montage vidéo, modélisation 3D…)
                          150€ et plus. Socket 1151 et 2011-3 (support de la DDR4) et AM3+ pour AMD

                          Format
                          •  Un standard ATX présente les dimensions suivantes 305x244mm et accueille un connecteur AGP (pour les cartes graphiques) / 6 emplacements PCI
                          •  Un standard micro-ATX fait 244x244mm et accueille un connecteur AGP + 3 emplacements PCI
                          •  Un standard FlexATX propose 229x191mm, un connecteur AGP + 2 emplacements PCI
                          •  Un standard mini-ATX aura 284x208mm, un connecteur AGP + 4 emplacements PCI
                          •  Un standard mini-ITX fait 170x170mm et propose un emplacement PCI
                          •  Un standard nano-ITX présente 120x120mm et un emplacement mini PCI
                          •  Un standard BTX assure 7 connecteurs pour des dimensions de 325x267mm
                          •  Un standard micro-BTX offre 4 connecteurs pour 264x267mm
                          •  Un standard pico-BTX dispose de 203x267mm pour un connecteur
                      </p>
                  </div>

              </div>
              <hr />

              <!-- Mémoire -->
              <div class="row paragraph">
                  <div class="col-md-8 ptext">
                      <h3 id="memoire">La mémoire</h3>
                      <p>Choisir la mémoire en fonction de la fréquence et du type supporté par la carte mère.
                          Pour les PC fixes le format est toujours Dimm et SoDimm pour les protables sauf rares exceptions.


                          Les cartes mères travaillant en double canal, il est plus performant d’opter pour 2*2Go que pour une seule barrette de 8Go.
                          Le type de mémoire est le critère essentiel, car les différents types de DDR sont totalement incompatibles physiquement et électroniquement. Il est donc choisi en fonction de la carte mère.
                          La DDR3 : type le plus utilisé (DDR3L existe mais rare, utilise 1.35v au lieu de 1.5v pour diminuer la consommation.
                          DD4 : nouveau type de mémoire encore couteux


                          Pour une configuration multimédia et bureautique, 8Go suffisent, alors que pour le jeu et le montage vidéo ou encore la modélisation 3D, 16Go sont confortables, voire 32Go pour des performances accrues.

                          - Sa fréquence: De la PC 19200 (2400 MHz) est passe partout et fonctionnera quel que soit le chipset de la carte mère. La fréquence ne doit pas être inférieure celle de la carte mère, sinon il y a risque d’instabilité. En cas de fréquence supérieure, celle-ci sera bornée par la fréquence de la carte mère.

                          - Sa quantité:
                          . 2*2 Go (il faut toujours un kit dual channel) pour les moins fortunés. Tous les jeux passeront mais peut-être avec quelques petits ralentissement. En bureautique simple c'est aussi suffisant.
                          . 2*4 Go plus aucun problème dans les jeux, même les plus gourmands. Très bien en multimédia classique et en bureautique avancée.
                          . 2*8 Go est pour nous la quantité optimale. De la CAO au jeu en passant par le multitâche intensif.
                          . 2*16 Go est souvent le maximum accepté par les cartes mères ne trouveront leur place que pour la CAO 3D et traitement parallèle de plusieurs images ou retouche photographique professionnelle par lot de plus de 25 images format RAW (situation peu probable).

                          Ecc : fonctionnement sur 72 bits au lieu de 64bits, et possibilité de détection et correction d’erreurs obtenu par l’ajout d’un chip mémoire.
                          Registered :
                          Barrette mémoire sur laquelle a été ajoutée un PLL et des registres pour gérer les signaux de commande et d’horloge à la place du north bridge et ainsi avoir la possibilité d’utiliser des barrettes de plus grande capacité ou en plus grand nombre.
                          http://www.x86-secret.com/articles/ram/ddreccreg/ddreccreg-2.htm



                      <div class="alert alert-success" role="alert">

                          <ul>
                              <li>Entrée de gamme : moins de 100 euros</li>
                              <li>Milieu de gamme : de 100 à 200 euros</li>
                              <li>Haut de gamme : plus de 200 euros</li>
                          </ul>
                      </div>

                  </div>
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/processeur1.jpg" alt="Processeur">
                      <img class="img-responsive" src="img/processeur2.jpg" alt="Processeur">
                  </div>
              </div>
              <hr />

              <!-- Disques -->
              <div class="row">
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/recup_condensateurs.jpg" alt="Récupération condensateurs">
                  </div>
                  <div class="col-md-8 ptext">
                      <h3 id="disques">Les disques</h3>
                      <p>Le ssd  :
                          Le format
                          2,5 pouces. (faire attention à l’épaisseur dans le cas de remplacement d’un disque de portable).
                          mSATA et M.2: pour les pc portables
                          M .2 : format pour gain de place, mais n’est pas plus performant que le SATA.
                          le débit maximal est de 550 Mo/s PCIe X2 (sur deux voies) atteignait 1 Go/s de débit
                          PCI Express : disque au format carte d’extension, 984 M0/s SSD PCIe 3 X4 un engin capable d’encaisser quasiment 4 Go/

                          Capacité
                          Généralement, un ssd est utile pour le système d’exploitation et améliorer sa rapidité d’exécution. Il faut prendre en compte que sur un disque de 120Go par exemple on ne pourra exploiter que 110Go après l’avoir formaté.
                          Le dossier d’installation de windows 10 prend environ 20 Go, le fichier de swap prend un espace égal à la moitié de la RAM, plus le fichier servant à la mise en veille prolongée du pc représentant 75% de la RAM.
                          120Go est donc le minimum (Il faudra tout de même ajouter un HDD pour les documents).
                          Il est peu recommandé d’utiliser un disque ssd pour stocker des fichiers recevant des modifications et déplacement fréquents pour minimiser les cycles de lecture/écriture qui sont limités. Cependant, dans le cas d’une utilisation normale, le disque peut durer largement 10ans.
                          Dans certains cas, notamment pour le traitement de fichier RAW très lourds, et si le budget le permet, il est possible de prévoir un espace supplémentaire pour stocker ces fichiers.

                          Le HDD est actuellement préféré pour le stockage de données, car le prix au Go est dérisoire, et les cycles de lecture/écriture infinis.
                          Pour le choix d’un disque HDD, il faut calculer l’espace nécessaire au stockage des fichiers en prévoyant une assez grande marge. Un disque d’un To est généralement suffisant et peu couteux.
                          Dans ce cas, la différence de rapidité entre les modèles est négligeable, et il faut privilégier la fiabilité. Généralement, les disques WD connaissent un taux de panne très faible. Il faut bien choisir le modèle en fonction de son utilisation. En effet les disques d’un NAS ou d’un média center doivent être prévus pour tourner 24/24h et 7/7j (WD RED). Pour une utilisation classique, les WD blue sont un bon choix.

                      </p>
                  </div>

              </div>
              <hr />

              <!-- Alimentation -->
              <div class="row paragraph">
                  <div class="col-md-8 ptext">
                      <h3 id="alimentation">L'alimentation</h3>
                      <p>L’alimentation est l’une des pièces les plus importantes d’un PC. Afin de garantir sa longévité, elle doit être de bonne qualité et dotée d’une puissance adaptée.
                          Une alimentation bas de gamme, sera bruyante, consommera et chauffera plus, du fait de son faible rendement, et fournira une tension dont la stabilité est approximative, ce qui pourra abîmer les composants du PC.
                          Il faut également bannir les alimentations déjà intégrées aux boitiers qui sont généralement de piètre qualité.
                          Format
                          Format ATX : format le plus courant
                          Format SFX : format pour les plus petits boitiers.
                          Format TFX : pour les anciens PC professionnels dotés de petits boitiers.
                          Puissance
                          Il faut choisir la puissance en fonction de la consommation de tous les composants du PC, en conservant un e marge pour le upgrades, et en ne sur dimensionnant pas trop pour ne pas perdre en rendement.
                          Voici un configurateur qui vous permettra de calculer la puissance nécessaire à votre configuration, sachant que l’efficacité d’une alimentation se situe à 50-60% de sa charge maximale.
                          http://www.bequiet.com/fr/psucalculator
                          Connectique
                          Il convient de vérifier sur la fiche de l’alimentation si elle est munie d’un nombre suffisant de connecteurs pour votre configuration (cartes graphiques, disques durs…), ce qui est généralement le cas.
                          Certaines alimentations sont modulaires, ce qui permet d’éliminer les câbles inutiles et améliorer la circulation de l’air dans le boîtier.

                          En général des alimentations de marque Be Quiet, corsair ou seasonic sont un gage de qualité, avec un petit plus pour Be quiet.
                          Certifications
                          La certification représente la qualité de l’alimentation, et surtout son rendement, c’est-à-dire sa capacité à fournir l’énergie en composants du PC avec un minimum de pertes.
                          Il existe 5 niveaux de certifications :
                          	Alimentation 80 Plus Bronze : environ 85% de rendement à 50% de charge
                          	Alimentation 80 Plus Argent : environ 88% de rendement à 50% de charge Alimentation 80 Plus Or : environ 90% de rendement à 50% de charge
                          	Alimentation 80 Plus Platinum : environ 94% de rendement à 50% de charge
                          	Alimentation 80 Plus Titanium : environ 96% de rendement à 50% de charge



                      <div class="alert alert-success" role="alert">

                          <ul>
                              <li>Entrée de gamme : moins de 100 euros</li>
                              <li>Milieu de gamme : de 100 à 200 euros</li>
                              <li>Haut de gamme : plus de 200 euros</li>
                          </ul>
                      </div>

                  </div>
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/processeur1.jpg" alt="Processeur">
                      <img class="img-responsive" src="img/processeur2.jpg" alt="Processeur">
                  </div>
              </div>
              <hr />

              <!-- Boitier -->
              <div class="row">
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/recup_condensateurs.jpg" alt="Récupération condensateurs">
                  </div>
                  <div class="col-md-8 ptext">
                      <h3 id="boitier">Le boitier</h3>
                      <p>Le premier critère de choix, est la taille du boitier, qui doit contenir tous les éléments. Il faut vérifier :
                          que le format de la carte mère est supporté et que le nombre de baies pour les disques et lecteurs est suffisant
                          Les boitiers avec alimentation intégrées sont à bannir car celle-ci est de piètre qualité.
                          On choisira ensuite le boitier en fonction de la place disponible, du budget et de son design.

                      </p>
                  </div>

              </div>
              <hr />

              <!-- Refroidissement -->
              <div class="row paragraph">
                  <div class="col-md-8 ptext">
                      <h3 id="refroidissement">Refroidissement</h3>
                      <p>Le principal élément chauffant dans un ordinateur est le processeur, il faut donc un élément capable d’éliminer efficacement cette chaleur. C’est le ventirad.
                          Généralement, le ventirad fourni avec le processeur est bruyant et peu performant. Il est préférable de le remplacer par un modèle plus efficace.
                          Be quiet et Noctua sont des références en terme de qualité, d’efficacité et de silence.




                      <div class="alert alert-success" role="alert">

                          <ul>
                              <li>Entrée de gamme : moins de 100 euros</li>
                              <li>Milieu de gamme : de 100 à 200 euros</li>
                              <li>Haut de gamme : plus de 200 euros</li>
                          </ul>
                      </div>

                  </div>
                  <div class="col-md-4 pimage">
                      <img class="img-responsive" src="img/processeur1.jpg" alt="Processeur">
                      <img class="img-responsive" src="img/processeur2.jpg" alt="Processeur">
                  </div>
              </div>
              <hr />




              Emplacement
              Il est recommandé de ne pas placer votre boitier au niveau du sol pour éviter la poussière, sauf si vous l’équipez de filtres et le dépoussiérez régulièrement.
              Eviter également les variations de températures et l’ensoleillement direct.
              Le minimum de protection est le branchement sur une prise dotée de protection contre les surtensions.
              Le must consiste à utiliser un onduleur, qui protègera contre les surtensions et coupures de courant.



              Montage dans le boitier
              Alimentation
              Une alimentation se place soit en haut ou en bas du boitier suivant la configuration du boitier.
              Si elle est en fond de boitier, Il est recommandé de placer l’alimentation de telle sorte qu’elle aspire l’air par le fond (il y a souvent une grille au fond du boitier), pour éviter d’aspirer l’air chaud des autres composants.


          </div>
      </div>


      <?php include($_SERVER['DOCUMENT_ROOT']."/elements/footer.php"); ?>



	




        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="/assets/custom/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/assets/custom/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
            <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="/assets/custom/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="/assets/custom/js/modernizr.js"></script>
        <script type="text/javascript" src="/assets/custom/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="/assets/custom/js/back-to-top.js"></script>
        <script type="text/javascript" src="/assets/custom/js/jquery.sticky.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="/assets/custom/js/app.js"></script>
        <script type="text/javascript" src="/assets/custom/js/index.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function() {
                App.init();
                App.initSliders();
                Index.initParallaxSlider();
            });
        </script>

	</body>
</html>