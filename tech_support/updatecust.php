<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Update Confirmation</title>
</head>

<body>

	<?php
		include 'view/header.php'; 
			try {
  			$db = new PDO("mysql:host=64.119.131.183;dbname=cs402team1", "CS402Team1", "CSTeam1");
  			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
  			printf("Unable to open database: %s\n", $e->getMessage());
		}		

		$query = "UPDATE customers SET firstName = :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode = :postalCode, countryCode = :countryCode, phone = :phone, email = :email, password = :password   WHERE customerID = :customerID";
		$stmt = $db->prepare($query);                                  
		$stmt->bindParam(':firstName', $_POST['firstName'], PDO::PARAM_STR);       
		$stmt->bindParam(':lastName', $_POST['lastName'], PDO::PARAM_STR);    
		$stmt->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
		$stmt->bindParam(':city', $_POST['city'], PDO::PARAM_STR); 
		$stmt->bindParam(':state', $_POST['state'], PDO::PARAM_STR);  
		$stmt->bindParam(':postalCode', $_POST['postalCode'], PDO::PARAM_INT);
		$stmt->bindParam(':countryCode', $_POST['countryCode'], PDO::PARAM_STR);
		$stmt->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
		$stmt->bindParam(':customerID', $_POST['customerID'], PDO::PARAM_INT);   
		$stmt->execute(); 
				
		?>
		
		<div>
			<p>Customer updated successfully</p>
		</div>
		
		<?php include 'view/footer.php'; ?>
</body>

</html>
