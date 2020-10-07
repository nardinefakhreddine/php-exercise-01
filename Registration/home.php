<!DOCTYPE HTML>
<html>
<head>
<title>HOME</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $fullname=$username=$password=$c_password=$tel=$date=$email=$ssn=" ";
     
$name_error=$user_error=$password_error=$pass_match=$tel_error=$email_error=$date_error=$ssn_error=" ";
$formError=array();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST['fullname'])){
            $name_error=" * Name is required";
            $formError[]=$name_error;
        }else{
            $fullname=test_input($_POST['fullname']);
            
        }
        if(!preg_match('/^[a-zA-Z ]*\.[a-zA-Z ]*$/', $fullname)){
           $name_error="* only letters and White space allowed !";
           $formError[]=$name_error;
        }


        if(empty($_POST['username'])){
            $user_error=" * username is required";
            $formError[]=$user_error;
        }else{
            $username=$_POST['username'];
        }if(!preg_match('/^[a-zA-Z ]*\.[a-zA-Z ]*$/', $username)){
            $user_error="* only letters and White space allowed !";
            $formError[]=$user_error;
         }

        if(empty($_POST['password'])){
            $password_error=" * password is required";
            $formError[]=$password_error;
        }else{
            $password=$_POST['password'];
        }
            if(!($_POST['password']==$_POST['c-password'])){
                $pass_match="* Password not match";
                $formError[]=$pass_error;
            }
        
      
        if(empty($_POST['tel'])){
            $tel_error=" * telephone number is required";
            $formError[]=$tel_error;
        }else{
            $tel=test_input($_POST['tel']);
        } if(!preg_match('/^[0-9]*$/',$tel)){
            $tel_error="*  tel must be number ";
            $formError[]=$tel_error;
        }
        
     
        if(empty($_POST['email'])){
            $email_error=" * Email is required";
            $formError[]=$email_error;
        }else{
            $email=test_input($_POST['email']);
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email_error="* the email must be contain @gmail.com";
            $formError[]=$email_error;
        }

        if(empty($_POST['date'])){
            $date_error=" * Date of Birth is required";
            $formError[]=$date_error;
        }else{
            $date=$_POST['date'];
        }
        //if(!preg_match('/^(0?\d|[12]\d|3[01])-(0?\d|1[012])-((?:19|20)\d{2})$/', $date)){
          //  $date_error="* invalid date form !";
          //  $formError[]=$date_error;
        // }

        if(empty($_POST['ssn'])){
            $ssn_error=" * SSN is required";
            $formError[]=$ssn_error;
        }else{
            $ssn=$_POST['ssn'];
        }
        if(!preg_match('/^[0-9]*$/',$ssn)){
            $ssn_error="*  SSN must be number";
            $formError[]=$ssn_error;
        }
        if(empty($formError)){
            echo"
            <script>
            alert('Congrat ! Success Regitration ! Go to Login');
            </script>
            
            
            ";

        }

    }//fin post condition
    function test_input($data){
        $data=trim($data);//remove white space left and right of string
        $data=stripcslashes($data);//remove slash
        $data=htmlspecialchars($data);//ignore haching html tags code
        return $data;
        
            }
    
  ?>
<header>
    <marquee><p>&hearts;Welcome To Codi &hearts;</p></marquee>
</header>
<div id="content">
<div class="register">
<form method="post" name="register" action=<?php echo $_SERVER["PHP_SELF"];?> class="form-register">
    <div class="title"><h1> Registration &hearts;</h1></div>
<div>
<label for="fullname">Full Name: </label>
<input type="text" name="fullname" id="fullname" placeholder="enter your full name" autofocus />
<span class="error"><?php echo $name_error; ?></span>
</div>
<div>
<label for="username">User Name: </label>
<input type="text" name="username" id="username" placeholder="enter your user name" />
<span class="error"><?php echo $user_error; ?></span>
</div>
<div>
<label for="password">Password: </label>
<input type="password" name="password" id="password" placeholder="enter a complexe password" autocomplete="off" />
<span class="error"><?php echo $password_error; ?></span>
</div>
<div>
<label for="fullname">Confirm Password: </label>
<input type="password" name="c-password" id="c-password" placeholder="reenter your complexe password" autocomplete="off" /></div>
<span class="error"><?php echo $pass_match; ?></span>
<div>
<label for="email">Email: </label>
<input type="text" name="email" id="email" placeholder="enter your valid email"  />
<span class="error"><?php echo $email_error; ?></span>
</div>
<div>
<label for="tel">Telephone: </label>
<input type="tel" name="tel" id="tel" placeholder="enter your phone number" />
<span class="error"><?php echo $tel_error; ?></span>
</div>
<div>
<label for="date">Date Of Birth: </label>
<input type="date" name="date" id="date" placeholder="Date of Birth" />
<span class="error"><?php echo $date_error; ?></span>
</div>
<div>
<label for="SSN">Social Security Number: </label>
<input type="text" name="ssn" id="ssn" placeholder="Enter your  Valid SSN" />
<span class="error"><?php echo $ssn_error; ?></span>
</div><div>
    <button type="submit" class="submit"> Register</button>
</div>
</form>
</div>

<div class="login">
<form method="post" action="safe.php" name="login" class="form-login">
<div class="title"><h1> Login &hearts;</h1></div>
<div>
<label for="username">User Name: </label>
<input type="text" name="username-l" id="username" placeholder="enter your user name" /></div>


<div>
<label for="password">Password: </label>
<input type="password" name="password-l" id="password" placeholder="enter a complexe password" autocomplete="off"/></div>

<div>
<input type="hidden" name="user" value=<?php echo $username?>>
<input type="hidden" name="pass" value=<?php echo $password?>>
    <input type="hidden" name="full" value=<?php echo $fullname?>>
    <input type="hidden" name="date" value=<?php echo $date?>>
    <input type="hidden" name="email" value=<?php echo $email?>>
    <input type="hidden" name="tel" value=<?php echo $tel?>>
    <input type="hidden" name="ssn" value=<?php echo $ssn?>>
    <button type="submit" class="submit">Login</button>
   
</div>
</form>
</div>
</div>
</div>
<footer class="footer">
    <p> copy right with codi &#169; team</p>
</footer>
</body>
</html>