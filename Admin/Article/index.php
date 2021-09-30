<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/fonction_perso.inc.php");
require_once($_SERVER['DOCUMENT_ROOT']."/lib/script/redirect.inc.php");

if ($Cnx_Admin!=TRUE) {
  header('location:'.$Home.'/Admin');
}

$Erreur=$_GET['erreur'];
$Valid=$_GET['valid'];
$Id=$_GET['id'];
$Now=time();

if (isset($_POST['StatuePage'])) {
   $_SESSION['StatuePage']=$_POST['StatuePage'];
}

if ((!isset($_SESSION['StatuePage']))||($_SESSION['StatuePage']=="NULL")) {
     $Select=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Article");
     $Select->execute();
}
else {
     $Select=$cnx->prepare("SELECT * FROM ".$Prefix."neuro_Article WHERE page=:page");
     $Select->bindParam(':page', $_SESSION['StatuePage'], PDO::PARAM_STR);
     $Select->execute();
}
    
?>

<!-- ************************************
*** Script realise par NeuroSoft Team ***
********* www.neuro-soft.fr *************
**************************************-->

<!doctype html>
<html>
<head>
<meta charset="ISO-8859-15">

<title>NeuroSoft Team - Accès PRO</title>
  
<meta name="robots" content="noindex, nofollow">

<meta name="author".content="NeuroSoft Team">
<meta name="publisher".content="Helinckx Michael">
<meta name="reply-to" content="contact@neuro-soft.fr">

<meta name="viewport" content="width=device-width" >                                                            

<link rel="shortcut icon" href="<?php echo $Home; ?>/Admin/lib/img/icone.ico">

<link rel="stylesheet" type="text/css" media="screen AND (max-width: 480px)" href="<?php echo $Home; ?>/Admin/lib/css/misenpatel.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 480px) AND (max-width: 960px)" href="<?php echo $Home; ?>/Admin/lib/css/misenpatab.css" />
<link rel="stylesheet" type="text/css" media="screen AND (min-width: 960px)" href="<?php echo $Home; ?>/Admin/lib/css/misenpapc.css" >
</head>

<body>
<header>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/Admin/lib/script/header.inc.php"); ?>
</header>

<section>
    
<nav>
<div id="MenuGauche">
<?php require_once($_SERVER['DOCUMENT_ROOT']."/Admin/lib/script/menu.inc.php"); ?>
</div>
</nav>

<article>
<?php if (isset($Erreur)) { echo "<font color='#FF0000'>".$Erreur."</font><BR />"; }
if (isset($Valid)) { echo "<font color='#009900'>".$Valid."</font><BR />"; } ?>

<H1>Liste des articles</H1></p>

<form name="FormPage" action="" method="POST">
<select name="StatuePage" required="required" onChange="this.form.submit()">
<option value="NULL" <?php if ($_SESSION['StatuePage']=="NULL") { echo "selected"; } ?>>Tous</option>
<option value="<?php echo $Home."/"; ?>" <?php if ($_SESSION['StatuePage']== $Home."/") { echo "selected"; } ?>>Accueil</option>
<option value="<?php echo $Home."/Menu/"; ?>" <?php if ($_SESSION['StatuePage']== $Home."/Menu/") { echo "selected"; } ?>>Menu</option>
<option value="<?php echo $Home."/Mentions-legales/"; ?>"<?php if ($_SESSION['StatuePage']== $Home."/Mentions-legales/") { echo "selected"; } ?>>Mentions-légales</option>
</select></p>
</form>

<table>
<tr><th>Position</th><th>Lien de page</th><th>Date de création</th><th>Action</th></tr>
<?php

while ($Article=$Select->fetch(PDO::FETCH_OBJ)) {
?>
   <tr <?php if ($Article->statue==0) { echo "class='rouge'"; } else { echo "class='vert'"; } ?>>
   <td><?php echo $Article->position; ?></td>
   <td><?php echo $Article->page; ?></td>
   <td><?php echo date("d-m-Y", time($Article->created)); ?></td>
   <td><?php echo '<a title="ApperÃ§u" href="'.$Article->page.'"><img src="'.$Home.'/Admin/lib/img/apercu.png"></a>';
   echo '<a href="'.$Home.'/Admin/Article/Nouveau/?id='.$Article->id.'"><img src="'.$Home.'/Admin/lib/img/modifier.png"></a>';
   if ($Article->statue==1) { ?>
        <a title="Désactiver" href="<?php echo $Home; ?>/Admin/Article/desactiver.php?id=<?php echo $Article->id; ?>"><img src="<?php echo $Home; ?>/Admin/lib/img/desactiver.png" alt="Désactiver"></a>
  <?php } else { ?>
        <a title="Activer" href="<?php echo $Home; ?>/Admin/Article/activer.php?id=<?php echo $Article->id; ?>"><img src="<?php echo $Home; ?>/Admin/lib/img/activer.png" alt="Activer"></a>
  <?php } 
        echo '<a title="Supprimer" href="'.$Home.'/Admin/Article/supprimer.php?id='.$Article->id.'"><img src="'.$Home.'/Admin/lib/img/supprimer.png"></a></td></tr>';
}
?>
</table>

</article>
</section>
</div>
</CENTER>
</body>

</html>