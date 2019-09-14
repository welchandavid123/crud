<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$pname=$_POST['pname'];
	$pdes=$_POST['pdes'];
	$price=$_POST['price'];	
	$quan=$_POST['quan'];
	
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
	} else {	
		//updating the table
		$sql = "UPDATE users SET pname=:pname, pdes=:pdes, price=:price, quan=:quan WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':pname', $pname);
		$query->bindparam(':pdes', $pdes);
		$query->bindparam(':price', $price);
		$query->bindparam(':pquan', $pquan);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$pname = $row['pname'];
	$pdes = $row['pdes'];
	$price = $row['price'];
	$quan = $row['pquan'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Product Name</td>
				<td><input type="text" name="pname" value="<?php echo $pname;?>"></td>
			</tr>
			<tr> 
				<td>Product Description</td>
				<td><input type="text" name="pdes" value="<?php echo $pdes;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="pquan" value="<?php echo $quan;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
