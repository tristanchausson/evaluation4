<?php
require('bdd.php');


?>

<link rel="stylesheet" type="text/css" href="style.css">
<header>
	<div class="header">
		<img src="RitzCarlton.png">
		<h3>Ajouter/Modifier une réservation</h3>
	</div>

</header>
<main class="main">
	<form method="post" action="index.php">
<?php
	if (isset($_POST['modifier'])) {
	$client  = $_POST['client'];
	$chambre = $_POST['chambre'];
	$entree  = $_POST['entree'];
	$sortie  = $_POST['sortie'];
	$statut  = $_POST['statut'];
	$news = $pdo->query('SELECT * FROM reservations INNER JOIN clients ON clients.id=reservations.clientId INNER JOIN chambres ON chambres.id=reservations.chambreId')->fetchAll(PDO::FETCH_ASSOC);
		foreach ($news as $row) {
			echo '<div class="editer"><h6>Client :</h6><input class="modifier" type="text" name="client" value="'.$row['clientId'].'" placeholder="'.$row['clientId'].'"></div>';
			echo '<div class="editer"><h6>Chambre :</h6><input class="modifier" type="text" name="client" value="'.$row['chambreId'].'" placeholder="'.$row['chambreId'].'"></div>';
			echo '<div class="editer"><h6>Date Entrée :</h6><input class="modifier" type="date" name="client" value="'.$row['dateEntree'].'" placeholder="'.$row['dateEntree'].'"></div>';
			echo '<div class="editer"><h6>Date Sortie :</h6><input class="modifier" type="date" name="client" value="'.$row['dateSortie'].'" placeholder="'.$row['dateSortie'].'"></div>';
			echo '<div class="editer"><h6>Statut :</h6><input class="modifier" type="text" name="client" value="'.$row['statut'].'" placeholder="'.$row['statut'].'"></div>';
		}	
	}
?>
		<div class="editer">
			<h6>Client :</h6>
				<input class="modifier" type="text" name="client">
		</div>
		<div class="editer">
			<h6>Chambre :</h6>
				<input class="modifier" type="text" name="chambre">
		</div>
		<div class="editer">
			<h6>Date d'entrée :</h6>
				<input class="modifier" type="date" name="entree">
		</div>
		<div class="editer">
			<h6>Date de sortie :</h6>
				<input class="modifier" type="date" name="sortie">
		</div>
		<div class="editer">
			<h6>Statut :</h6>
				<input class="modifier" type="text" name="statut">
		</div>
		<div class="boutons">
			<button class="add" name="ajout">Ajouter</button>
			<button class="modify" name="modif">Modifier</button>
		</div>
		<p><a href="index.php">Retour</a></p>
	</form>
</main>

<?php
if (isset($_POST['ajout'])) {
	$client  = $_POST['client'];
	$chambre = $_POST['chambre'];
	$entree  = $_POST['entree'];
	$sortie  = $_POST['sortie'];
	$statut  = $_POST['statut'];
	try {
		$ajout = $pdo->prepare("INSERT INTO reservation (clientId, chambreId, dateEntree, dateSortie, statut, dateModification) VALUES (:client, :chambre, :entree, :sortie, :statut, :modification)");
		$ajout -> execute(array(':client' => $client, ':chambre' => $chambre, ':entree' => $entree, ':sortie' => $sortie, ':statut' => $statut, ':modification' => new DateTime('Y-m-d H:i:s')));
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	echo "Réservation enregistrée";
	header('Refresh: 2; url=../index.php');
}

if (isset($_POST['modif'])) {
	$client  = $_POST['client'];
	$chambre = $_POST['chambre'];
	$entree  = $_POST['entree'];
	$sortie  = $_POST['sortie'];
	$statut  = $_POST['statut'];
	try {
		$modif = $pdo->prepare("UPDATE personnes SET clientId = '$clientId', chambreId = '$chambreId', dateEntree = '$dateEntree', dateSortie = '$dateSortie', statut = '$statut'");
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	echo "Modification enregistrée";
	header('Refresh: 2; url=../index.php');
}
?>


