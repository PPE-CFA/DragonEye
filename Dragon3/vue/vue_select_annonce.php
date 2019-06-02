<h2> Les Annonces ! <h2>

<?php
	echo "<table border = 1>
	<tr> <td> Photo </td><td> Annonce </td> <td> Jeux </td><td> Qui? </td><td> Age </td><td> Categorie </td><td> Description </td></tr> ";

	foreach ($resultats as $unRes)
	{
		echo "<tr>
					<td><img = src=".$unRes['url']." /></td>
					<td> ".$unRes['IdAnnonce']."</td>
					<td> ".$unRes['designation']."</td>
          <td> ".$unRes['nom']."</td>
          <td> ".$unRes['age_requis']."</td>
          <td> ".$unRes['libelle']."</td>
          <td> ".$unRes['Description']."</td> </tr>";
	}

	echo "</table>";
?>
