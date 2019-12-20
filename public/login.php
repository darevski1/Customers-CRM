<?php 
  include "../resources/templates/header.php";
  include_once "../includes/config/inc.php";
?>
 

<body class="bg-dark">
<?php 
     if ($_SERVER['REQUEST_METHOD'] == "POST"){
      // Run your function
      $object->loginUser();
  }

?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Најава</div>
      <div class="card-body">
        <form method="POST" action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>"> 
          <div id="errormsg"></div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Емаил адреса"  autofocus="autofocus">
              <label for="inputEmail">Email адреса</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Лозинка"  >
              <label for="inputPassword">Лозинка</label>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Зачувај</button>
          <!-- <a class="btn btn-primary btn-block" type="submit" href="" onclick=validateLogin()>Најава</a> -->
        </form>
      </div>
    </div>
  </div>
<?php include "../resources/templates/script.php";?>
 
</body>

</html>
