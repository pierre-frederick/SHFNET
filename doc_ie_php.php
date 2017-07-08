<?php
function ConnexionDB()
{
	try
	{
		$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$BDD = new PDO('pgsql:host=localhost;dbname=IEServices', 'ieadmin', 'uhNdX51*', $options);

	}
	catch (PDOException $e)
	{
		throw new Exception($e->getMessage(), $e->getCode());
	}

	return $BDD;
}

//ADDBLOG 


if(isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['club']) && isset($_POST['editor']))
{
	$club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$subtitle = filter_input(INPUT_POST, 'subtitle', FILTER_SANITIZE_STRING);
	$purifier = new HTMLPurifier();
	$editor = $purifier->purify($_POST['editor']);
	$groups = ListeGroupes()[phpCAS::getUser()];
	if(in_array($club, $groups))
	{
		$bdd = ConnexionDB();
		$clubBlog = BlogClub($bdd, $club);
		if($clubBlog != null)
		{
			$qry = $bdd->prepare('INSERT INTO blog.article (author, club, content, title, subtitle) VALUES(?, ?, ?, ?, ?)');
			$qry->execute(array(ucwords(str_replace('.', ' ', phpCAS::getUser())), $clubBlog['id'], $editor, $title, $subtitle));
			header('Location: https://blog.isenengineering.fr/?c='.$clubBlog['cn']);
			exit(0);
		}
	}
}


header('Location: /?error=Une erreur est survenue.');


//CONTACT ME 



// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>


//DEMANDE 


<?php
if(!isset($_POST['name']) || !isset($_POST['firstname']) || !isset($_POST['mail']) || !isset($_POST['message']) ||
!isset($_POST['travail']) || !isset($_POST['demande']) || !isset($_POST['submit']) || !isset($_FILES['file']['tmp_name']))
{
  header('Location: https://opensource.isenengineering.fr/fablab?error=Erreur%20dans%20le%20formulaire');
  var_dump($_FILES);
  exit(0);
}
if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['mail']) || empty($_POST['message']) || empty($_POST['travail']) || empty($_POST['demande']))
{
  header('Location: https://opensource.isenengineering.fr/fablab?error=Erreur%20dans%20le%20formulaire');
  exit(0);
}

$data = array(
            'secret' => "6LeNkRkUAAAAANYLRsLt1ORYGCNrnJ6mskgptQWK",
            'response' => $_POST['g-recaptcha-response']
        );

$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);
$response = json_decode($response);

if(!$response->success)
{
  header('Location: https://opensource.isenengineering.fr/fablab?error=Veuillez%20completer%20le%20captcha');
  exit(0);
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
$travail = filter_input(INPUT_POST, 'travail', FILTER_SANITIZE_NUMBER_INT);
$demande = filter_input(INPUT_POST, 'demande', FILTER_SANITIZE_NUMBER_INT);

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  header('Location: https://opensource.isenengineering.fr/fablab?error=Adresse%20mail%20incorrecte');
  exit(0);
}

$target_dir = "uploads/";
$file_name = $_FILES["file"]["name"];
$target_name = uniqid();
$target_file = $target_dir . $target_name;

if (file_put_contents($target_file, base64_encode(file_get_contents($_FILES['file']['tmp_name']))) === false)
{
  header('Location: https://opensource.isenengineering.fr/fablab?error=Une%20erreur%20est%20survenue.');
  exit(0);
}

require_once 'php/Repository.php';
try {
  $bdd = new Repository();
  $bdd->addDemande($name, $firstname, $mail, $message, $demande, $travail, $file_name, $target_name);
} catch (Exception $e) {
  header('Location: https://opensource.isenengineering.fr/fablab?error=Une%20erreur%20est%20survenue.');
  exit(0);
}

$mail = utf8_encode("Nouvelle demande de projet de $firstname $name .\n\nMessage :\n$message");
$headers = 'From: FabLab <fablab@isenengineering.fr>' . "\r\n" .
	   'Reply-To: fablab@isenengineering.fr' . "\r\n" .
	   'Content-Type: text/plain; charset="utf-8"' . "\r\n" .
	   'Content-Transfer-Encoding: 8bit' . "\r\n" .
	   'X-Mailer: PHP/' . phpversion();

mail('prez@isenengineering.fr', 'FabLab - Demande', $mail, $headers);
mail('fablab@isenengineering.fr', 'FabLab - Demande', $mail, $headers);
header('Location: https://opensource.isenengineering.fr/fablab?success');


//DEMANDE FABLAB

<?php
require_once '/var/www/phpCAS/CAS/mustBeLogged.php';
require_once './php/functions.php';

