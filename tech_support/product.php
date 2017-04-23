
<html>
    <?php include 'view/header.php'; ?>
<head>
    <meta  charset="utf-8">
    <title>Product</title>
   
    <link rel="stylesheet" type="text/css" href="main.css">
    
  </head>
   <main>
<body>

    
    
    

<?php


    if (!isset($_POST['useremail'])){
    
echo ('<form   method="post">
  Email:<br>
  <input type="text" name="useremail" value=""><br>
  <input type="submit" name="submit" value="Submit">
</form>     
'
);}
    else{
        
    
$username=$customerID='';

 $useremail = (isset($_POST['useremail']) ?  $_POST['useremail'] : null);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 {
     
     require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
  
if($useremail==NULL){$useremail="aaa";}
     
$query="SELECT firstName,lastName, customerID FROM customers WHERE email ='". $useremail. "'";
  $result= $conn->query($query);
  $checknum_rows = $result->num_rows;
     

     
     
 if (!$result) {die($conn->error);}
  
   
if ($result->num_rows >0) {
    
    while($row = $result->fetch_assoc()) {
        
      
        $username=$row["firstName"]." ".$row["lastName"];
        $customerID=$row["customerID"];
      
        
     break;           
    }
    

echo "Customer:   $username<br><br>";   
     $_POST['username'] = $username;
    
    
      require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) 
      die($conn->connect_error);
     
    
$productquery="SELECT productCode, name FROM products";
  $productresult= $conn->query($productquery);
  $product_rows = $productresult->num_rows;
     
    $product_array=array();
    
    
    if(!isset($_POST['productchoice']
             )){
    echo('<form method="post" action="action.php">');
        echo '<input type=hidden value="'.$customerID.'" name="customerID">';
      echo ('<label>Product Registration Choices:</label>
     <select name="productchoice">');


    while($row = $productresult->fetch_assoc()) {
        
          $pname=$row['name'];
          echo '<option value="'.$pname.'">'.$pname.'</option>';   
    }

    echo '</select><br>';
    echo '<input type="submit" value="Submit">
    </form>';
        
        $choicename = (isset($_POST['productchoice']) ?  $_POST['productchoice'] : null);
    
echo $choicename;
       
    }
    
    
    

    











} 
    if(!$username){
   echo "Customer Email not found.<br>";
        echo '<a href="product.php">Try again.</a>';
        unset($_POST['useremail']);
        $_POST = array();
        
}

   
     
  
     
     
  }
    }


?>
</body>
</html>