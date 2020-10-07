<?php
    $fullname=$username=$password=$c_password=$date=$email=$ssn="";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname=$_POST['full'];
   
    $username=$_POST['username-l'];
   
    $user=$_POST['user'];
   
    $password=$_POST['password-l'];
  
    $pass=$_POST['pass'];
  
  
    $email=$_POST['email'];
  
    $tel=$_POST['tel'];
   
    $date=$_POST['date'];
  
    $ssn=$_POST['ssn'];
    if(empty($_POST['username-l']) || empty($_POST['password-l'])){
       header('location:home.php') ;
    }

    //else{
    //    header('location:home.php');
   // }
  
   // }
   if(($password==$pass) && ($user==$username)){
    ?>
    <html>
        <head>
        <style>
 body{
    padding: 0;
   margin: 0;
   width: 100%;
   background-image: url("108105038-old-grey-eco-drawing-paper-kraft-background-texture-in-soft-white-light-color-concept-for-page-wallp.jpg");
}

span{
    color:lightseagreen;
    margin-left:5px;
}
 #container{
  font-style:italic;
margin: 0 auto;
padding: 20px;
text-align: center;
border: 1px solid grey;
background-color: transparent;
color:grey;
width:500px;
height:300px;
}
            </style>
        <body >
            <div style="font-style:italic;"> <h1 style="color:grey;text-align:center;"> Welcome <span style="color:lightseagreen;">  <?php echo $user ?></span></h1></div>
            <div id="container">
              <div> Full Name:<span><?php echo $fullname ?></span><div>
               <br>
              <div> UserName:<span><?php echo $username ?></span></div>
               <br>
               <div>Date Of Birth:<span><?php echo $date ?></span></div>
               <br>
               <div>Email:<span><?php echo $email ?></span></div>
               <br>
               <div>Telephone:<span><?php echo $tel ?></span></div>
               <br>
               <div>SSN:<span><?php echo $ssn ?></span></div>
               <br>
    </div>
    </body>
    </html>
<?php }else{
     echo"
     <script>
     alert('Wrong UserName Or Password');
     </script>
     
     
     ";
     header('location:home.php');

}
    }
?>