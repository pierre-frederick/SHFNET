<?php
$pageArray = array();
$pageArray['title'] = "Utiliser Git";
$pageArray['description'] = "Apprenez à utiliser le gestionnaire de version (VCS) git";
$pageArray['image'] = "/img/logo_shfnet.png";

?>

<!DOCTYPE html>
<html lang="fr">

<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/head.php"); ?>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/header.php"); ?>


<div class="container">
    <div class="article">
        <h1 class="title"><i class="fa fa-code-fork"></i> <?php echo $pageArray['title'] ?></h1>
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

                    <div class="alert alert-warning">
                        Cet article nécessite la conaissance du fonctionnement des gestionnaires de versions et avoir
                        installé git.
                    </div>

                    <h2> Démarrage d'un dépôt </h2>
                    <p><b>Créer un nouveau dépôt :</b> créer un dossier et se placer dans celui-ci. Exécuter la commande
                        : </p>
                    <pre><code class="language-bash">$ git init</code></pre>
                    <p>Cela crée un nouveau sous-répertoire nommé .git qui contient tous les fichiers nécessaires au
                        dépôt.</p>

                    <p><b>Cloner un dépôt local :</b> créer une copie du dépôt local : </p>
                    <pre><code class="language-bash">$ git clone /path/to/the/repository</code></pre>
                    <p>Toutes les versions de tous les fichiers pour l'historique du projet sont téléchargées (aucune
                        perte de données).</p>

                    <p><b>Cloner un dépôt distant :</b> créer une copie du dépôt d'un serveur git distant </p>
                    <p>Suivant le protocole utilisé par le serveur : SSH, GIT ou HTTPS </p>
                    <pre><code class="language-bash">$ git clone username@host:/path/to/the/repository
$ git clone git://github.com/schacon/grit.git
$ git clone https://username@host:/path/to/the/repository
					</code></pre>

                    <h2>Enregistrer des modifications</h2>
                    <p><b>Vérfier l'état du dépôt :</b> indique la branche (master par défaut) sur laquelle est le
                        dépôt, les fichers modifiés ou non suivis. </p>
                    <pre><code class="language-bash">$ git status
On branch master
Untracked files:
  (use "git add <file>..." to include in what will be committed)
          LISEZMOI

nothing added to commit but untracked files present (use "git add" to track)
					</code></pre>

                    <p><b>Ajouter des fichiers au suivi de version :</b> pour un nouveau fichier par exemple. Les
                        modifications de ce fichier seront donc suivies</p>
                    <pre><code class="language-bash">$ git add LISEZMOI </code></pre>

                    <p><b>Indexer un fichier : </b>cela signifie que le fichier sous suivi de version a été modifié dans
                        la copie de travail mais n'est pas encore indexé. </p>
                    <pre><code class="language-bash">$ git add benchmarks.rb </code></pre>

                    <p><b>Ajouter et/ou indexer tous les fichiers au suivi de version :</b></p>
                    <pre><code class="language-bash">$ git add * </code></pre>

                    <p><b>Comparer le contenu du répertoire à l'index : </b>Pour visualiser ce qui a été modifié mais
                        pas encore indexé </p>
                    <pre><code class="language-bash">$ git diff
diff --git a/benchmarks.rb b/benchmarks.rb
index 3cb747f..da65585 100644
--- a/benchmarks.rb
+++ b/benchmarks.rb
@@ -36,6 +36,10 @@ def main
           @commit.parents[0].parents[0].parents[0]
         end

+        run_code(x, 'commits 1') do
+          git.commits.size
+        end
+
         run_code(x, 'commits 2') do
           log = git.commits('master', 15)
           log.size </code></pre>

                    <div class="alert alert-warning">
                        Juste après un git status, si la zone d'index est dans l'état désiré, vous pouvez valider vos
                        modifications.
                    </div>

                    <p><b>Valider les modifications :</b></p>
                    <pre><code class="language-bash">$ git commit</code></pre>
                    <p> On a alors un éditeur de texte qui s'ouvre et affiche : <br/>
                        Il faut alors entrer en début de fichier juste avant le premier # le <b>titre du commit
                            (modifications apportées), sauter une ligne et énumérer les modifications apportées.</b></p>
                    <pre><code class="language-bash"># Please enter the commit message for your changes. Lines starting