if($IS_ADMIN || in_array('isenopensource', ListeGroupes()[phpCAS::getUser()]))
{
    $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $BDD = new PDO('pgsql:host=localhost;dbname=opensource', 'isenopensource', 's3xwithp3nguin', $options);
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$qry = $BDD->prepare('UPDATE fablab.demande SET done = NOT done WHERE id = ?');
	$qry->execute(array($id));

    }
    $qry = $BDD->query('SELECT demande.id, nom, prenom, mail, date, done, filename, uri, message, type_travail.name as travail_name, type_demande.name as demande_name FROM fablab.demande INNER JOIN fablab.type_demande ON demande.id_type = type_demande.id INNER JOIN fablab.type_travail ON demande.id_travail = type_travail.id ORDER BY done ASC, date DESC;');
    $liste = $qry->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <td> </td>
                <td><b>Nom</b></td>
                <td><b>Prénom</b></td>
                <td><b>Date</b></td>
                <td><b>Projet</b></td>
                <td><b>Travail</b></td>
                <td><b>Détails</b></td>
                <td><b><span class="glyphicon glyphicon-ok"></span></b></td>
             </thead>
	    <?php
	    foreach($liste as $row)
	    {
		?>
		    <tr <?php if($row['done']) echo 'class="success"'; ?>>
		    	<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['nom']; ?></td>
			<td><?php echo $row['prenom']; ?></td>
			<td><?php $date = new DateTime($row['date']); echo $date->format('d/m/Y à H:i'); ?></td>
			<td><?php echo $row['demande_name']; ?></td>
			<td><?php echo $row['travail_name']; ?></td>
			<td>
			    <a href="#" data-toggle="popover" title="Message" data-content="<?php echo str_replace('"', '\'', $row['message']); ?>" data-placement="left" class="btn btn-link btn-sm" >Plus</a>
			    <a target="_blank" href="./php/getFabFile.php?filename=<?php echo $row['filename']; ?>&file=<?php echo $row['uri']; ?>" onclick="alert('Attention : Ce fichier pourrait être dangeureux');" class="btn btn-link btn-sm" >Fichier</a>
			    <a href="mailto:<?php echo$row['mail']; ?>" class="btn btn-link btn-sm" >Mail</a>
			</td>
			<td><input type="checkbox" onclick="refreshFablab(<?php echo $row['id']; ?>);" <?php if($row['done']) echo 'checked'; ?>/></td>
		    </tr>
		<?php
	    }
	    ?>
	</table>
    </div>
<?php

}
else
{
	header('HTTP/1.0 401 Unauthorized');
	header('Location: /401');
	exit(0);
}



function GetArticle(PDO $BDD, $id)
{
	$requette = $BDD->prepare('SELECT * FROM blog.article WHERE id = ?');
	$requette->execute(array($id));
	return $requette->fetch(PDO::FETCH_ASSOC);

}

function LastArticles(PDO $BDD, $cn = null, $p = 1)
{
	if($cn == null)
	{
		$requette = $BDD->prepare('SELECT author, date, title, subtitle, id, club FROM blog.article WHERE published ORDER BY date DESC LIMIT ? OFFSET ?');
		$requette->execute(array(4, ($p-1)*4));
	}
	else
	{
		$requette = $BDD->prepare('SELECT author, date, title, subtitle, id, club FROM blog.article WHERE published AND club = ? ORDER BY date DESC LIMIT ? OFFSET ?');
		$requette->execute(array($cn, 4, ($p-1)*4));
	}
	return $requette->fetchAll(PDO::FETCH_ASSOC);

}


//GET FILE 


<?php
require_once '/var/www/phpCAS/CAS/mustBeLogged.php';
define('__FABSITE__', '/var/www/clubs/isenopensource/fablab/');

if($IS_ADMIN || in_array('isenopensource', ListeGroupes()[phpCAS::getUser()]))
{
	$file = filter_input(INPUT_GET, 'file', FILTER_SANITIZE_STRING);
	$filename = filter_input(INPUT_GET, 'filename', FILTER_SANITIZE_STRING);
	$url = __FABSITE__.'uploads/'.$file;
	if (file_exists($url)) 
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		print(base64_decode(file_get_contents($url)));
		exit;
	}

}
else
{
	header('HTTP/1.0 401 Unauthorized');
	header('Location: /401');
	exit(0);
}


//INDEX

<?php
require_once 'php/functions.php';
setlocale(LC_ALL, 'fr_FR.UTF-8');
$bdd = ConnexionDB();
$listeClub = ListeClubs($bdd);

if(isset($_GET['p']) && $_GET['p'] > 0)
    $page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
else
    $page=1;

$header = array('img' => 'home-bg.jpg', 'title' => '<h1>Engineering\'s Lab</h1><hr class="small"><span class="subheading">Sans limites, nous sommes les esprits créatifs du numérique de demain.</span>');
$metas = array('author' => 'Cassagne Julien', 'description' => 'Blog de l\'ISEN Engineering', 'og:type' => 'website', 'og:author' => 'Cassagne Julien', 'og:image' => 'https://blog.isenengineering.fr/img/home-bg.jpg', 'og:description' => 'Blog de l\'ISEN Engineering', 'og:site_name' => 'ISEN Engineering - Blog');
$idClub = null;
if(isset($_GET['c']))
{
    $getClub = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
    foreach($listeClub as $club)
    {
	if($club['cn'] == $getClub)
	{
	    if($club['img'] != null)
                $header['img'] = 'club/'.$club['img'];
	    $header['title'] = '<h1>Engineering\'s Lab</h1><hr class="small"><span class="subheading">'.$club['title'].'</span>';
	    $idClub = $club['id'];
	}
    }
}
else
    $getClub = null;
