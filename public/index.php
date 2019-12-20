<?php 
include "../includes/functions/page.php";
include "../resources/templates/header.php";
include_once "../includes/config/inc.php";

?>

<body id="page-top">
    <?php include "../resources/templates/topnav.php";?>

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "../resources/templates/sidenav.php"; ?>


        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <?php include "../resources/templates/breadcrumbs.php"; ?>

                <?php 
                  ob_start();
                    
                    if(isset($_GET['c'])){
                        $source = $_GET["c"];
                    }else{
                      $source = 43;
                    }

                  switch($source){

                  case '/':
                  require __DIR__ . '/view/document.php';
                  break;

                  case 'document':
                  require __DIR__ . '/view/document.php';
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

                  default:
                  require __DIR__ . '/view/404.php';
                  break;

                }
                
          
 ?>

                <!-- /.container-fluid -->
                <div class="row">
          
                <!-- <?php  include "../includes/routes.php"; ?> -->

           

     

            
                <!-- Sticky Footer -->
                <?php include "../resources/templates/footer.php";?>


            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Script -->
        <?php include "../resources/templates/script.php";?>

</body>

</html>
