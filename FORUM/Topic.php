<?php
session_start();
include 'Class/model/BD.php';
include 'Class/model/user.php';
include 'Class/model/categorie.php';
include 'Class/model/topic.php';
include 'Class/model/replie.php';
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
    .error{
      background-color: red;
      height: 1.4em;
      color:black;
    }
    .valide{
      background-color: green;
      height: 1.4em;
      color:black;
    }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1100px;
  margin: auto;
  margin-bottom: 20px;
  text-align: center;
  font-family: arial;
}
.card h1{
  line-height: 70px;
  height: 2em;
  background-color: #2F956D;
}
.card img{
  position: absolute;
  top:0;
  width:2em; 
  left: 0;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border:1px solid black;
}

.title {
  text-align: left;
  color: grey;
  font-size: 18px;
   border-bottom:1px solid black;

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
  if (! isset($_GET["param"])) {
    header("location:index.php");
    exit();
  }
  if (isset($_POST["replie"]) and ! empty($_POST["replie"])) {
    $replie=new replie();
    $replie->createReplie($_GET["param"],$_SESSION["id"],$_POST["replie"]);
  }
    if(isset($_POST['connexion'])){
        $UserConnecte = new User();
        if ($UserConnecte->login($_POST['email'],$_POST['password'])==true) {
         $_SESSION["id"]=$UserConnecte->getId();
        $_SESSION["connexion"]="";
         echo '<div class="valide">vous êtes connecté<div>';
        }else{
          echo '<div class="error">Mot de passe ou email incorrect<div>';
        }
        
    }
if(isset($_POST['deco'])){
  session_destroy();
  session_start();
     }
if(isset($_POST['inscription'])){
	if ($_POST['civilite']=="Mr") {
		$avatar="image/icone/homme.jpg";
	}else{
		$avatar="image/icone/femme.jpg";
	}
        //get username and password
        $data =array("name" =>$_POST['name'], 
              "email" =>$_POST['email'] , 
              "avatar" =>$avatar , 
              "username" =>$_POST['username'] , 
              "password" =>$_POST['password'] , 
              "about" =>$_POST['about'] ,
              "joinDate"=>date("d-m-Y"),
              "lastActivity"=>date("F j, Y, g:i a") 
      );
        //Create user object
        $user = new User();
        $user->createUser($data);
     }
?>
<!-- 	<div class="body1">
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
      <div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
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
      <p><img src="img/home.svg">-><a href="index.php">Home</a>-><a href="#">Topic</a></p>
      </div>
      <header class="row tm-welcome-section">
        <h2 class="col-12 text-center tm-section-title">Welcome to your ader Forum</h2>
        <p class="col-12 text-center">you can find all the topics you want here
          you can make friends also</p>
      </header>
        <?php
        $user=new user();
        $Topic=new Topic();
        $Topics=$Topic->loadAllTopics();
        $replie=new replie();
        $replies=$replie->loadAllReplies($_GET["param"]);
            foreach ($Topics as $value) {
              if ($value[0]==$_GET["param"]) {
                 echo '<div class="card">
  
  <h1>'.$user->getUsername($value[2]).':'.$value[3].'</h1>
  <p class="title">'.$value[4].'</p>
  <p>'.$value[5].'</p>
  
</div>';

              }
            }
            foreach ($replies as $value) {
                 echo '<div class="card">
  
  <h1><img src="'.$user->getAvatar($value[2]).'">'.$user->getUsername($value[2]).'</h1>
  <p class="title">'.$value[3].'</p>
  <p>'.$value[4].'</p>
</div>';
            }
        ?>
        <?php
        if(isset($_SESSION["id"])){
echo '  
      <form action="" method="Post" name="evale" 
              onsubmit="return tester(evale);" enctype="multipart/form-data" >
      <div class="card">
        <div id="message">
                        </div>
  <input type="text" 
   placeholder="Entrez votre commentaire" name="replie" class="title">
<input type="hidden" name="commentaire">
  <p><button type="submit">Envoyez</button></p>
</div>
</form>';
        }else{
echo '<div class="card">
        
  <p><button nclick="$(document).ready(function(){
                        userlogin();
                      })" >tu doit se connecter pour laisser un message</button></p>
</div>';
}
?>
      
    </main>
    

    <footer class="tm-footer text-center">
      <p>Copyright &copy; 2020 mohammed myforum</p>
    </footer>
  </div>
<script src="js/jquery.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script>
    function tester(eval){
      alert("dazdaz");
  var champs="";
  var vide=false;
if(edocument.getElementById("replie").value==""){
  
  champs=champs+" username";
  vide=true;
}
if(vide==true){
  document.getElementById("message").innerHTML ="remplir les champs :"+ champs;
  return false;
}
}
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
