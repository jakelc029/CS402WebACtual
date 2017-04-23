<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Manage Customer</title>
<script>
function searchCust(str) {
    if (str == "") {
        document.getElementById("results").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("results").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>
	<?php 
		include 'view/header.php'; 
		
	?>

	<div id="search">
		<h3>Customer Search</h3><br/>
		Last Name
		<textarea id="searchval" placeholder="smith"></textarea>
		<button onclick="searchCust(document.getElementById('searchval').value)">Search</button>
	</div>
	
	<div id="results"></div>

	<?php include 'view/footer.php'; ?>
</body>

</html>
