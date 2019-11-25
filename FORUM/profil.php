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
                    <h5 class="modal-title"><?php echo "".$_SESSION["name"]; ?></h5> <br>
                    <p><?php echo "".$_SESSION["username"]; ?></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="Post" method="Post" name="eval" enctype="multipart/form-data" >
                    
                  <div class="modal-body">
                    
                       <div class="row form-ro">
                           <p>derniere connexion:</p>
                           <input name="deco" class="form-control" type="hidden">
                       </div>
                         <div id="message">
                        </div>
                        <div class="row form-ro">
                            <a onclick="" class="btn btn-danger">Paramétre</a>
                       </div>
                       <div class="row form-ro">
                            <input type="submit" value="deconnexion" class="btn btn-success">
                       </div>
                       </form>
                  </div>
              </div>
            </div>
        </div>
    </body>



<script>

  
    function profilogin(){
        $("#profil").modal('show');   
    }
</script>

</html>