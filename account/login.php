<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
   
    body{
      background-color: blueviolet;
      font-family:serif;
    }
.error{
    color: #FF0000;
    font-size: 18px;
    font-style: inherit;
    background: none;
}
    .inner-box{
      color:black;
      display:table;
      background-color:rgba(255, 255, 255, 0.979);
      padding:55px 20px 20px 20px ;
      
      border-radius: 4px;
      text-align: center;
      margin-left:auto;
      margin-right:auto;
      margin-top: 100px;
      
  }
  
  input{
    border-radius:10px;
    padding:7px;
    border:none;
    background-color:white;
    display: inline-block;
    margin-left:auto;
    margin-right:auto;
    
    outline:none;
    
}
input:focus{
  border:2px solid black;
}


.inner-text{
  padding-top:40px;
  text-align:center;
}

.outer-box{
  background-color:#dcdcdc;
  width:450px;
  height:400px;
  margin-left:auto;
  margin-right:auto;
  border-radius: 10px;
  
}
.Register{
  padding-top:20px;
}
.close-bar{
  color:rgba(247, 5, 5, 0.986);
  position:relative;
  bottom:150px;
  left:230px;
  background-color:rgba(255, 255, 255, 0.979);
  border:none;
  font-weight:bold;
  outline:none;
}

.sign-up{
  background-color: red;
  border-radius: 10px;
  outline:none;
  border:none;
  color:white;
  width:100px;
  height:35px;
  font-weight: bold;
}


.close-bar:hover,.close-bar:focus{

cursor:pointer;
}
     
  </style>
</head>
<body>
  
  <?php 

  $userName='root';
  $pass='root'; 
  $server='localhost';
  $DBname='alumini_forum';
  $connection = new mysqli($server, $userName, $pass,$DBname,"3307");
  if($connection->connect_error){
    die("Unable to connect :(");
  }
  else{
  // echo "Connected Successfully ";
  }
  ?>



<?php
/* dummytext */
session_start();
$emailErr=$email=$password="";
if($_SERVER['REQUEST_METHOD']==='POST'){

   if(empty($_POST['Email'])){
     $emailErr="* Valid Email is Required";
   }
   else{
	$email=result($_POST['Email']);
    //check email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email="";
    }
   }
// get password from input feild
   $password=$_POST['password'];


//if email is empty show hint and don't add data to DB
   if($email==""){
    	$emailErr="* Valid Email is Required";
	   }
// if email is valid insert into DB
   else{
	   //check if user is already exist or not
	$query = "SELECT * FROM signup WHERE emailid = '$email' AND pswd='$password'" ;
  echo $email ;
  echo "sample";
	$result = $connection->query($query); 
	if ($result) {
	  if (mysqli_num_rows($result) > 0) {
            $_SESSION["email"] = $email;
            echo $email;
            echo $password;
            header('location:/forum/alumini_forum/question.html');
            exit;
          }
          else{
            $emailErr= "Invalid email or password";
            }
		}
      }
}
function result($data){
	$data=trim($data);
	$data=stripslashes($data);
	htmlspecialchars($data);
	return $data;
  }

?>

  <div class="inner-box">
   
    <div class="outer-box">
  
  <form id="table"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
    <div class="Register">
    <h1>LOGIN</h1>
  </div>
  <button class="close-bar">X</button>
  <div class="inner-text">
  <em class="error"> <?php echo $emailErr; ?></em><br>
    <input type="text"  name="Email" placeholder="Enter Email id" size="45" required><br><br>
    
    
    <input type="password" name="password" placeholder="Password" minlength="8" size="45"></br> </br>
     
    <input type="submit"  class="sign-up" value="Let Me In" id="submit">
   <p style="font-style: normal;font-size: 14px;font-weight:bold;"> Don't have an Account? <a href="/forum/alumini_forum/account/register.php" style="text-decoration:none;color:red">SignUp</a></p>
    
    

  </div> 
  <div class="forgot">
  <a href="forgotpassword.html" style="text-decoration: none;color: red;font-style: initial;font-weight: 600;">forgot password?</a>
</div> 
  
  </form>
</div>

</div>
<script>
document.querySelector(".close-bar").addEventListener("click",function(){
document.querySelector(".inner-box").style.display="none"



});
</script>

</body>
</html>

