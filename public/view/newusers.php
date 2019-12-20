  <!-- Page Content -->
  <h1>Внеси нов Корисник</h1>
  <hr>
  <?php 
           

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // Run your function
            $obj->addUser();
        }
  ?>
  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Внеси нов корисник</h6>
                    </div>
                    <div class="card-body">
                      <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="form-group">
                          <label for="ime">Име:</label>
                          <input type="text" name="first_name" class="form-control" required="required" autofocus="autofocus">
                        </div>

                        <div class="form-group">
                          <label for="prezime">Презиме:</label>
                          <input type="text" name="last_name" class="form-control" required="required" autofocus="autofocus">
                        </div>

                        <div class="form-group">
                          <label for="adresa">Адреса:</label>
                          <input type="text" name="email" class="form-control" required="required" autofocus="autofocus">
                        </div>               
                        <div class="form-group">
                          <label for="sel1">Тип на корисник:</label>
                          <select class="form-control" id="sel1" name="user_role">
                          <?php 
                              $results = $obj->getData('user_role');
                                   foreach($results as $result) {
                              
                              ?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['user_roler'];?></option>
                         
                              <?php }?>
                          </select>
                        </div> 
                        <button class="btn btn-success" name="login" id="login" type="submit">Зачувај</button>
                      </form>
                    </div>
                </div>
  <table class="table">
 