<?php
$pageArray = array();
$pageArray['title'] = " Monitoring Système sous linux";
$pageArray['description'] = "Apprenez à surveiller un système linux, contrôler l'espace disque, la mémoire, 
    les interfaces réseau. Détecter les situations anormales et les intrusions.";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-eye"></i> <?php echo $pageArray['title'] ?></h1>


        <div class="row">
            <div class="col-md-10">
                <a href="index.php" class="btn btn-info">&larr; Retour au menu</a>
            </div>
            <div class="col-md-2">
                <a href="/" class="btn btn-info">Résumé en fiche</a>
            </div>
        </div>


        <div class="row introduction">
            <div class="col-md-12 content">
                <div class="row">

                    <h2> Réseau </h2>
                    <p>La table des partitions située en début de disque contient les informations relatives
                        à chacune de ses partitions. Il en existe duex types :</p>
                    <p><b>Partitionnement Intel (Master_boot_record) :</b> zone de 512 octets en début
                        de disque contenant les informations de 4 partitions primaires maximum. Prise en charge <
                        2.2 To.</p>
                    <p><b>Lister les ports ouverts avec <code>netstat</code>:</b></p>
                    <pre><code class="language-bash">netstat -paunt</code></pre>
                    <ul>
                        <li><b>-a :</b> Tous les ports</li>
                        <li><b>-t :</b> Tous les ports TCP</li>
                        <li><b>-u :</b> Tous les ports UDP</li>
                        <li><b>-l :</b> Tous les ports en écoute</li>
                        <li><b>-n :</b> Affiche directement les IP. Pas de résolution de nom</li>
                        <li><b>-p :</b> Affiche le nom du programme et le PID associé</li>
                    </ul>

                    <p><b>Scanner les ports ouverts avec <code>nmap</code> :</b> nmap scanne de base avec TCP, et
                        peut scanner en UDP, les différents ports ouverts d'une machine. La commande renvoie également
                        la version des logiciels utilisée derrière le port</p>
                    <pre><code class="language-bash">nmap -sS -sU -sV ip_du_serveur</code></pre>
                    <ul>
                        <li><b>-sS [ip_clible]:</b> scanner les ports TCP</li>
                        <li><b>-SU [ip_clible]:</b> scanner les ports UDP</li>
                        <li><b>-sP :</b> utilisée seule, permet de scanner tout le réseau</li>
                        <li><b>-O --osscan-guess :</b> permet d'identifier l'OS de la machine</li>
                    </ul>

                    <div class="alert alert-info">
                        <b>Scanner tout le réseau :</b> la cible peut être une machine (ip) un réseau (192.168.0.0/24)
                        ou une plage d'adresse (192.168.100-200).
                        <pre><code class="language-bash">nmap -sP 192.168.0.0/24</code></pre>
                    </div>


                    <p><b>Afficher les informations des interfaces réseau :</b></p>
                    <pre><code class="language-bash">netstat -i</code></pre>

                    <h2> Espace disque </h2>

                    <p><b>Afficher l'espace disque disponible :</b></p>
                    <pre><code class="language-bash">df -fh</code></pre>

                    <p><b>Afficher la taille de fichiers :</b></p>
                    <pre><code class="language-bash">du -Shc</code></pre>

                    <p><b>Afficher la taille de répertoires :</b></p>
                    <pre><code class="language-bash">ls -lh</code></pre>

                    <p><b>Afficher les plus gros dossiers du répertoire courant :</b></p>
                    <pre><code class="language-bash">du -hs ./* | sort -nr | head</code></pre>

                    <h2> Mémoire </h2>

                    <p><b>Surveiller l’utilisation de la RAM :</b> (m pour Mo)</p>
                    <pre><code class="language-bash">free -m</code></pre>

                    <p><b>Surveiller l’utilisation de la RAM avec <code>htop</code> :</b></p>
                    <pre><code class="language-bash">htop</code></pre>

                    <h2> Processus </h2>

                    <p><b>Surveiller un processus avec <code>ps</code> :</b> l'option <code>e</code> permet de présenter
                        l'environnement, <code>a</code> permet d'afficher les processus des autres utilisateurs
                        et <code>f</code> permet l'affichage sous forme d'arbre.</p>
                    <pre><code class="language-bash">ps -eaf | grep -i minecraft</code></pre>

                    <p><b>Killer un processus avec <code>kill</code> :</b></p>
                    <pre><code class="language-bash">kill -15 [PID] (doux)
kill -9 [PID] (plus violent)</code></pre>
                    <p><b>Surveiller l’utilisation de la RAM avec <code>htop</code> :</b></p>
                    <pre><code class="language-bash">htop</code></pre>

                    <p><b>Voir l'heure actuelle du serveur, la durée de fonctionnement du serveur,
                            le nombre d'users connecté et la charge du système au cours des 1, 5 et 10
                            dernières minutes <code>uptime</code> :</b></p>
                    <pre><code class="language-bash">uptime</code></pre>

                    <h2> Audit de sécurité </h2>
                    <p><b>Détecter les intrusions avec <code>tiger</code> :</b></p>
                    <p><b>Détecter les rootkits avec <code>chkrootkit</code> :</b></p>
                    <p><b>Détecter les rootkits avec <code>rkhunter</code> :</b></p>
                    <p><b>Visualiser le trafic d'un serveur DNS avec <code>dnstop</code> :</b></p>


                </div>    <!-- Fin de col-9 content -->


            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>