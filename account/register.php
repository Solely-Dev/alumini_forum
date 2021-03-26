<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
   
    body{
      background-color:violet;
      font-family:serif;
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
  height:600px;
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
form span.unique {
  display: block;
  background: #F9A5A5;
  padding: 2px 5px;
  color: #666;
}
.sign-up{
  background-color: red;
  border-radius: 10px;
  outline:none;
  border:none;
  color:white;
  width:200px;
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
// echo "Connected Successfully <br>";
}
?>

<?php
session_start();
/* dummytext */
$emailErr=$email=$password=$phn=$fname=$lname=$add=$city="";
if($_SERVER['REQUEST_METHOD']==='POST'){

   if(empty($_POST['Email'])){
     $emailErr="* Valid Email is Required";
   }
   else{
	$email=result($_POST['Email']);
   echo $email;

    //check email is valid or not
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email="";
    }
   }
// get password from input feild
   $password=$_POST['password'];
   $phn=$_POST['phnnum'];
   $fname=$_POST['ftext'];
   $lname=$_POST['ltext'];
   $add=$_POST['Add'];
   $city=$_POST['city'];
 
//if email is empty show hint and don't add data to DB
   if($email==""){
    	$emailErr="* Valid Email is Required";
	   }
   // if email is valid insert into DB
   else{
    //check if user is already exist or not
 $query = "SELECT * FROM signup WHERE emailid = '$email'";
 $result = $connection->query($query); 
 if ($result) {
   if (mysqli_num_rows($result) > 0) {
     echo $email;
   $emailErr ='Already Available';
     }
     else{
			// insert data to table
    
	       $sql= "INSERT INTO signup VALUES('$email','$password','$phn','$fname','$lname',' $city',' $add')";
         if($connection->query($sql) ===TRUE){
          $_SESSION['email']=$email;
          header('location:/forum/alumini_forum/index.html');
          $connection->close();
          exit;
               }
          else{
                echo "Error: ".$sql."<br>".$connection->error;
                 }
             
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
  
  <form id="table" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    
    <div class="Register">
    <h1>Register Here</h1>
  </div>
  <button class="close-bar">X</button>
  <div class="inner-text">
    <input type="text"  name="ftext" placeholder="Firstname" size="45" required><br><br>
    
    <input type="text"  name="ltext" placeholder="Lastname" size="45" required><br><br>

    <input type="email"  name="Email" placeholder="email" size="45" required><br><?php echo $emailErr; ?></em> </br>

    <input type="password" name="password" placeholder="Password" minlength="8" size="45" required></br> </br>
     
    <input type="password" name="" placeholder="confirm password" minlength="8" size="45" required></br></br>

    <input type="tel"  name="phnnum" placeholder="Phone" size="45"></br></br>
    
    <input type="text"  name="Add" placeholder="Address" size="45"></br> </br>

    <input type="text"  name="city" placeholder="City" size="45"></br> </br>

    <input class="sign-up" type='submit' value='Sign-Up'>
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

