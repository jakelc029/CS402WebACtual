<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>View Update Customer</title>
<style>
label, select{
	float: left; 
	width: 6em; 
	margin-right: 1em;}

</style>
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
		
		$var = $_POST['cid'];
		
		$query = $db->prepare(" select * from customers where customerID like '" . $var . "'");
		$query->execute();
		$row = $query->fetch();
		
?>
<label></label>
<div id="formcontent">
		<h2>View/Update Customer </h2>
		<form method="post" action="updatecust.php" id="theform">
		<label>First Name: </label><input type="text" name="firstName" value="<?php echo $row['firstName'] ?>"><br/>
		<label>Last Name: </label><input type="text" name="lastName" value="<?php echo $row['lastName'] ?>"><br/>
		<label>Address:</label><input type="text" name="address" value="<?php echo $row['address'] ?>"><br/>
		<label>City:</label><input type="text" name="city" value="<?php echo $row['city'] ?>"><br/>
		<label>State: </label><input type="text" name="state" value="<?php echo $row['state'] ?>"><br/>
		<label>Postal Code: </label><input type="text" name="postalCode" value="<?php echo $row['postalCode'] ?>"><br/>
		<label>Country Code</label><select name="countryCode">
			<?php
				$query = $db->prepare(" select * from countries where countryCode like '" . $row['countryCode'] . "'");
				$query->execute();
				$newrow = $query->fetch();
			?>
			<option value="<?php echo $newrow['countryCode']?>" selected><?php echo $newrow['countryName']?></option>
			<?php
				$query = " select * from countries";
				$sth = $db->query($query);
				while($row = $sth->fetch(PDO::FETCH_ASSOC)){
					printf ("<option value='%s'>%s</option>", htmlentities($row["countryCode"]), htmlentities($row["countryName"]));
				}
			?>
		</select><br/>
		<?php
			$query = $db->prepare(" select * from customers where customerID like '" . $var . "'");
			$query->execute();
			$row = $query->fetch();
		?>
		<label>Phone: </label><input type="text" name="phone" value="<?php echo $row['phone'] ?> "><br/>
		<label>Email: </label><input type="text" name="email" value="<?php echo $row['email'] ?>"><br/>
		<label>Password: </label><input type="text" name="password" value="<?php echo $row['password'] ?>"><br/>
		<input hidden="" name="customerID" value="<?php echo $row['customerID'] ?>">
		<input type="submit" value="Update" name="update"></form><br/>
		<br/><a href='managecustomer.php'>Return to Customer Search</a>
</div>
<div id="here"></div>
<div id="work"></div>

<?php include 'view/footer.php'; ?>
</body>

</html>
