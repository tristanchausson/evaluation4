SELECT reservations.id, clients.nom, clients.prenom, chambres.nom, reservations.dateEntree, reservations.dateSortie, reservations.statut FROM reservations INNER JOIN clients ON clients.id=reservations.clientId INNER JOIN chambres ON chambres.id=reservations.chambreId

Cette query fonctionne très bien sur phpmyadmin, elle affiche exactement ce que je veux, mais ne fonctionne pas sur mon code