if(isset($_GET['a']))
{
    $idArticle = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
    $article = GetArticle($bdd, $idArticle);
    if($article == null)
	    header('Location: /');

    foreach($listeClub as $club)
    {
	if($club['id'] == $article['club'])
	{
	    if($club['img'] != null)
                $header['img'] = 'club/'.$club['img'];
	    $idClub = $club['id'];
	}
    }
    $metas['og:type'] = 'article';
    $metas['og:image'] = 'https://blog.isenengineering.fr/img/'.$header['img'];
    $metas['author'] = $article['author'];
    $metas['og:author'] = $article['author'];
    $metas['og:title'] = $article['title'];
    $metas['og:description'] = $article['subtitle'];

    $date = new DateTime($article['date']); 
    $header['title'] = '<h1 class="post-title">'.$article['title'].'</h1><h2 class="post-subtitle text-left">'.$article['subtitle'].'</h2><p class="post-meta">Posté par <a href="#" style="color: white;">'.$article['author'].'</a> le '.strftime("%e %B %Y", $date->getTimestamp()).'</p>';

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    foreach($metas as $meta=>$value)
    {
	    if(strpos($meta, 'og:') === 0)
		    $type = 'property';
	    else
		    $type = 'name';
	    echo '    <meta '.$type.'="'.$meta.'" content="'.$value."\">\n";
    }
    ?>


    <title>ISEN Engineering - Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/css/clean-blog.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">ISEN Engineering</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Accueil</a>
                    </li>
		    <?php
		    foreach($listeClub as $club)
		    {
		    	?>
			<li>
			    <a href="/club/<?php echo $club['cn']; ?>"><?php echo $club['name']; ?></a>
			</li>
		    	<?php
		    }
		    ?>
			    <!--<li><?php if(isset($_GET['a'])) { if($IS_LOGGED) echo '<a href="/blog/'.$idArticle.'/logout">Logout</a>'; else echo '<a href="/blog/'.$idArticle.'/login">Login</a>'; } ?></li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/img/<?php echo $header['img']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <?php echo $header['title']; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		<?php
		if(isset($_GET['a']))
		{
			echo $article['content'];
		}
		else
		{
			$articles = LastArticles($bdd, $idClub, $page);
			foreach($articles as $article)
			{
			?>
	                <div class="post-preview">
			<a href="/blog/<?php echo $article['id'];?>">
	                        <h2 class="post-title">
				    <?php echo $article['title']; ?>
	                        </h2>
	                        <h3 class="post-subtitle">
				    <?php echo $article['subtitle']; ?>
	                        </h3>
	                    </a>
			    <p class="post-meta">Posté par <a href="#"><?php echo $article['author']; ?></a> le  <?php $date = new DateTime($article['date']); echo strftime("%e %B %Y", $date->getTimestamp()); ?></p>
	                </div>
			<hr>
			<?php
			}
			?>
		<ul class="pager">
		<?php if($page > 1) { ?>
		    <li class="previous">
			<a href="<?php if($getClub == null) echo '/'.($page-1); else echo '/club/'.$getClub.'/'.($page-1); ?>" >&larr; Newer Posts</a>
                    </li>
		<?php } ?>
                    <li class="next">
		        <a href="<?php if($getClub == null) echo '/'.($page+1); else echo '/club/'.$getClub.'/'.($page+1); ?>" >Older Posts &rarr;</a>
                    </li>
                </ul>

			<?php
		}
		?>
                            </div>
        </div>
    </div>

    <hr>

        <!--          footer            -->
    
      <?php include("/var/www/html/elements/footer.php"); ?>


    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/js/jqBootstrapValidation.js"></script>
    <script src="/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="/js/clean-blog.min.js"></script>

</body>

</html>

//REPOSITORY PHP

<?php
require 'conf/bdd.php';

class Repository
{
	private $bdd;


	function __construct()
	{
		$this->bdd = getPDO();
		if($this->bdd == null)
			throw new Exception('Internal error');
	}

	function getTypeDemandes()
	{
		$qry = $this->bdd->query('SELECT * FROM fablab.type_demande ORDER BY id;');
		return $qry->fetchAll(PDO::FETCH_ASSOC);
	}

	function getTypeTravails()
	{
		$qry = $this->bdd->query('SELECT * FROM fablab.type_travail ORDER BY id;');
		return $qry->fetchAll(PDO::FETCH_ASSOC);
	}

	function addDemande($name, $firstname, $mail, $message, $type, $travail, $filename, $uri)
	{
		$qry = $this->bdd->prepare('INSERT INTO fablab.demande (nom, prenom, mail, message, id_type, id_travail, ip, filename, uri) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);');
		$qry->execute(array($name, $firstname, $mail, $message, $type, $travail, $_SERVER['REMOTE_ADDR'], $filename, $uri));
	}

}
