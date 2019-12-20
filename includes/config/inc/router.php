<?php 

ob_start();
                    
if(isset($_GET['c'])){
    $source = $_GET["c"];
}else{
  $source = 43;
}

switch($source){

case '/':
require __DIR__ . 'index.php';
break;

case 'document':
require __DIR__ . '/public/view/document.php';
break;

case 'all':
require __DIR__ . '/view/all.php';
break;

case 'users':
require __DIR__ . '/view/users.php';
break;

case 'edituser':
require __DIR__ . '/view/edituser.php';
break;

case 'test':
require __DIR__ . '/view/test.php';
break;

case 'newusers':
require __DIR__ . '/view/newusers.php';
break;
 

}
