<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$pname = $_POST['pname'];
	$pdes = $_POST['pdes'];
	$price = $_POST['price'];
	$pquan = $_POST['pquan'];
		
	// checking empty fields
	if(empty($pname) || empty($pdes) || empty($price) || empty($pquan)) {
				
		if(empty($pname)) {
			echo "<font color='red'>Product Name field is empty.</font><br/>";
		}
		
		if(empty($pdes)) {
			echo "<font color='red'>Product Description field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($pquan)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO users(pname, pdes, price, pquan) VALUES(:pname, :pdes, :price, :pquan)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdes', $pdes);
		$query->bindparam(':price', $price);
		$query->bindparam(':quan', $pquan);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
