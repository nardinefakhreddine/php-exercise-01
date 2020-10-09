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
?>
