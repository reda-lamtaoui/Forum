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

    
            <div id="login" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog tem-doc" role="document">
                <div class="modal-content temp-model">
                  <div class="modal-header">
                    <h5 class="modal-title">User login</h5> <br>
                    <p>Acceder A votre espace </p>
                  </div>
                  <form action="" method="Post" method="Post" name="evale" 
              onsubmit="return tester(evale);" enctype="multipart/form-data" >
                    
                  <div class="modal-body">
                    
                       <div class="row form-ro">
                            <input placeholder="Email" name="email" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Password" name="password" class="form-control" type="password">
                            <input name="connexion" type="hidden">
                       </div>
                         <div id="message">
                        </div>
                       <div class="row form-ro">
                            <input type="submit" value="Log In" id="log" class="btn btn-success">
                       </div>
                       </form>
                      
                        <div class="row form-ro">
                            <a onclick="signup()" class="btn btn-danger">Dont have an account! Sign Up</a>
                       </div>
                  </div>
                  
                <!--   <div class="modal-footer">
                   <p>Sign Up with social media</p>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fab fa-facebook-f"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fab fa-google-plus-g"></i></button>
                    <button type="button" class="btn btn-info"><i class="fab fa-twitter"></i></button>
                  </div> -->
                </div>
              </div>
            </div>
            
            <div id="signup" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog tem-doc" role="document">
                <div class="modal-content temp-model">
                  <div class="modal-header">
                    <h5 class="modal-title">Authentification</h5> <br>
                  </div>
                  <form enctype="multipart/form-data" method="post" action="">
                    
                  <div class="modal-body">
                     <div class="row form-r">
                             <select placeholder="pays" name="civilite" class="form-control" name="thelist">
                              <option value="" disabled selected>civilite</option>
                              <option value="Mr">Mr</option>
                              <option value="Mme">Mme</option>
                            </select>
                       </div>
                       <div class="row form-r">
                            <input placeholder="Nom" name="name" class="form-control" type="text">
                            <input placeholder="Username" name="username" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="About" name="about" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Email" name="email" class="form-control" type="text">
                       </div>
                       <div class="row form-ro">
                            <input placeholder="Password" name="password" class="form-control" type="password">
                            <input name="inscription" type="hidden">
                       </div>
                       <div class="row form-ro">
                            <input class="btn btn-success" type="submit" value="Sign Up">
                       </div>
                       
                  </div>
                </form>
                <!--   <div class="modal-footer">
                   <p>Sign Up with social media</p>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fab fa-facebook-f"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fab fa-google-plus-g"></i></button>
                    <button type="button" class="btn btn-info"><i class="fab fa-twitter"></i></button>
                  </div> -->
                </div>
              </div>
            </div>
            
        </div>
    </body>


<script>
$(document).ready(function(){
  $("#log").click(function(){
    $.ajax({
            type: 'get',
            url: 'Verification.php',
            data : 'email=reda',
            success:function(data){
              $('tbody').html(data);
              
            }
        });
    // $.ajax({
    //    url : 'Verification.php',
    //    type : 'GET',
    //    data : 'email=reda',
    //    dataType : 'html',
    //    success : function(code_html, statut){ // success est toujours en place, bien sûr !
    //        console.log('success',data);
    //    },

    //    error : function(resultat, statut, erreur){

    //    }

    // });
   
});
});
    

    function userlogin(){
        $("#signup").modal('hide');
        $("#login").modal('show');   
    }
    function signup(){
        $("#login").modal('hide');   
        $("#signup").modal('show');       
    }
      function tester(eval){
  var champs="";
  var vide=false;
if(eval.username.value==""){
  champs=champs+" username";
  vide=true;
}
if(eval.password.value==""){
  champs=champs+" password";
  vide=true;
}
if(vide==true){
  document.getElementById("message").innerHTML ="remplir les champs :"+ champs;
  return false;
}
}
</script>
</html>
