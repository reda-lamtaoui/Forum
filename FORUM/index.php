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
  max-width: 300px;
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
	 if(isset($_POST['connexion'])){
        $UserConnecte = new User();
        $UserConnecte->login($_POST['username2'],$_POST['password']);
        $_SESSION["id"]=$UserConnecte->getId();
         $_SESSION["connexion"]="";
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
                <li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
                <?php 
            if(isset($_SESSION['connexion'])){
              ?>
              <li class="tm-nav-li"><a href="profil" class="tm-nav-link">Profil</a></li>
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
      <p><img src="img/home.svg">-><a href="index.php">Home</a></p>
      </div>
      <header class="row tm-welcome-section">
        <h2 class="col-12 text-center tm-section-title">Welcome to your ader Forum</h2>
        <p class="col-12 text-center">you can find all the topics you want here
          you can make friends also</p>
      </header>
      
      <div class="tm-paging-links">
        <nav>
          <ul>
             <?php
             $i=0;
        $categories=new categorie();
        $Results=$categories->loadAllCategories();
        foreach ($Results as $result) {
            if ($i==0) {
              echo '<li class="tm-paging-item"><a href="#" class="tm-paging-link active">'.$result[1].'</a></li>';
            }else{
              echo '<li class="tm-paging-item"><a href="#" class="tm-paging-link">'.$result[1].'</a></li>';
            }
            $i++;
        }
        ?>
          </ul>
        </nav>
      </div>

      <!-- Gallery -->
      <div class="row tm-gallery">
        <!-- gallery page 1 -->
        <?php
        $categories=new categorie();
        $Results=$categories->loadAllCategories();
        $Topic=new Topic();
        $Topics=$Topic->loadAllTopics();
        foreach ($Results as $result) {
            echo '<div id="tm-gallery-page-'.$result[1].'" class="tm-gallery-page">';
            foreach ($Topics as $value) {
              if ($value[1]==$result[0]) {
                 echo '<div class="card">
  
  <h1>'.$value[3].'</h1>
  <p class="title">'.$value[4].'</p>
  <p>'.$value[5].'</p>
  <p><button>Contact</button></p>
</div>';

              }
            }

          
        echo '</div>';
        }
        ?>

      </div>
      <div class="tm-section tm-container-inner">
        <div class="row">
          <div class="col-md-6">
            <figure class="tm-description-figure">
              <img src="img/img-01.jpg" alt="Image" class="img-fluid" />
            </figure>
          </div>
          <div class="col-md-6">
            <div class="tm-description-box"> 
              <h4 class="tm-gallery-title">Maecenas nulla neque</h4>
              <p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p>
              <a href="about.html" class="tm-btn tm-btn-default tm-right">Read More</a>
            </div>
          </div>
        </div>
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
