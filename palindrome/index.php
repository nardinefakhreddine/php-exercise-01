<?php
function check_palindrome($string) 
{
  if ($string == strrev($string))
      return "Palindrom String";
  else
	  return "No Palindrom String";
}
echo check_palindrome('madam')."<br>";
?>