<?php
include_once("database.php");

function emp_insert($con,$values = array()){
$params ="'".implode("','",$values)."'";

$query = "INSERT INTO emp VALUES(' ', ".$params.")";

if(mysqli_query($con,$query)){
    return true;
}else {
    return false;
}
}

function emp_get($con){
$query = "SELECT * from emp";
$result = mysqli_query($con,$query);
if($result != null){
return $result;
}else{
    return false;
}
}
