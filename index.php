<?php
require('bdd.php');


?>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<header>
	<div class="header">
		<img src="RitzCarlton.png">
		<h1>GESTION DES RÉSERVATIONS</h1>
	</div>
	<form method="post" action="index.php">
		<select name="reservation" class="resa">
			<option value="filter" selected disabled>Filtres</option>
			<option name="all" value="toutes">Toutes</option>
			<option name="valide" value="validees">Validées</option>
			<option name="refuse" value="refusees">Refusées</option>
			<option name="attente" value="attente">En attente</option>
		</select>
	</form>
</header>

<main>
	<form method="post" action="editer.php">
		<table>
			<tr>
				<th>ID</th>
				<th>Client</th>
				<th>Chambre</th>
				<th>Dates</th>
				<th>Statut</th>
				<th>Actions</th>
			</tr>
			<?php
			$news = $pdo->query('SELECT * FROM reservations INNER JOIN clients ON clients.id=reservations.clientId INNER JOIN chambres ON chambres.id=reservations.chambreId')->fetchAll(PDO::FETCH_ASSOC);
				foreach ($news as $row) {
					echo '<tr><td name="id" value="'.$row['id'].'">'.$row['id'].'</td>';
					echo '<td name="client" value="'.$row['clientId'].'">'.$row['clientId'].'</td>';
					echo '<td name="chambre" value="'.$row['chambreId'].'">'.$row['chambreId'].'</td>';
					echo '<td name="date" value="'.$row['dateEntree'].'">'.$row['dateEntree']." ".$row['dateSortie'].'</td>';
					echo '<td name="statut" value="'.$row['statut'].'">'.$row['statut'].'</td>';
					echo '<td value="'.$row['edit'].'"><p><a href="editer.php" name="modifier">Editer</a> - <a href="supprimer.php" name="supprimer">Supprimer</a></p></td></tr>';
				}
			?>
		</table>
		<button>Créer une nouvelle réservation</button>
	</form>

</main>