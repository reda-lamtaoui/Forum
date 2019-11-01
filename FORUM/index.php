<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" type="image/jpeg" href="images/Logo_Lon.jpeg"> 
<title>LON | Traveaux & Devis</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body>
 <?php
include 'BD.php';
include 'user.php';
if(isset($_POST['name'])){
	if ($_POST['civilite']=="Mr") {
		$avatar="bw2 - Copie.jpg";
	}else{
		$avatar="bw2 - Copie.jpg";
	}
        //get username and password
        $data =array("name" =>$_POST['name'], 
              "email" =>$_POST['email'] , 
              // "avatar" =>"$_POST['avatar']" , 
              "avatar" =>$avatar , 
              "username" =>$_POST['username'] , 
              "password" =>$_POST['password'] , 
              "about" =>$_POST['about'] ,
              "joinDate"=>date("d-m-Y")
      );
        //Create user object
        $user = new User;
        $user->createUser($data);
     }
?>
	<div class="body1">
				<nav>
					<ul id="menu">
						<li id="nav1" class="active"><a href="/">Acceuil<span><b>Bienvenue!</b></span></a></li>
						<li id="nav2"><a>A propos<span><b>FORUM</b></span></a></li>
						<li id="nav3"><a href="Services">Sujet<span><b>pour vous</b></span></a></li>
						<!--Contacts--> <li id="nav5"><a href="">Contacts<span><b></b></span></a></li>
										<li id="nav6"><a onclick="$(document).ready(function(){
        								userlogin();
    									})">Login<span><b>Sign Up</b></span></a></li>
					</ul>
				</nav>
		
		
	</div>
	<?php include('login.php'); ?>
	 <?php
	 if(isset($_POST['username'])){
        $usern = new User;
        $usern->login($_POST['username'],$_POST['password']);
    }
     
?>
</body>
</html>