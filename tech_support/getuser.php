<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>

</head>

<body>

	<?php
		$q = strval($_GET['q']);
		try {
  			$db = new PDO("mysql:host=64.119.131.183;dbname=cs402team1", "CS402Team1", "CSTeam1");
  			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
  			printf("Unable to open database: %s\n", $e->getMessage());
		}
		
		$query = " select * from customers where lastName like '" . $q . "'";
		
		try {
  			$sth = $db->query($query);
  			$rows = $sth->rowCount();
  			if ($rows == 0) {
    			echo "Customer not found";
    			exit;
  			}
  			printf("<table><tr><th>Name</th><th>Email Address</th><th>City</th><th style='display:none;'></th><th></th><b/></tr>");
  				
  			while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
  	    		printf( "<tr> <td> %s %s </td> <td> %s </td> <td> %s </td> <td> <form method='post' action='viewcustomer.php'><input type='submit' value='Select'><input type='hidden' name='cid' value='%s'></form> </td> </tr>", htmlentities($row["firstName"]), htmlentities($row["lastName"]), htmlentities($row["email"]), htmlentities($row["city"]), htmlentities($row["customerID"]));
   			}
		}
		catch (PDOException $e) {
  			echo "We had a problem: %s\n", $e->getMessage();
		}
		echo "</table>";
?>

</body>

</html>
