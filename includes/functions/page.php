<?php 


// Breadcumbs function 
function getBreadcumbs(){
    if(isset($_GET['c'])) {
      echo $urlget = $_GET['c'];
    }else{
      echo 'dashboard';
    }
  }