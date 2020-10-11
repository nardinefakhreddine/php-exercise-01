<?php
function salary_monthly($salary_yearly){
  return floor($salary_yearly/12);

}
function salary_yearly($salary_monthly){
    return $salary_monthly*12;
  
  }

?>