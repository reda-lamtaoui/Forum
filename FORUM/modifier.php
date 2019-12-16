<?php
session_start();
include 'Class/model/BD.php';
include 'Class/model/user.php';
include 'Class/model/categorie.php';
include 'Class/model/topic.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" type="image/jpeg" href="images/Logo_Lon.jpeg"> 
<title>Forum</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
  <link href="css/templatemo-style.css" rel="stylesheet" />
  <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 900px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
   <?php 
   if (isset($_SESSION["id"])) {
     $UserConnecte=new user();
$UserConnecte->loadUser($_SESSION["id"]);
   }else{
    header('Location:index.php');
    exit();
   }

?>
  <?php

if(isset($_POST['modification'])){
        //get username and password
        $data =array("name" =>$_POST['name'], 
              "username" =>$_POST['username'] , 
              "password" =>$_POST['password'] , 
              "about" =>$_POST['about']
      );
        //Create user object
        $UserConnecte->modifier($data,$_SESSION["id"]);
     }
if(isset($_POST['deco'])){
  session_destroy();
  session_start();
     }
?>
<!--  <div class="body1">
        <nav>
          <ul id="menu">
            <li id="nav1" class="active"><a href="/">Acceuil<span><b>Bienvenue!</b></span></a></li>
            <li id="nav2"><a>A propos<span><b>FORUM</b></span></a></li>
            <li id="nav3"><a href="Services">Sujet<span><b>pour vous</b></span></a></li>
             <li id="nav5"><a href="">Contacts<span><b></b></span></a></li>
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
    
    
  </div> -->
  
<div class="container">
  <!-- Top box -->
    <!-- Logo & Site Name -->
    <div class="placeholder">
      <div class="parallax-window" data-parallax="scroll" data-image-src="img/10-03-forum.jpg">
        <div class="tm-header">
          <div class="row tm-header-inner">
            <div class="col-md-6 col-12">
              <img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
              <div class="tm-site-text-box">
                <h1 class="tm-site-title">Ader Forum</h1>
                <h6 class="tm-site-description">new Topics everyday</h6>  
              </div>
            </div>
            <nav class="col-md-6 col-12 tm-nav">
              <ul class="tm-nav-ul">
                <li class="tm-nav-li"><a href="index.php" class="tm-nav-link active">Home</a></li>
                <li class="tm-nav-li"><a href="#" class="tm-nav-link">About</a></li>
                <li class="tm-nav-li"><a href="#" class="tm-nav-link">Contact</a></li>
                <?php 
            if(isset($_SESSION['connexion'])){
              ?>
             <div class="dropdown">
   <li class="tm-nav-li"><a >Profil</a></li>
  <div class="dropdown-content">
    <a href="profil" class="tm-nav-link">Paramétre</a>
     <form action="index" method="Post" enctype="multipart/form-data" >
     <input name="deco" class="form-control" type="hidden">
    <button type="submit" class="tm-nav-link" style="background-color: red;">sign out</button>
  </form>
  </div>
</div>
              <?php
            }else{
              ?>
                    <li class="tm-nav-li"><a onclick="$(document).ready(function(){
                        userlogin();
                      })" class="tm-nav-link">Signup/signin</a></li>
                <?php
              } ?>
                <!-- <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Signup/signin</a></li> -->
              </ul>
            </nav>  
          </div>
        </div>
      </div>
    </div>
   
<main>
      <div class="chemin">
      <p><img src="img/home.svg">-><a href="index.php">Home</a>-><a href="profil">profil</a>-><a href="modifier">modification</a></p>
      </div>
      <h2 style="text-align:center">User Profile</h2>

<div class="card">
   <form enctype="multipart/form-data" method="post" action="">
                    
                  <div class="modal-body">
                      <?php
                       echo '<div class="row form-r">
                            <input placeholder="Nom" name="name" value="'.$UserConnecte->getName().'" class="form-control" type="text">
                            <input placeholder="Username" name="username" value="'.$UserConnecte->getUsername().'" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Apropos" name="about" value="'.$UserConnecte->getAbout().'" class="form-control" type="text">
                       </div>
                       
                       <div class="row form-ro">
                            <input placeholder="New password" name="password" class="form-control" type="password">
                       </div>
                       <div class="row form-ro">
                       <input name="modification" value="modif" type="hidden">
                            <input class="btn btn-success" type="submit" value="modifier">
                       </div>';
                       ?>
                        </form>
</div>
    </main>
    

    <footer class="tm-footer text-center">
      <p>Copyright &copy; 2020 mohammed myforum</p>
    </footer>
  </div>
<script src="js/jquery.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script>
    $(document).ready(function(){
      // Handle click on paging links
      $('.tm-paging-link').click(function(e){
        e.preventDefault();
        
        var page = $(this).text().toLowerCase();
        $('.tm-gallery-page').addClass('hidden');
        $('#tm-gallery-page-' + page).removeClass('hidden');
        $('.tm-paging-link').removeClass('active');
        $(this).addClass("active");
      });
    });
  </script>
<?php include('login.php'); ?>
  <?php include('profil2.php'); ?>
</body>
</html>
