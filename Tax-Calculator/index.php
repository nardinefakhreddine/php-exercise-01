
<?php
    $salary=$payment=$tax_free= "";
     
    $salary_error=$payment_error=$tax_error= "";
$formError=array();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if(empty($_POST['salary'])){
     $salary_error="*required";
     $formError=$salary_error;
     }
     else if (!is_numeric($_POST['salary'])){
        $salary_error="you must to enter a number";
        $formError=$salary_error;
     } 
     else{
         $salary=test_input($_POST['salary']);
     }

     if(empty($_POST['payment'])){
         $payment_error="*required";
         $formError=$payment_error;
    }else {
        $payment=$_POST['payment'];
    }
    if(empty($_POST['tax-free'])){
         $tax_error="*required";
         $formError=$tax_error;
    }
    else if (!is_numeric($_POST['tax-free'])){
        $tax_error="you must to enter a number";
        $formError=$tax_error;
     } else{
        $tax_free=test_input($_POST['tax-free']);
     }


    }
    function test_input($data){
        return htmlspecialchars(stripslashes(trim($data)));
        
            }
        
        
        ?>
<!DOCTYPE html>
<html>
<head> 
<title>Tax Calculator</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header> <h3>Data Tax Calculator</h3></header>
<div id="container">

<div class="data">
<form method="post" action="#" class="form-data">

<div>
<span id="salar"><label for="salary"> Salary In USD :</label></span>
<input type="text" id="salary" name="salary"><br>
<span class="error"><?php echo $salary_error; ?></span>
</div>

<div>
<input type="radio" id="monthly" name="payment" value="monthly">
<label for="monthly"> Monthly</label>

<input type="radio" id="yearly" name="payment" value="yearly">
<label for="yearly">Yearly</label><br>
<span class="error"><?php echo $payment_error;?></span>

</div>

<div>
<span><label for="tax-free"> Tax Free Allowance in USD :</label></span>
<span><input type="text" id="tax-free" name="tax-free"></span><br>
<span class="error"><?php echo $tax_error;?></span>
</div>

<div>
<button type="submit"> Calculate</button>
</div>

</form>
</div>

<?php  if($_SERVER["REQUEST_METHOD"] == "POST"){
if (empty($formError)){

 ?>
<div class="result">
<table><tr>
    <th>        </th>
    <th> Monthly</th>
    <th> Yearly</th>
</tr>
<tr>
    <td>Total salary</td>
    <td><?php if ($payment=="monthly"){
        echo $salary;
    }else {
        echo $salary/12;
    } ?> $</td>
    <td><?php if ($payment=="yearly"){
        echo $salary;
    }else {
        echo $salary/12;
    } ?> $</td>

</tr>
<tr>
<td>Tax amount</td>
    <td><?php 
    if($payment=="monthly"){
        $salary=$salary*12;
        if($salary<10000){
            echo 0;
        }
        else if(10000 < $salary && $salary < 25000){
            echo ($salary*0.11)/12;
        }else if(25000 < $salary && $salary< 50000){
            echo ($salary*0.3)/12;
        }else if($salary >= 50000){
            echo ($salary*0.45)/12;
        }
    }else{
        if($salary<10000){
            echo 0;
        }
        else if(10000 < $salary && $salary < 25000){
            echo ($salary*0.11)/12;;
        }else if(25000 < $salary && $salary< 50000){
            echo ($salary*0.3)/12;
        }else if($salary >= 50000){
            echo  ($salary*0.45)/12;
        } 
    }
    
    
    ?>




   $ </td>
    <td><?php if($payment=="yearly") {
        if($salary<10000){
            echo 0;
        }
        else if(10000 < $salary && $salary < 25000){
            echo $salary*0.11;
        }else if(25000 < $salary && $salary< 50000){
            echo $salary*0.3;
        }else if($salary >= 50000){
            echo $salary*0.45;
        }
        
    }else{
        $salary=$salary*12;
        if($salary<10000){
            echo 0;
        }
        else if(10000 < $salary && $salary < 25000){
            echo $salary*0.11;
        }else if(25000 < $salary && $salary< 50000){
            echo $salary*0.3;
        }else if($salary >= 50000){
            echo $salary*0.45;
        }
    }
    ?>$</td>
</tr>
<tr>
<td>Social security fee</td>
    <td><?php if($payment=="monthly"){
             $salary=$salary*12;
             if($salary>10000){
                 echo ($salary/12)*0.4;
             }else{
                 echo 0;
             }

    }
    else{
        if($salary>10000){
            echo ($salary/12)*0.4;
        }else{
            echo 0;
        }
    } ?>$</td>
    <td>
  <?php  
  if($payment=="yearly"){
    if($salary>10000){
        echo (($salary/12)*0.4 )*12;
    }else{
        echo 0;
    }


  }else{
      $salary=$salary*12;
    if($salary>10000){
        echo (($salary/12)*0.4 )*12;
    }else{
        echo 0;
    }
  }
  ?>
   $</td>
</tr>

<tr>
    <td> Salary after tax</td>
    <td><?php
    if($payment=="monthly"){
       $salary=$salary*12;
       if($salary<10000){
        echo ($salary/12)+$tax_free;
    }
    else if(10000 < $salary && $salary < 25000){
        echo ($salary/12-(($salary*0.11)/12))+$tax_free;
    }else if(25000 < $salary && $salary< 50000){
        echo ($salary/12-(($salary*0.3)/12))+$tax_free;
    }else if($salary >= 50000){
        echo ($salary/12-(($salary*0.45)/12))+$tax_free;
    }

    }else{
        if($salary<10000){
            echo ($salary/12)+$tax_free;
        }
        else if(10000 < $salary && $salary < 25000){
            echo ($salary/12-(($salary*0.11)/12))+$tax_free;
        }else if(25000 < $salary && $salary< 50000){
            echo ($salary/12-(($salary*0.3)/12))+$tax_free;
        }else if($salary >= 50000){
            echo ($salary/12-(($salary*0.45)/12))+$tax_free;
        }
    }
    ?>


$</td>
<td>
 <?php   if($payment=="yearly"){

       if($salary<10000){
        echo $salary+$tax_free;
    }

    else if(10000 < $salary && $salary < 25000){
        echo ($salary-($salary*0.11))+$tax_free;
    }
    else if(25000 < $salary && $salary< 50000){
        echo ($salary-($salary*0.3))+$tax_free;
    }
    else if($salary >= 50000){
        echo ($salary-($salary*0.45))+$tax_free;
    }

     }
     else
     {$salary=$salary*12;
        if($salary<10000){
            echo $salary+$tax_free;
        }
        else if(10000 < $salary && $salary < 25000){
            echo ($salary-($salary*0.11))+$tax_free;
        }else if(25000 < $salary && $salary< 50000){
            echo( $salary-($salary*0.3))+$tax_free;
        }else if($salary >= 50000){
            echo ($salary-($salary*0.45))+$tax_free;
        }   } 
     ?>$
</td>
</tr>
</table>
</div>
 <?php } 
 }?>
</div>
</body>
</html>