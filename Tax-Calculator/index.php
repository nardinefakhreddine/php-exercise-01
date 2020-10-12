
<?php
include 'function.php';
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
         $tax_free=$_POST['tax-free'];
         $tax_free=0;
        
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
<input type="text" id="salary" name="salary" value="<?php echo $salary;?>"><br>
<span class="error"><?php echo $salary_error; ?></span>
</div>

<div>
<input type="radio" id="monthly" name="payment" value="monthly" <?php  if($payment=="monthly"){echo 'checked';}?>>
<label for="monthly"> Monthly</label>

<input type="radio" id="yearly" name="payment" value="yearly" <?php  if($payment=="yearly"){echo 'checked';}?>>
<label for="yearly">Yearly</label><br>
<span class="error"><?php echo $payment_error;?></span>

</div>

<div>
<span><label for="tax-free"> Tax Free Allowance in USD :</label></span>
<span><input type="text" id="tax-free" name="tax-free" value="<?php echo $tax_free;?>"></span><br>
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
        $monthly=salary_monthly($salary);
        echo $monthly;
    } ?> $</td>
    <td><?php if ($payment=="yearly"){
        echo $salary;
    }else {
        $yearly= salary_yearly($salary);
        echo $yearly;
    } ?> $</td>

</tr>
<tr>
<td>Tax amount</td>
    <td><?php 
    //monthly
    if($payment=="monthly"){
        $yearly= salary_yearly($salary);
       if($yearly<10000){
           echo 0;
       }else if($yearly>=10000 && $yearly<=25000){
           echo ceil($yearly*0.11/12);
       }else if($yearly>25000 && $yearly<50000){
           echo ceil($yearly*0.3/12);
       }else if($yearly>=50000){
           echo ceil($yearly*0.45/12);
       }

        }
    
    else{
      if($salary<10000){
          echo 0;
      }else if($salary>=10000 && $salary<=25000){
          echo ceil($salary*0.11/12);
      }else if($salary>25000 && $salary<50000){
          echo ceil($salary*0.3/12);
      }else if($salary>=50000){
          echo ceil($salary*0.45/12);
      }
    }
  
    
    ?>




   $ </td>
   
    <td><!--yearly-->
    <?php
    if($payment=="yearly"){
        if($salary<10000){
            echo 0;
        }else if($salary>=10000 && $salary<=25000){
            echo $salary*0.11;
        }else if($salary>25000 && $salary<50000){
            echo $salary*0.3;
        }else if($salary>=50000){
            echo $salary*0.45;
        }
    }else{
        $yearly= salary_yearly($salary);
        if($yearly<10000){
            echo 0;
        }else if($yearly>=10000 && $yearly<=25000){
            echo $yearly*0.11;
        }else if($yearly>25000 && $yearly<50000){
            echo $yearly*0.3;
        }else if($yearly>=50000){
            echo $yearly*0.45;
        }


    }

    ?>
   $</td>
</tr>
<tr>
<td>Social security fee</td>
    <td><?php if($payment=="monthly"){
              $yearly=salary_yearly($salary);
             if($yearly>10000){
                 echo ($salary*0.04);
             }else{
                 echo 0;
             }

    }
    else{
        if($salary>10000){
            $monthly=salary_monthly($salary);
            echo $monthly*0.04;
        }else{
            echo 0;
        }
    } ?>$</td>
    <td>
  <?php  
  if($payment=="yearly"){
    if($salary>10000){
        $monthly=salary_monthly($salary);
        echo ($monthly*0.04 )*12;
    }else{
        echo 0;
    }


  }else{
    $yearly=salary_yearly($salary);
    if($yearly>10000){
        echo ($salary*0.04 )*12;
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
   //monthly
   if($payment=="monthly"){
    $yearly= salary_yearly($salary);
   if($yearly<10000){
       echo 0;
   }else if($yearly>=10000 && $yearly<=25000){
       echo ($salary+$tax_free)-ceil($yearly*0.11/12);
   }else if($yearly>25000 && $yearly<50000){
       echo ($salary+$tax_free)-ceil($yearly*0.3/12);
   }else if($yearly>=50000){
       echo ($salary+$tax_free)-ceil($yearly*0.45/12);
   }

    }

else{
    $tax=floor($tax_free/12);
    $monthly=salary_monthly($salary);
  if($salary<10000){
      
      echo 0;
  }else if($salary>=10000 && $salary<=25000){
      echo ($monthly+$tax)-ceil($salary*0.11/12);
  }else if($salary>25000 && $salary<50000){
      echo ($monthly+$tax)-ceil($salary*0.3/12);
  }else if($salary>=50000){
      echo ($monthly+$tax)-ceil($salary*0.45/12);
  }
}

   
    ?>


$</td>
<td>
<?php 
  if($payment=="yearly"){
    if($salary<10000){
        echo 0;
    }else if($salary>=10000 && $salary<=25000){
        echo ($salary+$tax_free)-$salary*0.11;
    }else if($salary>25000 && $salary<50000){
        echo ($salary+$tax_free)-$salary*0.3;
    }else if($salary>=50000){
        echo ($salary+$tax_free)-$salary*0.45;
    }
}else{
    $yearly= salary_yearly($salary);
    if($yearly<10000){
        echo 0;
    }else if($yearly>=10000 && $yearly<=25000){
        echo ($yearly+$tax_free)-$yearly*0.11;
    }else if($yearly>25000 && $yearly<50000){
        echo ($yearly+$tax_free)-$yearly*0.3;
    }else if($yearly>=50000){
        echo ($yearly+$tax_free)-$yearly*0.45;
    }


}
?>
$</td>
</tr>
</table>
</div>
 <?php } 
 }?>
</div>
</body>
</html>