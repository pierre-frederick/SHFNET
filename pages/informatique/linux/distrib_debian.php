<?php
$pageArray = array();
$pageArray['title'] = "Distribution Debian";
$pageArray['description'] = "Découvrez le système d'exploitation universel debian.";
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
            <div class="col-md-12 content">
                <div class="row">

                    <h2> Partitionnement </h2>
                    <p>La table des partitions située en début de disque contient les informations relatives
                        à chacune de ses partitions. Il en existe duex types :</p>
                    <p><b>Partitionnement Intel (Master_boot_record) :</b> zone de 512 octets en début
                        de disque contenant les informations de 4 partitions primaires maximum. Prise en charge <
                        2.2 To.</p>
                    <p><b>Partitionnement GPT (GUID Partition Table) :</b> jusqu’à 128 partitions, requis
                        avec UEFI.</p>
                    <p>Le dossier /dev/ est utilisé pour communiquer avec les partitions. un disque est nommé
                        sdX (mass-storage driver) avec x valant a si disque maître sur ID0, b si esclave sur ID0.
                        Les noms sdX1 à sdX4 sont réservés aux lecteurs logiques et sdX5 et suivant aux lecteurs
                        logiques.</p>

                    <h3> Logiciels de partitionnement </h3>
                    <p><b>Logiciels de partitionnement :</b> GParted graphique, QtParted graphique pour KDE et parted en
                        ligne de commande.</p>
                    <p><b>Logiciels de secours :</b> DFSee lancé sur un liveCD, testdisk et gPart pour analyse du
                        disque. </p>

                    <h3>Opérations sur les partitions</h3>
                    <p><b>Lister partitions disque :</b></p>
                    <pre><code class="language-bash">sudo fdisk -l</code></pre>

                    <p><b>Lister les UUID des partitions :</b></p>
                    <pre><code class="language-bash">sudo blkid</code></pre>

                    <p><b>Monter une partition :</b> préciser le type avec l’option <code
                                class="language-bash">-t</code>,
                        <code class="language-bash">ext4</code> pour partition UNIX,
                        <code class="language-bash">vfat</code> pour partition FAT32 ;
                        <code class="language-bash">iso9660</code> pour un CD. <code class="language-bash">ntfs</code>
                        pour partition NTFS. </p>
                    <pre><code class="language-bash">sudo mount -t ext4 /dev/sdc3 /media/stock</code></pre>

                    <h3>Montage au démarrage</h3>
                    <p> Le fichier <code class="language-bash">/etc/fstab</code> liste les partitions qui seront montées
                        au démarrage. Le ficher
                        comporte une ligne par périphérique, avec # comme caractère de commentaire. Les lignes
                        comportent 6 champs séparés par des tabulations:
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


                    <pre><code class="language-bash">$ git clone username@host:/path/to/the/repository
$ git clone git://github.com/schacon/grit.git
$ git clone https://username@host:/path/to/the/repository
					</code></pre>


                </div>    <!-- Fin de col-9 content -->


            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>

</body>
</html>