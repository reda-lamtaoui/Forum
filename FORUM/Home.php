<!DOCTYPE html>
<html>
<?php
include 'BD.php';
include 'user.php';
?>
<head>
	<title>test</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="Home.php">
	<label>name</label>
	<input type="text" name="name"><br><br>
	<label>email</label>
	<input type="text" name="email"><br><br>
	<label>avatar</label>
	<input type="text" name="avatar"><br><br>
	<label>username</label>
	<input type="text" name="username"><br><br>
	<label>password</label>
	<input type="password" name="password"><br><br>
	<label>abouts</label>
	<input type="text" name="about"><br><br>
	<input type="submit" name="register">
	
</form>
<?php
if(isset($_POST['name'])){
        //get username and password
        $data =array("name" =>$_POST['name'], 
        			"email" =>$_POST['email'] , 
        			"avatar" =>$_POST['avatar'] , 
        			"username" =>$_POST['username'] , 
        			"password" =>$_POST['password'] , 
        			"about" =>$_POST['about'] , 
    	);
        //Create user object
        $user = new User;
        $user->createUser($data);
     }
?>
</body>
</html>