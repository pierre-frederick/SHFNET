<?php
require_once '/includes/functions.php'; // fichier des fonctions
$bdd = ConnexionDB();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="title">Reason to choose us</h3>
            <p>
                On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
            </p>
            <ul>
                <li>Tick mark here Reason one</li>
                <li>Tick mark here  Reason one</li>
                <li>Tick mark here  Reason one</li>
                <li>Reason one</li>
                <li>Reason one</li>
                <li>Reason one</li>
            </ul>
            <p>
                On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
            </p>
            <p>
                On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
            </p>
        </div>


        <div class="col-md-8">
			<div class="projectList">
				<h3 class="title">Latest Projects</h3>


                <?php
                if(isset($article) || $PROFILE_DEV == true) {
                    $projects = LastProjects($bdd, null, null, 1);
                    if (isset($projects)) {
                        foreach ($projects as $project) { ?>
                            <div class="media">
                                <a class="pull-left"
                                   href="/<?php echo $project['subject'] ?>/<?php echo $project['id'] ?>">
                                    <img src="<?php echo $project['img'] ?>" class="projectImg"
                                         title="<?php echo $project['legend'] ?>">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $project['title'] ?></h4>
                                    <p> <?php echo $project['subtitle'] ?></p>
                                    <a class="pull-right" href="<?php echo $project['id'] ?>">more details</a>
                                </div>
                            </div>

                        <?php }
                    } else {
                        echo "pas de nouveaux projets";
                    }
                }
                else {
                    echo 'Désolé ! Problème de communication avec la base de donnée';
                }
                ?>
				
			</div>
        </div>

    </div>
</div>
