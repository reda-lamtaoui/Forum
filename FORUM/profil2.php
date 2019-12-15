<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <link rel="shortcut icon" href="login_assets/images/fav.jpg">
<link rel="stylesheet" href="login_assets/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="login_assets/css/fontawsom-all.min.css" type="text/css" media="all">
<link rel="stylesheet" href="login_assets/css/style1.css" type="text/css" media="all">
<script type="text/javascript" src="login_assets/js/jquery-3.2.1.min.js" ></script>
<script type="text/javascript" src="login_assets/js/popper.min.js" ></script>
<script type="text/javascript" src="login_assets/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="login_assets/js/script.js" ></script>
</head>    
 <div id="profil" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog tem-doc" role="document">
                <div class="modal-content temp-model">
                  <div class="modal-header">
                    <?php echo '<img src="'.$UserConnecte->getAvatar().'">'; ?>
                    <h5 class="modal-title"><?php echo "".$UserConnecte->getName(); ?></h5> <br>
                    <p><li class="tm-paging-item"><a href="Home.php" class="tm-paging-link active">Mon espace</a></li></p><br>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="Post" method="Post" name="eval" enctype="multipart/form-data" >
                    
                  <div class="modal-body">
                    
                       <div class="row form-ro">
                        <p>A propos: <?php echo "".$UserConnecte->getAbout(); ?></p>
                           <p>derniere connexion: <?php echo "".$UserConnecte->getLastActivity(); ?></p>
                           <input name="deco" class="form-control" type="hidden">
                       </div>
                         <div id="message">
                        </div>
                        <div class="row form-ro">
                            <!-- <a onclick="Param()" class="btn btn-danger">Paramétre</a> -->
                            <a onclick="param()" class="btn btn-danger">Paramétre</a>
                       </div>
                       <div class="row form-ro">
                            <input type="submit" value="deconnexion" class="btn btn-success">
                       </div>
                       </form>
                      
                  </div>
                </div>
              </div>
            </div>
            
            <div id="param" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog tem-doc" role="document">
                <div class="modal-content temp-model">
                  <div class="modal-header">
                    <h5 class="modal-title">Modification</h5> <br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form enctype="multipart/form-data" method="post" action="">
                    
                  <div class="modal-body">
                    <?php
                       echo '<div class="row form-r">
                            <input placeholder="Nom" name="name" value="reda" class="form-control" type="text">
                            <input placeholder="Username" name="username" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Apropos" name="about" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Enter Email" name="email" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Enter Password" name="password" class="form-control" type="password">
                       </div>
                       <div class="row form-ro">
                            <input class="btn btn-success" type="submit" value="Sign Up">
                       </div>';
                       ?>
                  </div>
                </form>
                </div>
              </div>
            </div>
            
        </div>
    </body>
<script>
    function param(){
         $("#profil").modal('hide');
        $("#param").modal('show');       
    }
    function profilogin(){
        $("#profil").modal('show');
        $("#param").modal('hide'); 
    }
</script>

</html>