<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title -->
    <title>VALIDATION</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

</body>
</html>

<?php
$errors=array();
if(isset($_POST['login'])) {
	$Username=$_POST['ad_id'];	
	$password=$_POST['ad_pwd'];
		$conn=mysqli_connect("localhost", "root", "", "songs");
		//$password= md5($pass); //Encrypting password
		$sql="SELECT * FROM ADMIN WHERE ad_pwd = '$password' AND ad_id = '$Username'";
		$q=mysqli_query($conn,$sql);
		if((mysqli_num_rows($q))){
		// 	die("YES, THIS WORKS.");
			session_start();
			$_SESSION["ad_id"]=$Username;
			$_SESSION["success"]=true;
			header('location: upload.php'); //redirect to home page
		}
	else{
			echo "
				<body style='background-image: url(img/bg-img/bg-3.jpg);'>
					<div align='center'>
					<div>
						<h1  align=center style='color:white;'><br><br>
						<span>Not a valid Admin Id/Password</span>
						<br><a href='adminlogin.html'><span style='color:white;'>Click here to continue</span></a>
						</h1>
					</div>
				</body>";
		}
}


// echo "flag2";
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['u_id']);
	header('location: index.php');
}
?>