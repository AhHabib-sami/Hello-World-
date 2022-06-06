<?php
$name = $_REQUEST["fname"];
if(empty($name))
{
    echo "<br>Name should be filled ";
}
else{
    echo "Your name is ".$name;
    if(strlen($_REQUEST["fname"])<4)
    {
        echo"<br> Please input your first name more than 4 char";
    }
    if(strlen($_REQUEST["fname2"])<4)
    {
        echo"<br> Please input your second name more than 4 char";
    }
}
if(isset ($_REQUEST["ch1"] ) ||isset ($_REQUEST["ch2"] ) || isset ($_REQUEST["ch3"] ))
{
   echo "<br>selected" ;
}
else 
{
    echo "<br>Please enter";
}
if(isset($_REQUEST["designation"]))
{
    $_designation=$_REQUEST["designation"];
    echo"<br> You have selected designation";
}
else{
    echo "<br>Please choose radio button";
}

if(is_numeric($_REQUEST["pass"]))
{
    echo"<br>You're correct";
}
else 
{
    echo "<br>Please enter a password which contains numeric value ";
}
if(empty($_REQUEST["mail"]))
{
    echo"<br> enter mail";
}
else {
  
    echo "<br>Ok for mail";
}

$mydata =  array
(
    'firstname' => $name
    'password' => $_REQUEST["password"]
);
$jsondata=json_encode($mydata, JSON_PRETTY_PRINT);
if(file_put_contents("../data/data.json",$jsondata)){
    echo "data saved";
}

?>