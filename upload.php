<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	 <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<style type="text/css">
		
@font-face {
    font-family: myfont;
    src: url(font7.ttf);
    
}


p{
	font-family: cursive;
	font-size: 40px;
	color: #462d59;
	text-shadow: 1px 1px 1px red;
	text-align: center;
}
label{
  font-size: 0.9em;
  color: red;
  font-weight: 100;
  width: 30%;
  display: block;
  border: none;
  padding: 0.8em;
  border: solid 1px red;
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #462d59 4%);
  font-family: 'Roboto', sans-serif;
  margin-left: 100px;
  border-radius: 20px;
  box-shadow: 1px 1px 1px #26ebfb;
}

input[type="submit"],input[type="reset"] {
  font-size: .9em;
  color: #fff;
  background: red;
  outline: none;
  border: 1px solid blackb;
  cursor: pointer;
  padding: 0.9em;
  -webkit-appearance: none;
  width: 20%;
  
  
  border-radius: 20px;
  font-family: 'Roboto', sans-serif;
}

input[type="submit"]:hover ,input[type="reset"]:hover {
  -webkit-transition: .5s all;
  -moz-transition: .5s all;
  -o-transition: .5s all;
  -ms-transition: .5s all;
  transition: .5s all;
  background: white;
  color: black;
	}
/*-----------------------*/
input[type="text"]:focus, input[type="date"]:focus, textarea:focus ,input[type="number"]:focus{
  outline: none;      /* Remove default outline and use border or box-shadow */
  box-shadow: 1px 1px 1px #26ebfb; /* Full freedom. (works also with border-radius) */
}

#interests{
    margin:40px;
    background: #d7bdec;
    color:#462d59;
    text-shadow:0 1px 0 rgba(0,0,0,0.4);
}

.user{
	font-family: Calibri;
	font-size: 30px;
	color: #462d59;
	text-shadow: 1px 1px 1px black;
	text-align: center;
	font-style: italic;

	}
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #462d59;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: white;
    cursor: pointer;
}

body{
  background: url('upload.jpg');
  background-size:cover;
  background-position: center;
  background-attachment: fixed;
}


	</style>
}
</head>


<body >
	<p>Yay! New Songs ...</p>
	<div style="padding-left: 33%">
	<form action="done.php" method="POST" enctype="multipart/form-data">
		<label>Enter Album Id<input type="text" name="alb_id"></label>
		<label>Enter Album Name<input type="text" name="alb_name"></label>
		<label>Enter Song Id<input type="text" name="s_id"></label>
		<label>Enter Song Name<input type="text" name="s_name"></label>
		<label>Enter Artist Name<input type="text" name="art_name"></label>
		<label>Enter Artist Id<input type="text" name="art_id"></label>



		<label>Select Language which the song belongs to
			<select name="s_lang">
				<option value="KANNADA">Kannada</option>
				<option value="HINDI">Hindi</option>
				<option value="ENGLISH">English</option>
			
			</select>
		</label>
		<label>Select Genre which the song belongs to
			<select name="s_genre">
				<option value="POP">Pop</option>
				<option value="POP ROCK">Pop rock</option>
				<option value="ELECTRONIC">Electronic</option>
				<option value="R&B">Rhythm and Blues</option>
				<option value="MOTIVATIONAL">Motivation</option>
				<option value="DEVOTIONAL">Devotion</option>
				<option value="SOFT">Soft</option>
				<option value="SAD">Sad</option>
				<option value="HAPPY">Happy</option>
				<option value="PARTY">Party</option>
				<option value="DANCE">Dance</option>
				<option value="ROMANTIC">Romantic</option>
				<option value="INDO WESTERN">Indo Western</option>


			
			</select>




		</label>
		<label>Enter year of release<input type="number" name="s_yor"></label>
		<label>Upload audio file here 
		<input type="file" name="audioFile">
		<input type="submit" value="Upload" name="save_audio"></label>
		<div style="padding-left: 18%"><input type="submit" name="submit"></div>
		
	</form>

</div>
</body>
</html>