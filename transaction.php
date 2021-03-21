  
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaction History</title>
	<style type="text/css">
		 table{
            border: 2px solid black;
            height: 100px;
            color: black;
            font-size: 20px;
            /* border-color: white; */
            
        }
        tr, th, td {
        	border: 1px solid #071a3d ;
            border: 2px solid black;
        }
        th,td{
        	text-align: center;
            border: 2px solid black;
        }
        th{
        	background-color: #3a52d6;
        	color: white;
            border: 2px solid black;
        }
        body{
        	background-image: url("bg1.jpg");
        	margin: 0;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .middle{
        	margin-left: auto;
        	margin-right: auto;
            width: 800px;
        }
        h1{
        	text-align: center;
        	font-size: 40px;
            color: #250791;
            margin-top:5px;
        }
        a{
            color: white;
            font-size:20px;
        }
        tr{
            font-size:25px;
            border: 2px solid black;    
            background-color: #f2f2f2;
            
        }
        tr:hover{
            background-color: #d279a6;
        }
	</style>
	<link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
<?php include 'connection.php' ?>
    <div class="topnav" id="myTopnav">
        
            
      <a href="index.php" class="active" ><i class="fa fa-home"></i>Home</a>
      <a href="transaction.php">TRANSCATION </a>
      <a href="table.php">USER LIST</a>
     
    </div>
	

	<h1><u>TRANSACTION HISTORY</u></h1>

	

	<table class="middle">
    <thead>
        <tr>
        <!-- <th>Sr. No</th> -->
            <th>Sender</th>
            <th>Receiver</th>
            <th>Amount</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <?php $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "basic banking system";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
     $sql = "SELECT * FROM `trans`";
      $result = mysqli_query($conn, $sql);?>
      <?php while( $row = mysqli_fetch_array($result)) : ?>
    <tr>
        <!--Each table column is echoed in to a td cell-->
        
        <td><?php echo $row['sender']; ?></td>
        <td><?php echo $row['reciever']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['date_time']; ?> </td>
    </tr>
    <?php endwhile ?>
</tbody>
</table>
    <tbody>
    </body>
    </html>