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
		<div class="editer">
			<h6>Client</h6>
				<input class="modifier" type="text" name="client">
		</div>
		<div class="editer">
			<h6>Chambre</h6>
				<input class="modifier" type="text" name="chambre">
		</div>
		<div class="editer">
			<h6>Date d'entrée</h6>
				<input class="modifier" type="date" name="entree">
		</div>
		<div class="editer">
			<h6>Date de sortie</h6>
				<input class="modifier" type="date" name="sortie">
		</div>
		<div class="editer">
			<h6>Statut</h6>
				<input class="modifier" type="text" name="statut">
		</div>
		<button name="ajout">Enregistrer</button>
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
?>


