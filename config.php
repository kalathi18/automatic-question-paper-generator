<?php
$db_server="localhost";
$db_username="root";
$db_password="";
$dbname="projectdb";
$conn= mysqli_connect($db_server,$db_username,$db_password,$dbname);
if($conn==false)
{
    die("ERROR:Unable to Connect.  ".mysqli_connect_error());
}
?>
