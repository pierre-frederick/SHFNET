<?php
require_once '/includes/functions.php'; // fichier des fonctions
$bdd = connexionDB();
?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3 class="title">Le gif du jour</h3>
            <p>
                git merge
            </p>

            <img src="/img/gif/merge.gif" alt="git merge" width=250>



        </div>


        <div class="col-md-8">
			<div class="projectList">
				<h3 class="title">Les derniers projets</h3>


                <?php
                if(isset($article) || $PROFILE_DEV == true) {
                    $projects = getLastProjects($bdd,4);
                    if (isset($projects)) {
                        foreach ($projects as $project) { ?>
                            <div class="media">
                                <a class="pull-left"
                                   href="/<?php echo $project['id'] ?>">
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
