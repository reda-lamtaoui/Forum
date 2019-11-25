<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" type="image/jpeg" href="images/Logo_Lon.jpeg"> 
<title>Forum</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<body>
	<?php
	include 'BD.php';
include 'user.php';
	 if(isset($_POST['username2'])){
        $UserConnecte = new User();
        $UserConnecte->login($_POST['username2'],$_POST['password']);
        $_SESSION["id"]=$UserConnecte->getId();
       $_SESSION["name"]=$UserConnecte->getName();
       $_SESSION["username"]=$UserConnecte->getUsername();
    }
     
?>
	<?php
if(isset($_POST['deco'])){
  session_destroy();
  session_start();
     }
?>
 <?php

if(isset($_POST['name'])){
	if ($_POST['civilite']=="Mr") {
		$avatar="1.jpg";
	}else{
		$avatar="2.jpg";
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
        $user = new User();
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
						<?php 
						if(isset($_SESSION['id'])){
							?>
							<li id="nav6"><a onclick="$(document).ready(function(){
        								profilogin();
    									})">reda<span><b>Profil</b></span></a></li>
							<?php
						}else{
							?>
										<li id="nav6"><a onclick="$(document).ready(function(){
        								userlogin();
    									})">Login<span><b>Sign Up</b></span></a></li>
    						<?php
    					} ?>
					</ul>
				</nav>
		
		
	</div>
	<?php include('login.php'); ?>
	<?php include('profil.php'); ?>
</body>
</html>
