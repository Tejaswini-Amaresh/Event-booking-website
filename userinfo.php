<!DOCTYPE html>
<html>
<head>
	<title>Userinfo</title>
	 <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<style type="text/css">
		
@font-face {
    font-family: myfont;
    src: url(font7.ttf);
    
}

.h,a{
	font-family:cursive;
	font-size: 20px;
	color: white;
	text-shadow: 1px 1px 1px white;
	text-align: center;
}
p{
	font-family: cursive;
	font-size: 40px;
	color: white;
	text-shadow: 1px 1px 1px #26ebfb;
	text-align: center;
}
.user{
	font-family: Calibri;
	font-size: 30px;
	color: white;
	text-shadow: 1px 1px 1px #462d59;
	text-align: center;
	font-style: italic;

	}
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #d7bdec;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: white;
    cursor: pointer;
}

body{
  background: url('profile.jpg');
  background-size:cover;
  background-position: center;
  background-attachment: fixed;
}


	</style>
}
</head>


<body >
	<div class="imgcontainer">
		    <span onclick="window.open('index.php')" class="close" title="Close Modal">&times;</span>
		</div>
	
	<?php
	$conn=mysqli_connect("localhost", "root", "", "songs");
	if (!$conn){

	die (mysqli_error());

	}
	session_start();
	$Username=$_SESSION["u_id"];
	$query = "SELECT u_pref FROM PREF WHERE u_id='$Username'";
	$result= mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	
	echo'<div class="user" style="font-size:50px"><u>'.$Username."'s Profile</u> </div><br>";

	echo '<div  style="padding-left:75%;color:white"><ul>
                                    
                                    
                                     <a href="delete.php">Delete Account</a>   
                                    
                                    
                                </ul></div><hr style="border-color:white">';
	
	echo '<div class="user">'." <p>Languages Preferred:</p>";
	foreach ($result as $row) {
		if($row['u_pref']=='KANNADA' or $row['u_pref']=='HINDI' or $row['u_pref']=='ENGLISH')
		{
			echo $row['u_pref']."<br>";
		}
	}
	echo "<p>Genre Preferred:</p>";
	foreach ($result as $row) {
		if(!($row['u_pref']=='KANNADA' or $row['u_pref']=='HINDI' or $row['u_pref']=='ENGLISH'))
		{
			echo $row['u_pref']."<br>";
		}
	}



	echo '</div>';

	   
		

	?>




	

	

</body>
</html>