<?php 
	include 'connectPDO.php';
	
	$stmt = $conn->prepare("SELECT event_id, event_name, event_description, event_presenter, event_date, event_time FROM wdv341_event");
	$stmt->execute();	
?>
<table border='1'>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Description</td>
		<td>Presenter</td>
		<td>Date</td>
		<td>Time</td>
<?php
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>" . $row['event_id'] . "</td>";
			echo "<td>" . $row['event_name'] . "</td>";	
			echo "<td>" . $row['event_description'] . "</td>";
			echo "<td>" . $row['event_presenter'] . "</td>";
			echo "<td>" . $row['event_date'] . "</td>";
			echo "<td>" . $row['event_time'] . "</td>";
		echo "</tr>";
	}
?>
</table>