# with '#' will be ignored, and an empty message aborts the commit.
# On branch master
# Changes to be committed:
#   (use "git reset HEAD <file>..." to unstage)
#
#       new file:   LISEZMOI
#       modified:   benchmarks.rb
~
~
~
".git/COMMIT_EDITMSG" 10L, 283C</code></pre>

                    <div class="alert alert-info">
                        L'option -a permet de s'affranchir la phase d'indexation (éviter de faire <code
                                class="language-bash">git add</code>). <code class="language-bash">$ git commit
                            -a</code>
                    </div>


                    <p><b>Effacer des fichiers : </b> Pour effacer un fichier de Git, vous devez l'éliminer des fichiers
                        en suivi de version (l'effacer dans la zone d'index) puis valider. </p>
                    <pre><code class="language-bash">$ git rm benchmarks.rb</code></pre>

                    <div class="alert alert-danger">
                        Si le fichier est effacé de l'arborescence, il apparaît comme non indexé dans git status, il
                        suffit faire un <code class="language-bash">$ git rm file </code>
                    </div>

                    <p><b>Visualiser les modifications : </b>cette commande possède de nombreuses options dont <code
                                class="language-git">-p </code> qui montre les différences introduites entre chaque
                        validation. <br/>
                        <code class="language-git">--stat</code> pour avoir les différences entre chaque commit, <code
                                class="language-git">-"n"</code> qui affiche les n derniers commits</p>
                    <pre><code class="language-bash">$ git log</code></pre>


                    <h2>Annuler des modifications</h2>

                    <p><b>Modifier le dernier commit : </b> Une des annulations les plus communes apparaît lorsqu'on
                        valide une modification trop tôt en oubliant d'ajouter certains fichiers, ou si on se trompe
                        dans le message de validation. </p>
                    <pre><code class="language-bash">$ git commit --amend</code></pre>

                    <p><b>Désindexer un fichier déjà indexé : </b> Pour annuler par exemple une mauvaise action
                        effectuée par un <code class="language-bash">git add * </code></p>
                    <pre><code class="language-bash">$ git reset HEAD benchmarks.rb</code></pre>

                    <p><b>Réinitialiser un fichier modifié : </b> Pour annuler toutes les modifications effectuées sur
                        un fichier.</p>
                    <pre><code class="language-bash">$ git checkout -- benchmarks.rb</code></pre>

                    <h2>Travailler sur des dépots distants</h2>

                    <p><b>Afficher les dépôts distants : </b> Pour visualiser les serveurs distants que vous avez
                        enregistrés, vous pouvez lancer la commande <code class="language-bash">git remote </code></p>
                    <pre><code class="language-bash">$ git commit --amend</code></pre>

                    <p><b>Ajouter des dépôts distants : </b> Pour ajouter un nouveau dépôt distant Git comme nom court
                        auquel il est facile de faire référence</p>
                    <pre><code class="language-bash">$ git remote add [nomcourt] [url]</code></pre>

                    <p><b>Récupérer et tirer depuis des dépôts distants : </b> Cette commande s'adresse au dépôt distant
                        et récupère toutes les données de ce projet que vous ne possédez pas déjà.</p>
                    <pre><code class="language-bash">$ git remote add [nomcourt] [url]</code></pre>

                    <p><b>Fusion automatique : </b> la commande git pull récupère et fusionne automatiquement une
                        branche distante dans la branche locale.</p>
                    <pre><code class="language-bash">$ git pull</code></pre>

                    <p><b>Pousser son travail sur un dépôt distant : </b> Cette commande ne fonctionne que si vous avez
                        cloné depuis un serveur sur lequel vous avez des droits d'accès en écriture et si personne n'a
                        poussé dans l'intervalle.</p>
                    <pre><code class="language-bash">$ git push [nom-distant] [nom-de-branche]</code></pre>


                    </h2> Gestion du dépôt </h2>

                    <p><b>Ignorer des fichiers :</b> Il apparaît souvent qu'un type de fichiers présent dans la copie de
                        travail ne doit pas être ajouté automatiquement ou même ne doit pas apparaître comme fichier
                        potentiel pour le suivi de version.
                        Renseigner un fichier .gitignore avant de commencer à travailler est généralement une bonne idée
                        qui évitera de valider par inadvertance des fichiers qui ne doivent pas apparaître dans le dépôt
                        Git.</p>
                    <pre><code class="language-bash"># un commentaire, cette ligne est ignorée
# pas de fichier .a
*.a
# mais suivre lib.a malgré la règle précédente
!lib.a
# ignorer uniquement le fichier TODO à la racine du projet
/TODO
# ignorer tous les fichiers dans le répertoire build
build/
# ignorer doc/notes.txt, mais pas doc/server/arch.txt
doc/*.txt
# ignorer tous les fichiers .txt sous le répertoire doc/
doc/**/*.txt</code></pre>


                    <h2> Les arbres </h2>
                    <p>Un dépôt local contient trois arbres :</p>
                    <ul>
                        <li><b>espace de travail : </b> espace contenant réellement les fichiers</li>
                        <li><b>Index :</b> espace de transit des fichiers (après un <code class="language-bash">git
                                add</code>)
                        </li>
                        <li><b>HEAD : </b> pojnte vers la dernière validation faite.</li>
                    </ul>

                </div>    <!-- Fin de col-9 content -->


            </div>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/footer.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/elements/javascript.php"); ?>
</body>
</html>