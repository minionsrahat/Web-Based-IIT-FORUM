<?php
include('mql_connection.php');
session_start();
$sql="SELECT cat_id, cat_name, cat_desc FROM categories";
$result=$con->query($sql);
echo 
'<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  <title>Iit Discuss</title>
  <style>
  section{
    min-height:100vh;
  }
    </style>
  </head>
  <body>
      <nav class= "navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="/iit_forum">IIT Forums</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/iit_forum">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Catagories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                while($row = mysqli_fetch_assoc($result))
                {
                echo '
                  <a class="dropdown-item" href="/iit_forum/php_script/catagories.php?cat_id='.$row['cat_id'].'">'.$row['cat_name'].'</a>';
                }
                echo '
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/iit_forum/php_script/contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Notes</a>
              </li>
            </ul>
            <form method="GET" onsubmit="return srcvalidateForm()" name="srcForm" action="/iit_forum/php_script/search.php"class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
              <button class=" text-white btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>';
            if(isset($_SESSION['loggedin']))
            {
              echo '
              <div class=" mr-5 dropdown">
              <a  role="button" data-toggle="dropdown" class=" text-white nav-link dropdown-toggle">My Account</a>
  
              <div class="dropdown-menu">
                  <ul class="root">
                      <a class="dropdown-item" href="/iit_forum">Dashboard</a>
                      <a class="dropdown-item"href="#Profile">Profile</a>
                      <a class="dropdown-item"href="#settings">Settings</a>
                      <button id="myBtn"class="dropdown-item"href="#feedback">Send Feedback</button>
                      <a class="dropdown-item"href="/iit_forum/php_script/logout.php">Log out</a>
                  </ul>
              </div>
  
          </div>
              
            </div>
          
        </nav>';
              
            }
            else{
             echo '
             <div class="row ml-3">
             <a href="/iit_forum/php_script/signup.php"class="btn btn-primary mr-3">Sign Up</a>
             <a href="/iit_forum/php_script/login.php"class="btn btn-primary mr-3">Log In</a>
             </div>
            
       </nav>';


            }






?>
