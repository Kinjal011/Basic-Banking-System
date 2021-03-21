<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>
	<style type="text/css">
		body{
			background-image: url("bg1.jpg");
			margin: 0;
			background-size: cover;
		}
		h2{
			text-align: center;
			font-size: 80px;
		}
		
		button{
      		font-size: 30px;
      		padding: 25px 50px;
      		justify-content: center;
      		background-color: #071a3d;
			  color:white;
		}
		a{
      color: white;
      font-size:20px;
    }

    
    .container{
    	padding-left: 625px;

    }
	</style>
	<link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
        
            
		<a  class="active" href="index.php"><i class="fa fa-home"></i> Home</a>
		<a  href="table.php"></i> User List</a>
		<a href="transaction.php"></i> Transaction History</a>
		</div>
		<?php $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "basic banking system";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); ?>
		
		<?php 
		$sender = $_POST["sender"];
		$reciever = $_POST["reciever"];
		$amount = $_POST["amount"];
		
	
		 $sql5="SELECT `name`, `balance` FROM `user_list` WHERE name='$sender'";
		$result5=mysqli_query($conn, $sql5); 
		$row=mysqli_fetch_array($result5) ;
		$money= $row['balance'];
	
		
		
		?>
	
	
	
		<?php $sql3 = "SELECT `name`,`id`  FROM `user_list` WHERE Name='$reciever' ";
		$result3 = mysqli_query($conn, $sql3); 
		
		if (mysqli_fetch_assoc($result3)<1){ 
			 include 'user.php';
		 } 
		elseif ($money<$amount) {
			 include 'user 2.php';
			 
		 }
	
		else{
			 $sql4 = "UPDATE userlist SET balance=balance-$amount WHERE Name='$sender'";
			$sql2= "UPDATE userlist SET balance=balance+$amount WHERE Name='$reciever' ";
			 $result2 = mysqli_query($conn, $sql2); 
			 $result3 = mysqli_query($conn, $sql4);
			 $sql = "INSERT INTO trans_list VALUES ('$sender','$reciever',  $amount)";
			$result = mysqli_query($conn, $sql); 
			$sql7 = "INSERT INTO trans_list( `sender`, `reciever`, `amount`) VALUES ('$sender','$reciever','$amount')";
	$query = mysqli_query($conn, $sql7);
			 include 'user 1.php';
			 
	
		 }
	
	
	
		?>
		
		
		
	
		
	
	
	
	</body>
	</html>