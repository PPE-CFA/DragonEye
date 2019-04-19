<h2> Les evenements ! <h2>

<?php
	echo "<table border = 1>
	<tr> <td> Id Evenement </td><td> Designation </td> <td> Date </td><td> Heure </td> <td> Id Lieu </td> </tr> ";
	foreach ($resultats as $unRes)
	{
		echo "<tr>	<td> ".$unRes['id']."</td>
					<td> ".$unRes['designation']."</td>
					<td> ".$unRes['date']."</td>
          <td> ".$unRes['heure']."</td>
					<td> ".$unRes['idlieu']."</td> </tr>";
	}
	echo "</table>";
?>
