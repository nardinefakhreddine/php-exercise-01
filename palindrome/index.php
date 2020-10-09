<?php
function check_palindrome1($string) 
{
  if ($string == strrev($string))
     return "Palindrom String";
  else
	  return "No Palindrom String";
}
echo check_palindrome1('nadam')."<br>";
// autre methode
function rev($string) {
$length = strlen($string);  
$res="";
for ($i=($length-1) ; $i >= 0 ; $i--)   
{  
  $res.=$string[$i];  
}  
return $res;
}
$string = "JAVATPOINT"; 
$rev=rev($string);
echo $rev;
echo "<br>";
function check_palindrome($string) 
{
  if ($string == rev($string))
     return "Palindrom String";
  else
	  return "No Palindrom String";
}
echo check_palindrome('madam')."<br>";

?>  