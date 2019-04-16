<h2> Les evenements ! <h2>

<?php
	echo "<table border = 1>
	<tr> <td> Designation </td> <td> Date </td><td> Heure </td>  </tr> ";
	foreach ($resultats as $unRes)
	{
		echo "<tr>	
					<td> ".$unRes['designation']."</td>
					<td> ".$unRes['date_event']."</td>
          <td> ".$unRes['heure_event']."</td> </tr>";
	}
	echo "</table>";
?>
