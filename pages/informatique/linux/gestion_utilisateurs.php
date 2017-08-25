<?php
$pageArray = array();
$pageArray['title'] = "La gestion des utilisateurs sous linux";
$pageArray['description'] = "Apprenez à gérer les utilisateurs, les groupes et leurs droits. ";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>

<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-hdd-o"></i> <?php echo $pageArray['title'] ?></h1>


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
                <p>Gérer les disques et partitions sous Linux. </p>
            </div>
        </div>


        <div class="row menuarticle">
            <ul>
                <li><a href="#partitionnement">Partitionnement </a></li>
                <li><a href="#systeme_fichier">Systèmes de fichier </a></li>
                <li><a href="#operations">Opérations sur les partitions </a></li>
                <li><a href="#compression">Compression et archives</a></li>

            </ul>
        </div>

        <hr/>
        <!-- Type de commutation -->
        <div class="row paragraph">
            <h2 id="partitionnement"> Partitionnement </h2>
            <h3>Disques</h3>
            <p><b>Nommage des disques :</b> Le dossier /dev/ est utilisé pour communiquer avec les partitions.</p>
            <ul>
                <li> Un disque SATA, SCSI ou USB est nommé sdX (mass-storage driver) avec x une lettre
                    représentant le numéro de disque (de a à z). suivi d'un chiffre pour le numéro de partition.
                </li>
                <li>Les disques IDE sont nommés hdX avec les mêmes conventions de nommage.</li>
                <li>Les lecteurs CD sont nommés SCDX ou SRX avec X un chiffre.</li>
            </ul>
            <p>Par exemple, <b>sda</b> est le premier disque SATA connecté sur le bus.</p>

            <h3> Partitions </h3>
            <p>La table des partitions située en début de disque contient les informations relatives
                à chacune de ses partitions. Il en existe deux types :</p>
            <p><b>Partitionnement Intel (Master_boot_record) :</b> zone de 512 octets en début
                de disque contenant les informations de 4 partitions primaires maximum. Prise en charge <
                2.2 To.</p>
            <p><b>Partitionnement GPT (GUID Partition Table) :</b> jusqu’à 128 partitions, requis
                avec UEFI.</p>
            <p>Cette séparation permet de créer des partitions en lecture seule, et séparer système et données.</p>

            <h2 id="systeme_fichier"> Système de fichiers </h2>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>OS natif</th>
                    <th>Commentaire</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ext4</td>
                    <td>Linux</td>
                    <td>système de fichier par défaut pour linux</td>
                </tr>
                <tr>
                    <td>swap</td>
                    <td>Linux</td>
                    <td>système utilisé pour la mémoire cache sous linux</td>
                </tr>
                <tr>
                    <td>ntfs</td>
                    <td>Windows</td>
                    <td>système avec sécurité sur les fichiers</td>
                </tr>
                <tr>
                    <td>vfat</td>
                    <td>Windows</td>
                    <td>système sans sécurité sur les fichiers</td>
                </tr>
                <tr>
                    <td>iso9660</td>
                    <td>/</td>
                    <td>système utilisé sur les CD</td>
                </tr>
                <tr>
                    <td>cifs / smb</td>
                    <td>Windows</td>
                    <td>système virtuel pour fichiers réseau windows</td>
                </tr>
                <tr>
                    <td>nfs</td>
                    <td>Unix</td>
                    <td>système virtuel pour fichiers réseau Sun</td>
                </tr>
                </tbody>
            </table>


            <h2 id="operations"> Opérations sur les partitions </h2>
            <h3> Logiciels de partitionnement </h3>
            <p><b>Logiciels de partitionnement :</b> GParted graphique, QtParted graphique pour KDE et parted en ligne
                de commande.</p>
            <p><b>Logiciels de secours :</b> DFSee lancé sur un liveCD, testdisk et gPart pour analyse du disque. </p>
            <h3> Administration</h3>
            <p><b>Connaître l'espace disponible sur chaque partition :</b></p>
            <pre><code class="language-bash">sudo df -h</code></pre>

            <div class="alert alert-info">
                <b>Info :</b> Sur un système ext4, le système va réserver 5% de l'espace disque pour root au cas où
                le disque est plein, et éviter que le système soit inutilisable. Sur de gros disuqes, cet espace est
                assez important et peut être diminué avec la commande :
                <pre><code class="language-bash">sudo tune2fs -m 1 /dev/votre_partition</code></pre>
            </div>
            <p><b>Lister partitions disque :</b></p>
            <pre><code class="language-bash">sudo fdisk -l</code></pre>

            <p><b>Lister les UUID des partitions :</b></p>
            <pre><code class="language-bash">sudo blkid</code></pre>

            <p><b>Monter une partition :</b> préciser le type avec l’option <code class="language-bash">-t</code>,
                <code class="language-bash">ext4</code> pour partition UNIX,
                <code class="language-bash">vfat</code> pour partition FAT32 ;
                <code class="language-bash">iso9660</code> pour un CD. <code class="language-bash">ntfs</code> pour
                partition NTFS. </p>
            <pre><code class="language-bash">sudo mount -t ext4 /dev/sdc3 /media/stock</code></pre>

            <p><b>Démonter une partition :</b> il est possible de donner comme paramètre le périphérique comme ci-après
                ou le point de montage.</p>
            <pre><code class="language-bash">sudo umount /dev/sda1</code></pre>

            <p><b>montage d'un image ISO :</b> il faut utiliser un pseudo-périphérique ou loop device (/dev/loopX).</p>
            <pre><code class="language-bash">mount –t iso9660 –o loop debian9.iso /mnt/</code></pre>

            <h3>Montage au démarrage</h3>
            <p> Le fichier <code class="language-bash">/etc/fstab</code> liste les partitions qui seront montées au
                démarrage. Le ficher
                comporte une ligne par périphérique, avec # comme caractère de commentaire. Les lignes
                comportent 6 champs séparés par des tabulations: </p>
            <ol>
                <li>Périphérique</li>
                <li><b>Point de montage : </b>dossier dans /mnt/</li>
                <li><b>Type :</b> ext4, vfat, ntfs...</li>
                <li><b>Options :</b> droits de lecture écriture et exécution sur le dossier</li>
                <li><b>dump :</b> int pour l’utilitaire de sauvegarde</li>
                <li><b>pass :</b>indicateur pour la commande <code class="language-bash">fsck</code>.</li>
            </ol>
            <pre><code class="language-bash">/dev/ hdc7 /usr/src ext2 defaults 1 2</code></pre>

            <h3>Problèmes avec NTFS</h3>
            <p>Si partitions NTFS accessibles qu’en lecture, pilote ntfs-3g.</p>
            <p>Pour paritions windows NTFS, utiliser les options <code class="language-bash">defaults,nls=utf8,umask=000,uid=1000,windows_names</code>
            </p>

            <h2 id="compression"> Compression et archives </h2>
            <h3>Archives de type UNIX</h3>
            <p><b>Algorithmes :</b></p>
            <ul>
                <li>gzip (GNUzip, extension .gz)</li>
                <li>bzip2 (de J. Seward, extension .bz2)</li>
            </ul>

            <p><b>Compresser :</b> <code>-c</code> pour créer l'archive, <code>-z</code> pour
                compresser en gzip, <code>-j</code> pour compresser en bz2, <code>-v</code> verbose, et <code>-f</code>
                pour
                préciser le nom de fichier.</p>
            <pre><code class="language-bash">tar -czvf dossier.tar.gz dossier/</code></pre>

            <p><b>Décompresser :</b> <code>-x</code> pour extraire l'archive, <code>-z</code> pour
                compresser en gzip, <code>-j</code> pour compresser en bz2, <code>-v</code> verbose, et <code>-f</code>
                pour
                préciser le nom de fichier.</p>
            <pre><code class="language-bash">tar -xjvf dossier.tar.bz2</code></pre>

            <h3>Archives de type Windows</h3>
            <p><b>Compresser :</b> pour créer une archive.</p>
            <pre><code class="language-bash">zip –r  dossier.zip  dossier/</code></pre>

            <p><b>Décompresser :</b> pour extraire une archive.</p>
            <pre><code class="language-bash">unzip  dossier.zip</code></pre>


        </div>    <!-- Fin de row content -->

        <div class="sources">
            <h3>Sources et liens pour en savoir plus :</h3>
            <ul>
                <li><a href="http://perso-laris.univ-angers.fr/~delanoue/iut/linux/4-%20Gestion%20des%20disques.pdf">perso-laris.univ-angers.fr</a>
                </li>

            </ul>

        </div>


    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>