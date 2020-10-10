<?php
$data= array( "musicals" => array(0=>"Oklahoma", 1=>"The Music Man", 2=>"South Pacific"),
"dramas" => array(0=>"Lawrence of Arabia", 1=>"To Kill a Mockingbird", 2=>"Casablanca"),
"mysteries" => array(0=>"The Maltese Falcon", 1=>"Rear Window", 2=>"North by Northwest"));


foreach($data as $x => $value){
    echo $x."<br>";
foreach($value as $i=>$values){
    
    echo "-------> ".$i." = ".$values;
    echo"<br>";
}
}


//Sorting the multidimensional associative array by the genres: <br />";
function compare($x, $y)
{ 
if ( $x[1] == $y[1] )
return 0;
else if ( $x[1] > $y[1] )
return -1;
else
return 1;
}
function compare2($x2, $y2) {
if ($x[2] == $y[2])
return 0;
elseif ($x[2] > $y[2])
return -1;
else
return 1;
}
usort($data, 'compare');
usort($data, 'compare2');
echo "Printing the multidimensional associative array sorted: <br>";
foreach($data as $x => $value){
    echo $x."<br>";
foreach($value as $i=>$values){
    
    echo "-------> ".$i." = ".$values;
    echo"<br>";
}
}

?>



