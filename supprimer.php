<?php
require('bdd.php');

?>

<link rel="stylesheet" type="text/css" href="style.css">
<header>
	<div class="header">
		<img src="RitzCarlton.png">
		<h3>Suppression d'une réservation</h3>
	</div>

</header>

<main>
	<h4>Êtes-vous certain de vouloir supprimer la réservation ?</h4>
	<?php
		if (isset($_POST['supprimer'])) {
			$news = $pdo->query('SELECT * FROM clients')->fetchAll();
				foreach ($news as $row) {
					echo '<p name="nom" value="'.$row['id'].'">'.$row['prenom']." ".$row['nom'].'</p>';
				}
		}
	?>

<!-- 	<?php $news = $pdo->query('SELECT * FROM chambres')->fetchAll();
		foreach ($news as $row) {
			echo '<p name="prenom" value="'.$row['id'].'">'.$row['numero'].'</p>';
		}
	?>

	<?php $news = $pdo->query('SELECT * FROM reservations')->fetchAll();
		foreach ($news as $row) {
			echo '<p name="du" value="'.$row['id'].'">du : '.$row['dateEntree'].'</p>';
			echo '<p name="au" value="'.$row['id'].'">au : '.$row['dateSortie'].'</p>';
		}
	?> -->

	<form class="boutons" action="index.php" method="post">
		<button name="annule" class="annule">Annuler</button>
		<button name="confirme" class="confirme">Confirmer la suppression</button>
	</form>

<?php
	if (isset($_POST['confirme'])) {
	try {
		$suppr = $pdo->prepare("DELETE FROM reservations WHERE");
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	echo "Suppression effectuée";
	header('Refresh: 2; url=../index.php');
}
?>

</main>

