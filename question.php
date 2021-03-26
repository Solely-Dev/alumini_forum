<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumini forum</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css">
    <!-- google font api -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
 <!-- Bootsterap api -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- fontawesome api -->
    <script src="https://kit.fontawesome.com/4ce11a0f80.js" crossorigin="anonymous"></script>
<title>index</title>
</head>
<body>

    <?php
    session_start();
    if(isset($_SESSION["email"])){
        session_unset();
        session_destroy();
    }
    else{
        echo "You don't have permission";
        die();
    }
    ?>

    <div class="content">

        <div class="Question">
        <h2 class="head">Question Section</h2>
        <form action="submit.php" method="post"> 
        <div class="question">
            <!-- title-->
            <label for="title" style="font-weight: bold;">Title</label><br>
            <p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <input type="text" id="title" name="title" size="50"> <br><br>
            <!-- body-->
            <label for="body" style="font-weight: bold;">Body:</label><br>
            <p class="discription">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <textarea name="body" id="body" cols="80" rows="8" autofocus></textarea><br>
            
        </div><br><br>
        <button class="btn btn-primary" type="submit" >Publish your Question
        </button> </div>  
    </form> 


       <div class="instruct">
        <h2 class="head">Ask a Question</h2>
        <p>
        <ul>
        <li>What is the skill requrirred for surviving in the outside world?</li> 
        <li>Is there any recruitment in your compaany?</li>
        <li>Is there any availability of internship in this company?</li> 
        <li>Your one line advice for our juniors.</li>
        <li>Possible ways to get placed in our college.</li> 
        <li>Suggestions for our college atmosphere.</li>  
        </ul>  
         </p>   
        </div>
    </div>
   
      <!-- footer -->
      <footer class="footer">
        <div class="container">
               <a href="#" class="footer__logo">
                  <p>AluminiForum</p>
               </a>
               <div class="footer__social">
                   <a href="#"> <img src="images/icon-facebook.svg" alt=""></a>
                   <a href="#"> <img src="images/icon-instagram.svg" alt=""></a>
                   <a href="#"> <img src="images/icon-pinterest.svg" alt=""></a>
                   <a href="#"> <img src="images/icon-twitter.svg" alt=""></a>
                   <a href="#"> <img src="images/icon-youtube.svg" alt=""></a>
               </div>
    
               <div class="footer__links cols1">
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
               </div>
    
               <div class="footer__links cols2">
                <a href="#">Privacy policy</a>
                <a href="#">Terms and Conditions</a>
                <a href="#">Disclaimer</a>
               </div>
    
               <div class="footer__weblink">
                   <a href="#">Alumini Forum</a>
               </div>
    
               <div class="footer__copyright">
                ©Alumini Forum. All Rights Reserved.
               </div>
        </div>
        </footer>
    
    </body>
    <script src="javascript/hamburger.js"></script>
    <script src="javascript/slideshow.js"></script>
    
</body>
</html>
 
