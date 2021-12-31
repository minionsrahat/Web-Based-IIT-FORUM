<?php
$username="root";
$password="";
$con=mysqli_connect('localhost',$username,$password,'iit_forum');
if(!$con)
{
    echo" Connection failed";
}
?>