<?php
	
	$event_id = $_GET['event_id'];
	
		try {
			include 'connectPDO.php';
		
			$stmt = $conn->prepare("DELETE FROM wdv341_event WHERE event_id='$event_id'");
			$stmt->execute();
				
			header('Location: selectEvents.php?msg=Event deleted successfully!');
		}
		catch(PDOException $e){
			header('Location: selectEvents.php?msg=Something went wrong, try again later.');
		}
?>