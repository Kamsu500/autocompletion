<?php
	if(isset($_POST['chef'])){
		header('Content-type: text/html; charset=iso-8859-1');
		// on inclut la connexion
		mysql_connect('localhost', 'root', '');
		mysql_select_db('bdd');
		
		// on fait la requête
		$sql = "SELECT `nom`, `prenom`, `id`
				FROM `personne`
				WHERE `nom` LIKE '".$_POST['chef']."%'";
		$req = mysql_query($sql);
		
		$i = 0;
		echo '<ul class="contacts">';
		// on boucle sur tous les éléments
		while($autoCompletion = mysql_fetch_assoc($req)){
			echo '
			<li class="contact"><div class="image"><img src="personne/'.$autoCompletion['id'].'-mini.jpg"/></div><div class="nom">'.$autoCompletion['nom'].'</div>
			<div class="prenom">
			<span class="informal">'.$autoCompletion['prenom'].'</span>
			</div>
			</li>';
			// on s'arrête s’il y en a trop
			if (++$i >= 10)
				die('<li>...</li></ul>');
		}
		echo '</ul>';
		die();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Une autocompletion avancée en AJAX</title>
<script type="text/javascript" src="lib/prototype.js"></script>
<script type="text/javascript" src="lib/scriptaculous.js"></script>
<script type="text/javascript" src="lib/autocompletion.js"></script>
<style type="text/css">
body{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-align: justify;
	font-size: 12px;
	color: #565656;
}

img {
    border: none;
} 

ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
/* Autocompletion */
.update{
	position:absolute;
	width:250px;
	background-color:white;
	border:1px solid #888;
	margin:0px;
	padding:0px;
}

ul.contacts  {
	list-style-type: none;
	margin:0px;
	padding:0px;
	text-align: left;
}
ul.contacts li.selected { background-color: #ffb; cursor: pointer; }
li.contact {
	list-style-type: none;
	display:block;
	margin:0;
	padding:2px;
	height:32px;
}
li.contact div.image {
	float:left;
	width:32px;
	height:32px;
	margin-right:8px;
}
li.contact div.nom {
	font-weight:bold;
	font-size:12px;
	line-height:1.2em;
}
</style>
</head>
<body>

Liste des personnes présentes dans la base :<br/>
<?
	mysql_connect('localhost', 'root', '');
	mysql_select_db('bdd');
	
	// on fait la requête
	$sql = "SELECT `nom`, `prenom`, `id`
			FROM `personne`
			WHERE `nom` LIKE '".$_POST['chef']."%'";
	$req = mysql_query($sql);
	while($autoCompletion = mysql_fetch_assoc($req)){
		echo '<u>'.$autoCompletion['id'].'.</u> '.$autoCompletion['nom'].'<br/>';
	}
?>
<br/>
<form action="?" method="post" onsubmit="return false;">
	<label for="chef">Chef : </label>
	<input type="input" name="chef" id="chef" value="" />
	<div class="update" id="chef_update"></div>
	<input type="hidden" name="chef_id" id="chef_id" value="" /> 
</form>
<br/>
Numéro de la personne avec son nom : <span id="chef_log"></span>

<script type="text/javascript">
new Ajax.Autocompleter ('chef',
						'chef_update',
						'autocompletion.php',
						{
							method: 'post',
							paramName: 'chef',
							afterUpdateElement: ac_return
						});
</script>

</body>
</html>